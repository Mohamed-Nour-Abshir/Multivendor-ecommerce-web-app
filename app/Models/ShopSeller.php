<?php

namespace App\Models;

use App\Mail\VerifyShop;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShopSeller extends Model
{
    use HasFactory;

    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

    protected $table = "shop_sellers";
    public $fillable = ['name', 'description'];

    public static function boot() {

        parent::boot();

        static::created(function ($item) {

            $verifyshop = "mdnourabshir@gmail.com";
            Mail::to($verifyshop)->send(new VerifyShop($item));
        });
    }

    public function products(){
        return $this->hasMany(product::class, 'shop_id');
    }

    public function categories(){
        return $this->hasMany(category::class,'shop_id');
    }
}
