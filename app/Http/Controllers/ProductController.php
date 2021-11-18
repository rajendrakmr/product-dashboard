<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductVariations;
use App\Exports\ProductsExport;
use Illuminate\Support\Facades\Validator;
use Excel;
use Illuminate\Support\Facades\DB;
 
use App\Mail\ProductMail;
use Illuminate\Support\Facades\Mail;
class ProductController extends Controller
{
    //

    /**
     * Show list of product
     */
    public function show(){
        $products = Products::with('variation')->get();  
        return view('products.show',compact('products'));
    }
    public function add(){
        return view('products.addproduct');
    }

    public function store(Request $request){
        $rules = array(
            'product_file' => 'required',
            'product_file' => 'required|max:10000|mimes:xls,xlsx',
        );
     
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $validator;
     
        }
        $file = $request->file('product_file');
        $importproduct = Excel::toArray(new ProductsExport,$file);
      
      
 
        if(sizeof($importproduct[0])>0){
            if($importproduct[0] > 1){
                try{ 
                foreach($importproduct[0] as $key=>$prod){
                    $product_variantModal = new ProductVariations;
                    $productModal        = new Products;
                    if($key==0){
                        continue;
                    }else{  
                         /**
                          * Check product is exist or not
                          * Method productId 
                          */
                          $data = array();
                        $productId = $productModal->productId($prod[0]);  
                        if($productId){

                         /**
                          * Check product variant is exist or not  
                          * if exist then update else create new one 
                          */
                            $product_variant = $product_variantModal->productVariantId($prod[1]); 
                            if($product_variant){
                                $product_variantModal->where('id',$product_variant)->update(['stock' => $prod[2]]); 
                                continue;
                            }else{
                                $product_variantModal->product_id = $productId;
                                $product_variantModal->variation_text = $prod[1];
                                $product_variantModal->stock =$prod[2];
                                $product_variantModal->save(); 
                                continue; 
                            }
                        }else{ 
                            //Store product inside product table
                            $productModal->product_name = $prod[0];
                            $productModal->product_lowest_price = 10000;
                            $productModal->save();
                             
                            //Stoe product variation inside product table
                            $product_variantModal->product_id = $productModal->id;
                            $product_variantModal->variation_text = $prod[1];
                            $product_variantModal->stock =$prod[2];
                            $product_variantModal->save(); 
                            continue;
                        }
                    }
                }
                $filename=$file->getClientOriginalName();
                if(!empty($filename)){

                    $date = date('Y-m-d-His');
                    $file->storeAs('/public/products/'.$date.'/', $filename);
                    $productfile=url('/').'/storage/products/'.$date.'/'. $filename; 

                    $adminEmailId = 'rajendraakmr@gmail.com';  
                    if(Mail::to($adminEmailId)->send(new ProductMail($productfile))){
                        return true;  
                    } 
                }  
               
                return redirect()->back();
            }catch(\Exception $e) {
                    return $e->getMessage();
                } 
            }else{
                return redirect()->back();
            }
             
        }else{
            return 'data not found!';
        } 
    
    }
}
