<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\product;
use Cartalyst\Stripe\Api\Products;
use Illuminate\Support\Facades\Auth;

class AdminProductComponent extends Component
{
    public $searchTerm;
    public function deleteProduct($id){

        $product = product::find($id);
        if($product->image){
            unlink('assets/images/products'.'/'.$product->image);
        }
        if($product->images){
            $images = explode(",",$product->images);
            foreach($images as $image){
                if($image){
                    unlink('assets/images/products'.'/'.$image);
                }
            }
        }
        $product->delete();
        Session()->flash('message', 'Product has been deleted Successfully');
    }
    public function render()
    {
        if(Auth::user()->usertype === 'vendor'){
            $products = product::where('shop_id', Auth::user()->shopseller->id)->orderBy('id','DESC')->paginate(5);
        }
        else{
            $search = '%'. $this->searchTerm . '%';
            $products = product::where('name','LIKE',$search)
                                    ->orwhere('stock_status','LIKE',$search)
                                    ->orwhere('regular_price','LIKE',$search)
                                    ->orwhere('sale_price','LIKE',$search)
                                    ->orderBy('id','DESC')->paginate(5);
        }

        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.admin');
    }
}
