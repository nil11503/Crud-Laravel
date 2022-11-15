<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CategoriesController extends Controller
{

  
    public function create(Request $request) {
        $request->validate([
            'id' => 'required',
            'description' => 'required',
        
        ]);

        $category =new Category();
        $category -> name = $request-> name;
        $category -> description = $request-> description;
        $category -> save();

        return response()->json([
            "status" => 1,
            "msg" => "¡La categoria $category->name se a guardado correctamente!",
        ]);
    }
    public function list() {
      
if(Category::all()->first()->exists()){
    $categories=Category::all();
    return response([
        "status" => 1,
        "msg" => "¡Lista categorias",
        "data"=> $categories
    
    ]);
}else{
    return response([
        "status" => 0,
        "msg" => "No existen Categorias"
    ]);
}

       
    }
    public function delete($id ) {
        if(Category::where( ["id"=>$id] )->exists() ){
            $category=Category::where( ["id"=>$id] )->first();
            $category->delete();

            return response([
                "status" => 1,
                "msg" => "eliminado correctamente"
            ]);
        }else{

        }
    }
    public function update(Request $request, $id) {

        if(Category::where( ["id"=>$id] )->exists()){
            //si existe lo actualizamos
            $category = Category::find($id);
            $category->name= isset($request->name) ? $request->name : $category->name;
            $category->description=isset($request->description) ? $request->description : $category->description;
            $category->save();
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