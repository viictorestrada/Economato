<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class RoleController extends Controller
{


  public function store(Request $request)
  {

    $rules = [
      'role' => 'required|max:45|string|unique:roles'
    ];

    $messages = [
      'role.required' => 'El campo Rol es obligatorio.',
      'role.unique' => 'El campot Rol ya existe.',
      'role.max' => 'El campo Rol debe contener máximo 45 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    Role::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit($id)
  {
    $role = Role::findOrFail($id);
    return $role;
  }


  public function rolesList(Request $request)
  {
    $roles = Role::select('roles.*')->get();
    return DataTables::of($roles)
    ->addColumn('action', function($role) {
      $button=" ";
      return $button.'  <a onclick="editRole('. $role->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request, $id)
  {
    $role = Role::findOrFail($id);
    $role->update($request->all());
    return $role;
  }
}
