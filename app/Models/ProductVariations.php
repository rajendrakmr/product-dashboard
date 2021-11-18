<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ProductVariations extends Model
{
    use HasFactory; 
    protected $table = 'product_variations';
    protected $fillable = [
        'product_id', 'variation_text', 'stock'
    ];
 
    public $timestamps = false;
    const CREATED_AT = false;
    const UPDATED_AT = 'last_updated';

    public function productVariantId($variant_name)
	{   
        /**
         * Check product variation exist or not if exist return productId else null   
         *  
         */
		$variant_name = strtoupper(trim($variant_name)); 
		$variant = ProductVariations::select('id')
        ->where(DB::raw('upper(variation_text)'),$variant_name)->first();
	
		if($variant)
		{ 
			return $variant->id; 
		}
		else
		{
			return null;
		}
    }
}
