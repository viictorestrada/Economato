<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\saveUserRequest;
use App\Http\Requests\updateUserRequest;
use App\Models\Role;
use App\Models\DocumentType;
use App\User;
use DataTables;

class UserController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $users = User::all();
    return view('users.index', compact('users'));
  }


  public function create()
  {
    $roles = Role::all();
    return view('users.create', compact('roles'));
  }


  public function store(saveUserRequest $request)
  {
    User::create($request->all());
    return redirect('users')->with([swal()->autoclose(1500)->success('Registro Éxitoso!', 'Se agrego un nuevo usuario')]);
  }


  public function usersList(Request $request)
  {
    $users = User::select('users.*','roles.role')->join('roles', 'roles.id', '=', 'users.rol_id')->get();
    return DataTables::of($users)
    ->addColumn('action', function($id) {
      $boton=" ";
      if ($id->status == 1) {
        $boton = '<a href="/users/status/'.$id->id.'/0" class="btn btn-md btn-danger"><i class="fa fa-ban"></i></a>';
      }
      else
      {
        $boton = '<a href="/users/status/'.$id->id.'/1" class="btn btn-md btn-success"><i class="fa fa-check-circle"></i></a>';
      }
      return $boton.'  <a href="/users/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->editColumn('status',function($id){
      return $id->status == 1 ? "Activo":"Inactivo";
    })
    ->make(true);
  }


  public function edit($id)
  {
    $roles = Role::all();
    $user = User::find($id);
    return view('users.edit', compact('user', 'roles'));
  }


  public function update(updateUserRequest $request, $id)
  {
    $user = User::find($id);
    $user->update($request->all());
    return redirect('users')->with([swal()->autoclose(1500)->success('Actualización Éxitoso!', 'Se actualizo el usuario éxitosamente!')]);
  }


  public function status($id, $status)
  {
    $user = User::find($id);
    if ($user == null) {
      alert()->autoclose(1000)->warning('Advertencia','No se encontraron datos!');
      return redirect('users');
    }else {
      $user->update(["status"=>$status]);
      return redirect('users')->with([swal()->autoclose(1500)->message('El usuario '.$user->name.' esta',''.$user->status == 1 ? "Activo":"Inactivo".'','success')]);
    }
  }
}
