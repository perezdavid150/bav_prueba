<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    public function index()
    {
     
     $productos = Producto::all();

     return response()->json($productos);

    }

    public function create(Request $request)
     {
       $productos = new Producto;
       
       $path = '';

      if ($request->hasFile('foto')) { 
         $fileExtension = $request->file('foto')->getClientOriginalName(); 
         $file = pathinfo($fileExtension, PATHINFO_FILENAME); 
         $extension = $request->file('foto')->getClientOriginalExtension(); 
         $fileStore = $file . '_' . time() . '.' . $extension;
         $path = $request->file('foto')->move('fotos', $fileStore); 
      }

       $productos->sku= $request->sku;
       $productos->nombre = $request->nombre;
       $productos->descripcion= $request->descripcion;
       $productos->precio= $request->precio;
       $productos->iva= $request->iva;
       $productos->foto= $fileStore;
       
       $productos->save();

       return response()->json($productos);
     }

     public function show($id)
     {
        $productos = Producto::find($id);

        return response()->json($productos);
     }

     public function update(Request $request, $id)
     { 
        $productos= Producto::find($id);
        
        $productos->sku = $request->input('sku');
        $productos->nombre = $request->input('nombre');
        $productos->descripcion = $request->input('descripcion');
        $productos->precio = $request->input('precio');
        $productos->iva = $request->input('iva');
        $productos->foto = $request->uploadImage('foto');
        $productos->save();
        return response()->json($productos);
     }

     public function delete($id)
     {
        $productos = Producto::find($id);
        $productos->delete();

         return response()->json('producto eliminado correctamente');
     }

}
