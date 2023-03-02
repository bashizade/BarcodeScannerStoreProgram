<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Products extends Component
{
    public $barcode,$name,$price,$count;

    public $product_id;

    protected $listeners = ['delete'];

    public function create()
    {
        $validator = Validator::make([
            'barcode' => $this->barcode,
            'name' => $this->name,
            'price' => $this->price,
            'count' => $this->count
        ],[
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required',
            'count' => 'required'
        ]);

        if ($validator->fails()){
            $this->show_toast('خطا',$validator->errors()->all(),'error');
        }

        Product::query()->create([
            'barcode' => $this->barcode,
            'name' => $this->name,
            'price' => $this->price,
            'count' => $this->count
        ]);

        $this->show_toast('تبریک','محصول با موفقیت اضافه شد');
        $this->reset('barcode','name','count','price');

    }

    public function set_update_value($id)
    {
        $product = Product::query()->find($id);
        $this->product_id = $id;
        $this->barcode = $product->barcode;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->count = $product->count;
    }

    public function update()
    {
        $validator = Validator::make([
            'barcode' => $this->barcode,
            'name' => $this->name,
            'price' => $this->price,
            'count' => $this->count
        ],[
            'barcode' => 'required',
            'name' => 'required',
            'price' => 'required',
            'count' => 'required'
        ]);

        if ($validator->fails()){
            $this->show_toast('خطا',$validator->errors()->all(),'error');
        }

        Product::query()->find($this->product_id)->update([
            'barcode' => $this->barcode,
            'name' => $this->name,
            'price' => $this->price,
            'count' => $this->count
        ]);

        $this->show_toast('تبریک','محصول با موفقیت ویرایش شد');
        $this->reset('barcode','name','count','price','product_id');
        $this->dispatchBrowserEvent('closemodalupdateproduct');

    }

    public function confirm_delete($id)
    {
        $this->show_swal_confirm('آیا مطمئن به حذف محصول هستید ؟','delete',$id);
    }

    public function delete($id)
    {
        Product::query()->find($id)->update([
            'status' => 0
        ]);

        $this->show_toast('تبریک','محصول با موفقیت حذف شد');
    }

    public function render()
    {
        $products = Product::query()->where('status',1)->get();
        return view('livewire.dashboard.products',compact('products'))->layout('layouts.adminpanel.master');
    }
}
