<?php

namespace App\Console\Commands;

use App\Services\ReceiptService;
use Illuminate\Console\Command;

class TestReceipt extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'receipt:test {--sale_id= : ID penjualan untuk test print}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test receipt printing functionality';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Testing receipt printing...');

        try {
            $receiptService = new ReceiptService();

            if ($this->option('sale_id')) {
                // Print actual receipt
                $saleId = $this->option('sale_id');
                $this->info("Printing receipt for sale ID: {$saleId}");
                $receiptService->printReceipt($saleId);
                $this->info('Receipt printed successfully!');
            } else {
                // Print test receipt
                $this->info('Printing test receipt...');
                $receiptService->testPrint();
                $this->info('Test receipt printed successfully!');
            }
        } catch (\Exception $e) {
            $this->error('Failed to print receipt: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
