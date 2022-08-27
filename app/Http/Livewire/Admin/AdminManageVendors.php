<?php

namespace App\Http\Livewire\Admin;

use App\Models\ShopSeller;
use Livewire\Component;

class AdminManageVendors extends Component
{
    public function deleteShop($id){
        $shop = ShopSeller::find($id);
        $shop->delete();
        session()->flash('message','Shop has been deleted successfully');
    }
    public function render()
    {
        $vendors = ShopSeller::paginate(10);
        return view('livewire.admin.admin-manage-vendors',['vendors'=>$vendors])->layout('layouts.admin');
    }
}
