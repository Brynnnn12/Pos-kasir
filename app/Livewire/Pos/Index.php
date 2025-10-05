<?php

namespace App\Livewire\Pos;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Services\SaleService;
use App\Services\SaleItemService;
use App\Services\ReceiptService;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $cart = [];
    public $products;
    public $payment_type = '';
    public $payment_amount = 0.0;
    public $change_amount = 0.0;

    protected $listeners = ['productSelected' => 'addToCart'];

    public function __construct()
    {
        // ReceiptService will be initialized only when needed
    }

    public function mount()
    {
        $this->products = Product::where('stock', '>', 0)->get();
    }

    public function updatedPaymentAmount()
    {
        $this->calculateChange();
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product || $product->stock <= 0) {
            return;
        }

        // Check if product already in cart
        $existingIndex = collect($this->cart)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($existingIndex !== false) {
            // Increase quantity if already in cart
            if ($this->cart[$existingIndex]['qty'] < $product->stock) {
                $this->cart[$existingIndex]['qty']++;
                $this->cart[$existingIndex]['subtotal'] = $this->cart[$existingIndex]['qty'] * $this->cart[$existingIndex]['price'];
            }
        } else {
            // Add new item to cart
            $this->cart[] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
                'subtotal' => $product->price,
                'stock' => $product->stock,
            ];
        }

        $this->calculateChange();
    }

    public function updateQty($index, $qty)
    {
        if ($qty <= 0) {
            $this->removeFromCart($index);
            return;
        }

        if ($qty > $this->cart[$index]['stock']) {
            $qty = $this->cart[$index]['stock'];
        }

        $this->cart[$index]['qty'] = $qty;
        $this->cart[$index]['subtotal'] = $qty * $this->cart[$index]['price'];

        $this->calculateChange();
    }

    public function removeFromCart($index)
    {
        unset($this->cart[$index]);
        $this->cart = array_values($this->cart); // Reindex array

        $this->calculateChange();
    }

    public function calculateChange()
    {
        $total = $this->getTotal();
        $paymentAmount = is_numeric($this->payment_amount) ? (float) $this->payment_amount : 0;
        $this->change_amount = max(0, $paymentAmount - $total);
    }

    public function getTotal()
    {
        return collect($this->cart)->sum('subtotal');
    }

    public function checkout()
    {
        $this->validate([
            'payment_type' => 'required|string',
            'payment_amount' => 'required|numeric|min:' . $this->getTotal(),
        ]);

        if (empty($this->cart)) {
            $this->js('Swal.fire({icon: "error", title: "Error!", text: "Cart is empty.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
            return;
        }

        $saleId = null;

        DB::transaction(function () use (&$saleId) {
            // Create Sale
            $sale = Sale::create([
                'user_id' => Auth::id(),
                'total' => $this->getTotal(),
                'payment_type' => $this->payment_type,
                'payment_amount' => $this->payment_amount,
                'change_amount' => $this->change_amount,
            ]);

            $saleId = $sale->id;

            // Create Sale Items and update stock
            foreach ($this->cart as $item) {
                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'],
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);

                // Update product stock
                $product = Product::find($item['product_id']);
                $product->decrement('stock', $item['qty']);
            }
        });

        // Reset cart and form
        $this->resetCart();
        $this->payment_type = '';
        $this->payment_amount = 0.0;
        $this->change_amount = 0.0;

        // Print receipt
        try {
            $receiptService = new ReceiptService();
            $receiptService->printReceipt($saleId);
            $this->js('Swal.fire({icon: "success", title: "Success!", text: "Transaction completed successfully. Receipt printed.", toast: true, position: "top-end", showConfirmButton: false, timer: 3000})');
        } catch (\Exception $e) {
            $this->js('Swal.fire({icon: "warning", title: "Transaction Success!", text: "Transaction completed but receipt printing failed: ' . $e->getMessage() . '", toast: true, position: "top-end", showConfirmButton: false, timer: 5000})');
        }
    }

    private function resetCart()
    {
        $this->cart = [];
        $this->products = Product::where('stock', '>', 0)->get();
    }

    public function render()
    {
        return view('livewire.pos.index');
    }
}
