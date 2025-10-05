<?php

namespace App\Services;

use App\Models\Sale;
use App\Models\SaleItem;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Exception;

class ReceiptService
{
    protected $printer;
    protected $config;

    public function __construct()
    {
        $this->config = config('printer');
        $this->configurePrinter();
    }

    public function __destruct()
    {
        // Ensure printer is always closed
        if (isset($this->printer)) {
            try {
                $this->printer->close();
            } catch (Exception $e) {
                // Ignore errors in destructor
            }
        }
    }

    protected function configurePrinter()
    {
        try {
            $printerType = $this->config['default'];

            switch ($printerType) {
                case 'windows':
                    $connector = new WindowsPrintConnector($this->config['printers']['windows']['name']);
                    break;

                case 'network':
                    $connector = new NetworkPrintConnector(
                        $this->config['printers']['network']['ip'],
                        $this->config['printers']['network']['port']
                    );
                    break;

                case 'file':
                default:
                    $fileName = 'receipt_' . date('Y-m-d_H-i-s') . '.txt';
                    $connector = new FilePrintConnector($this->config['printers']['file']['path'] . '/' . $fileName);
                    break;
            }

            $this->printer = new Printer($connector);
        } catch (Exception $e) {
            throw new Exception('Printer tidak dapat diakses: ' . $e->getMessage());
        }
    }

    public function printReceipt($saleId)
    {
        $sale = Sale::with(['saleItems.product', 'user'])->findOrFail($saleId);

        try {
            // Print receipt content
            $this->printReceiptContent($sale);

            return true;
        } finally {
            // Always close the printer
            if (isset($this->printer)) {
                try {
                    $this->printer->close();
                } catch (Exception $e) {
                    // Ignore close errors in finally block
                }
            }
        }
    }

    protected function printReceiptContent($sale)
    {
        // Header
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->setTextSize(2, 2);
        $this->printer->text($this->config['receipt']['store_name'] . "\n");
        $this->printer->setTextSize(1, 1);
        $this->printer->text($this->config['receipt']['store_address'] . "\n");
        $this->printer->text("Tel: " . $this->config['receipt']['store_phone'] . "\n");
        $this->printer->text(str_repeat("-", 32) . "\n");

        // Tanggal dan No Transaksi
        $this->printer->setJustification(Printer::JUSTIFY_LEFT);
        $this->printer->text("Tanggal: " . $sale->created_at->format('d/m/Y H:i:s') . "\n");
        $this->printer->text("No. Transaksi: " . str_pad($sale->id, 8, '0', STR_PAD_LEFT) . "\n");
        $this->printer->text("Kasir: " . $sale->user->name . "\n");
        $this->printer->text(str_repeat("-", 32) . "\n");

        // Items
        $this->printer->text(str_pad("Item", 20) . str_pad("Qty", 4) . str_pad("Harga", 8) . "\n");
        $this->printer->text(str_repeat("-", 32) . "\n");

        foreach ($sale->saleItems as $item) {
            $name = substr($item->product->name, 0, 18);
            $qty = str_pad($item->qty, 4, ' ', STR_PAD_LEFT);
            $price = str_pad(number_format($item->price, 0, ',', '.'), 8, ' ', STR_PAD_LEFT);

            $this->printer->text($name . "\n");
            $this->printer->text(str_pad("", 20) . $qty . $price . "\n");
        }

        $this->printer->text(str_repeat("-", 32) . "\n");

        // Total
        $this->printer->setJustification(Printer::JUSTIFY_RIGHT);
        $this->printer->text("Total: Rp " . number_format($sale->total, 0, ',', '.') . "\n");
        $this->printer->text("Bayar: Rp " . number_format($sale->payment_amount, 0, ',', '.') . "\n");
        $this->printer->text("Kembali: Rp " . number_format($sale->change_amount, 0, ',', '.') . "\n");
        $this->printer->text("Pembayaran: " . ucfirst($sale->payment_type) . "\n");

        // Footer
        $this->printer->setJustification(Printer::JUSTIFY_CENTER);
        $this->printer->text(str_repeat("-", 32) . "\n");
        $this->printer->text($this->config['receipt']['footer_message'] . "\n");
        $this->printer->text("\n");
        $this->printer->text("\n");

        // Cut paper
        $this->printer->cut();
    }

    public function testPrint()
    {
        try {
            $this->printer->setJustification(Printer::JUSTIFY_CENTER);
            $this->printer->text("TEST PRINT\n");
            $this->printer->text("Printer Thermal Ready\n");
            $this->printer->text(date('d/m/Y H:i:s') . "\n");
            $this->printer->cut();

            return true;
        } finally {
            // Always close the printer
            if (isset($this->printer)) {
                try {
                    $this->printer->close();
                } catch (Exception $e) {
                    // Ignore close errors in finally block
                }
            }
        }
    }
}
