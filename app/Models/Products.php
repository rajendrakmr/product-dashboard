<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name', 'product_lowest_price',
    ];
    const CREATED_AT = false;
    const UPDATED_AT = 'last_updated';
    public $timestamps = false;
    
    public function variation()
    {
        return $this->hasMany('App\Models\ProductVariations', 'product_id');
    }

    /**
     * Check product exist or not by same name if exist return productId else null   
     */
    public function productId($product_name)
	{
		$product_name = strtoupper(trim($product_name));
		$product = Products::where(DB::raw('upper(product_name)'),$product_name)->first(); 

		if($product)
		{ 
			return $product->id; 
		}
		else
		{
			return null;
		}
    }
}
