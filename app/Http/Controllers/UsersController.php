<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

/* aqui mandamos llamar al modelo User */ 
use App\User;

/* para los mensajes*/
use Laracasts\Flash\Flash;

/*Request para validacion*/
use App\Http\Requests\UserRequest;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('id','ASC')->paginate(10);
        return view ('admin.users.users')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.users.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = new User ($request ->all());
        $user->password =bcrypt($request->password);
        $user ->save();

        Flash::success('Usuario '. $user->name .' registrado exitosamente!!');

        return redirect()->route('admin.users.index');


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
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        //$user ->fill($request->all()); esto seria lo mismo que lo siguiente cuando todos los valores se encuentran
        $user->name =$request->name;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->permisos = $request->permisos;
        $user->save();

        Flash::success('Usuario '. $user->name .' editado exitosamente!!');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();

        Flash::success( $user->name .' fue eliminado(a) exitosamente!!');

        return redirect()->route('admin.users.index');
    }
}
