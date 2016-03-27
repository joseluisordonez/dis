<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/* aqui mandamos llamar al modelo */ 
use App\producto;
use App\categoria;
use App\subcategoria;
use App\imagen;

/* para los mensajes*/
use Laracasts\Flash\Flash;

/*Request para validacion*/
use App\Http\Requests\ProductoRequest;

class ProductosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $productos = Producto::orderBy('nombre','ASC')->paginate(20);
        return view ('admin.productos.productos')->with('productos',$productos);
    }

    public function subcategorias(Request $request, $id)
    {
        if($request->ajax()){
            $subcategorias = Subcategoria::subcategorias($id);
            return response()->json($subcategorias);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','ASC')->lists('nombre','id');//esto se envia para el droplist de categorias
        //$subcategorias = Subcategoria::orderBy('nombre','ASC')->lists('nombre','id');//esto se envia para el droplist de subcategorias
        return view('admin.productos.create')
            ->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if ($request->file('imagen'))
        {
            $file   =   $request->file('imagen');
            $name   =   'imagen_'.time().'.'.$file->getClientOriginalExtension();
            $path   =   public_path(). '/images/productos/';
            $file->move($path,$name);   
        }
        $producto = new Producto ($request ->all());
        $this->validate($request,[
            'nombre'            =>      'required|min:5|max:50|unique:productos,nombre',
            'codigo'            =>      'required|max:30|unique:productos,codigo',
            'categoria_id'      =>      'required',
            'subcategoria_id'   =>      'required',
            ]);   
        $producto ->save();

        
        $imagen = new Imagen();
        $imagen->nombre =$name;
        $imagen->producto_id =$producto->id;
        //$imagen->producto()->associate($producto);//producto() es la funcion uqe esta en el modelo imagen
        $imagen->save(); 
        Flash::success('Producto '. $producto->name .' registrada exitosamente!!');

        return redirect()->route('admin.productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $producto = producto::find($id);
        $categorias = Categoria::orderBy('nombre','ASC')
            ->lists('nombre','id');//esto se envia para el droplist de categorias
        return view('admin.productos.edit')
            ->with('producto',$producto)
            ->with('categorias',$categorias);
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $producto =Producto::find($id);
        $producto->delete();

        Flash::success('El '. $producto->nombre .' fue eliminada exitosamente!!');

        return redirect()->route('admin.productos.index');
    }
}
