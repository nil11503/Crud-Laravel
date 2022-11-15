<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function create(Request $request) {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' =>'required',
           'category_id'=>'required'
        ]);
        $product =new Product();
        $product -> name = $request-> name;
        $product -> description = $request-> description;
        $product -> stock = $request-> stock;
        $product -> price = $request-> price;
        $product -> category_id = $request-> category_id;
        $product -> save();

        return response()->json([
            "status" => 1,
            "msg" => "¡El producto $product->name se a guardado correctamente!",
        ]);

    }
    public function list() {
      
        if(Product::all()->first()->exists()){
            $product=Product::all();
            return response([
                "status" => 1,
                "msg" => "¡Lista categorias",
                "data"=> $product
            
            ]);
        }else{
            return response([
                "status" => 0,
                "msg" => "No existen Categorias"
            ]);
        }
        
               
            }
            public function delete($id ) {
                if(Product::where( ["id"=>$id] )->exists() ){
                    $product=Product::where( ["id"=>$id] )->first();
                    $product->delete();
        
                    return response([
                        "status" => 1,
                        "msg" => "eliminado correctamente"
                    ]);
                }else{
        
                }
            }
            public function update(Request $request, $id) {
        
                if(Product::where( ["id"=>$id] )->exists()){
                    //si existe lo actualizamos
                    $product = Product::find($id);
                    $product->name= isset($request->name) ? $request->name : $product->name;
                    $product->description=isset($request->description) ? $request->description : $product->description;
                    $product->stock=isset($request->stock) ? $request->stock : $product->stock;
                    $product->price=isset($request->description) ? $request->price : $product->price;
                    $product->save();
                    return response([
                        "status" => 1,
                        "msg" => "actualizado correctamente"
                    ]);
           
                }else{
                    return response([
                        "status" => 0,
                        "msg" => "No existen Categorias"
                    ]);
                }
        
            }
        }