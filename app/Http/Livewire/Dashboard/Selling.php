<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Product;
use App\Models\Sell;
use Livewire\Component;

class Selling extends Component
{
    protected $listeners = ['create'];

    public function create($barcode)
    {
        $product = Product::query()->where('barcode',$barcode)->first();
        if ($product){
            if ($product->count > 0){
                Sell::query()->create([
                    'product_id' => $product->id,
                    'price' => $product->price
                ]);
                $product->update([
                    'count' => $product->count - 1,
                ]);
            }else{
                $this->show_toast('خطا','موجود محصول تمام شده است','error');
            }
        }else{
            $this->show_toast('خطا','چنین محصولی در فروشگاه ثبت نشده است','error');
        }


    }

    public function render()
    {
        $sells = Sell::all();
        return view('livewire.dashboard.selling',compact('sells'))->layout('layouts.adminpanel.master');
    }
}
