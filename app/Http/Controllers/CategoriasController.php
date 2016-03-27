<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/* aqui mandamos llamar al modelo */ 
use App\categoria;

/* para los mensajes*/
use Laracasts\Flash\Flash;

/*Request para validacion*/
use App\Http\Requests\UserRequest;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('id','ASC')->paginate(10);
        return view ('admin.categorias.categorias')->with('categorias',$categorias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
          return view('admin.categorias.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $categoria = new Categoria ($request ->all());
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50|unique:categorias'
        ]);
        $categoria ->save();

        Flash::success('Categoria '. $categoria->name .' registrada exitosamente!!');

        return redirect()->route('admin.categorias.index');
        


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
        $categoria = categoria::find($id);
        return view('admin.categorias.edit')->with('categoria',$categoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $this->validate($request, [
            'nombre' => 'required|min:2|max:50|unique:categorias,nombre,'.$id
        ]);
        $categoria ->fill($request->all()); 
        
        $categoria->save();

        Flash::success('Categoria '. $categoria->nombre .' editado exitosamente!!');

        return redirect()->route('admin.categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $categoria =Categoria::find($id);
        $categoria->delete();

        Flash::success('La '. $categoria->nombre .' fue eliminada exitosamente!!');

        return redirect()->route('admin.categorias.index');
    }
}
