<?php

namespace App\Http\Livewire;

use App\Models\ShopSeller;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OpenYourShop extends Component
{
    public $name;
    public $description;

    public function registerShop(){
        $shop = new ShopSeller();
        if(Auth::user()){
            $shop->user_id = Auth::user()->id;
            $shop->name = $this->name;
            $shop->description = $this->description;
            $shop->save();
        }
        session()->flash('message','You registered as seller successfully! wait to activate your shop');
    }
    public function render()
    {
        return view('livewire.open-your-shop')->layout('layouts.home');
    }
}
