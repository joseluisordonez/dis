<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/* aqui mandamos llamar al modelo */ 
use App\producto;
use App\categoria;
use App\subcategoria;
use App\imagen;

/* para los mensajes*/
use Laracasts\Flash\Flash;

/*Request para validacion*/
use App\Http\Requests\ProductoRequest;

class PpalController extends Controller
{
    public function index(){
         
        $productos = Producto::orderByRaw('RAND()')->paginate(8);
        return view('index')->with('productos',$productos);
    }
    public function producto($id){
        $producto = Producto::find($id);
        $productos = Producto::where('subcategoria_id','=',$producto->subcategoria_id)->orderByRaw('RAND()')->paginate(4);
        //dd($productos);
        return view('producto')
            ->with('producto',$producto)
            ->with('productos',$productos);
    }
    public function productos(){
        $productos = Producto::orderByRaw('RAND()')->paginate(16);
        return view('productos')
            ->with('productos',$productos);
    }
    public function categoria($id){
        $categoria = categoria::find($id);
        $productos = Producto::where('categoria_id','=',$categoria->id)->paginate(16);
        //dd($productos);
        return view('productos')
            ->with('productos',$productos)
            ->with('categoria',$categoria);
            
    }
    public function nosotros(){
    	return view('nosotros');
    }
    public function contacto(){
    	return view('contacto');
    }
    public function admin(){
    	return view('admin.admin');
    }
}
