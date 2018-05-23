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
    $this->validate($request, [
      'role' => 'required|string|max:45|unique:roles'
    ]);
    Role::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(Role $role)
  {
    //
  }


  public function rolesList(Request $request)
  {
    $roles = Role::select('roles.*')->get();
    return DataTables::of($roles)
    ->addColumn('action', function($id) {
      $button=" ";
      return $button.'  <a href="/roles/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'role' => 'required|max:45|string', Rule::unique('roles')->ignore($this->id, 'id')
    ]);
    $role = Role::find($id);
    $role->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
