<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    { }

    /**
     * @return [type]
     */
    public function index()
    {
     
     $ventas = Venta::all();

     return response()->json($ventas);

    }

    /**
     * @param Request $request
     * 
     * @return [type]
     */
    public function create(Request $request)
     {
       $ventas = new Venta;

       $ventas->factura= $request->factura;
       $ventas->cliente = $request->cliente;
       $ventas->telefono= $request->telefono;
       $ventas->email= $request->email;
       $ventas->producto_id= $request->producto_id;
       
       $ventas->save();

       return response()->json($ventas);
     }

     /**
      * @param mixed $id
      * 
      * @return [type]
      */
     public function show($id)
     {
        $ventas = Venta::find($id);

        return response()->json($ventas);
     }

     /**
      * @param Request $request
      * @param mixed $id
      * 
      * @return [type]
      */
     public function update(Request $request, $id)
     { 
        $ventas= Venta::find($id);
        
        $ventas->factura = $request->input('factura');
        $ventas->cliente = $request->input('cliente');
        $ventas->telefono = $request->input('telefono');
        $ventas->email = $request->input('email');
        $ventas->producto_id = $request->input('producto_id');
        $ventas->save();
        return response()->json($ventas);
     }

     /**
      * @param mixed $id
      * 
      * @return [type]
      */
     public function delete($id)
     {
        $ventas = Venta::find($id);
        $ventas->delete();

         return response()->json('venta eliminada correctamente');
     }

}
