<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DataTables;

class DocumentTypeController extends Controller
{

  public function store(Request $request)
  {
    $this->validate($request, [
      'type_document' => 'required|string|max:45|unique:document_type'
    ]);
    DocumentType::create($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Registro Exitoso', 'Se ha agregado un nuevo registro!')]);
  }


  public function edit(documentType $documentType)
  {
    //
  }


  public function documentTypesList(Request $request)
  {
    $documentTypes = DocumentType::select('document_type.*')->get();
    return DataTables::of($documentTypes)
    ->addColumn('action', function($id) {
      $button=" ";
      return $button.'  <a href="/document_types/'.$id->id.'/edit" class="btn btn-md btn-info"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request,  $id)
  {
    $this->validate($request, [
      'type_document' => 'required|string|max:45', Rule::unique('document_type')->ignore($this->id, 'id')
    ]);
    $document = DocumentType::find($id);
    $document->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
