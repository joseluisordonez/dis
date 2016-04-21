<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/* aqui mandamos llamar al modelo */ 
use App\subcategoria;
/*llamamos al modelo categoria para cargarlo en la vista crear*/
use App\categoria;

/* para los mensajes*/
use Laracasts\Flash\Flash;

class SubcategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategorias = Subcategoria::orderBy('id','ASC')->paginate(10);
        return view ('admin.subcategorias.subcategorias')->with('subcategorias',$subcategorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','ASC')->lists('nombre','id');//esto se envia para el droplist de categorias
        return view('admin.subcategorias.create')->with('categorias',$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategoria = new Subcategoria ($request ->all());
        $this->validate($request, [
            'categoria_id'  =>      'required',
            'nombre'        =>      'required|min:2|max:50|unique:subcategorias',
        ]);
        $subcategoria ->save();

        Flash::success('Subcategoria '. $subcategoria->name .' registrada exitosamente!!');

        return redirect()->route('admin.subcategorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategoria = subcategoria::find($id);
        $categorias = Categoria::orderBy('nombre','ASC')
            ->lists('nombre','id');//esto se envia para el droplist de categorias
        return view('admin.subcategorias.edit')
            ->with('subcategoria',$subcategoria)
            ->with('categorias',$categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $subcategoria = subcategoria::find($id);
        $this->validate($request, [
            'nombre'            =>      'required|max:50|unique:subcategorias,nombre,'.$id,
            'categoria_id'      =>      'required',
        ]);
        //$subcategoria ->fill($request->all()); esto seria lo mismo que lo siguiente cuando todos los valores se encuentran
        $subcategoria->nombre =$request->nombre;
        $subcategoria->descripcion = $request->descripcion;
        $subcategoria->categoria_id = $request->categoria_id;
        
        $subcategoria->save();

        Flash::success('Subcategoria '. $subcategoria->name .' editado exitosamente!!');

        return redirect()->route('admin.subcategorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategoria =subcategoria::find($id);
        $subcategoria->delete();

        Flash::success('La '. $subcategoria->nombre .' fue eliminada exitosamente!!');

        return redirect()->route('admin.subcategorias.index');
    }
}
