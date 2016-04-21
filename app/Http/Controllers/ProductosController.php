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
//File es para el manejo de archivos (delete)
use File;

class ProductosController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productos = Producto::Search($request->nombre)->orderBy('nombre','ASC')->paginate(30);
        $productos->each(function($productos){
            $productos->imagen;
        });
        //dd($productos);
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
       
        $producto = new Producto ($request ->all());
        $this->validate($request,[
            'nombre'            =>      'required|min:5|max:50|unique:productos,nombre',
            'codigo'            =>      'required|max:30|unique:productos,codigo',
            'categoria_id'      =>      'required',
            'subcategoria_id'   =>      'required',
            ]);   
        $producto ->save();

        if ($request->file('imagen'))
        {
            $file   =   $request->file('imagen');
            $name   =   'producto_'.time().'.'.$file->getClientOriginalExtension();
            //public_path() hace referencia a la carpeta public, pero en el hosting hay uqe cambiarlo, estoy se hace con una 
            //funcion uqe se encuentra en el archivo index.php uqe esta en la carpeta public en el hosting
            $path   =     public_path().'/images/productos/';
        
            $file->move($path,$name);  
        
            $imagen = new Imagen();
            $imagen->nombre =$name;
            $imagen->producto_id =$producto->id;
            $imagen->save();
         }
         else
         {
            $imagen = new Imagen();
            $imagen->nombre ="sin_imagen.jpg";
            $imagen->producto_id =$producto->id;
            $imagen->save();
         }
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
        $subcategorias = Subcategoria::where('categoria_id','=',$producto->categoria_id)
            ->lists('nombre','id');//esto se envia para el droplist de categorias;
        return view('admin.productos.edit')
            ->with('producto',$producto)
            ->with('categorias',$categorias)
            ->with('subcategorias',$subcategorias);
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $producto = producto::find($id);
        $this->validate($request, [
            'nombre'            =>      'required|min:5|max:50',
            'codigo'            =>      'required|max:30|unique:productos,codigo,'.$id,
            'categoria_id'      =>      'required',
            'subcategoria_id'   =>      'required',
        ]);
        //$producto ->fill($request->all()); esto seria lo mismo que lo siguiente cuando todos los valores se encuentran
        $producto->nombre =$request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->codigo = $request->codigo;
        $producto->costo = $request->costo;
        $producto->unidad_medida = $request->unidad_medida;
        $producto->precio_mayoreo = $request->precio_mayoreo;
        $producto->precio_mediomayoreo = $request->precio_mediomayoreo;
        $producto->precio_menudeo = $request->precio_menudeo;
        $producto->categoria_id = $request->categoria_id;
        $producto->subcategoria_id = $request->subcategoria_id;
        $producto->stock = $request->stock;
        $producto->stock_min = $request->stock_min;
        $producto->stock_max = $request->stock_max;
        $producto->save();

        Flash::success('Producto '. $producto->name .' editado exitosamente!!');

        return redirect()->route('admin.productos.index');
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
        if($producto->imagen->nombre!='sin_imagen.jpg')
            { 
                $path   =     public_path().'/images/productos/';
                
               File::delete( $path.$producto->imagen->nombre );
            }

        
        $producto->delete();

        Flash::success('El '. $producto->nombre .' fue eliminada exitosamente!!');

        return redirect()->route('admin.productos.index');
        
    }
}
