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
    $rules = [
      'type_document' => 'required|string|max:45|unique:document_type'
    ];

    $messages = [
      'type_document.required' => 'El campo Tipo de Documento es obligatorio.',
      'type_document.max' => 'El campo Tipo de Documento debe contener máximo 45 caracteres.',
      'type_document.unique' => 'El Tipo de Documento ya existe.'
    ];

    $this->validate($request, $rules, $messages);
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
    $rules = [
      'type_document' => 'required|string|max:45', Rule::unique('document_type')->ignore($this->id, 'id')
    ];

    $messages = [
      'type_document.required' => 'El campo Tipo de Documento es obligatorio.',
      'type_document.max' => 'El campo Tipo de Documento debe contener máximo 45 caracteres.'
    ];

    $this->validate($request, $rules, $messages);
    $document = DocumentType::find($id);
    $document->update($request->all());
    return redirect('configurations')->with([swal()->autoclose(1500)->success('Actualización Exitosa', 'Se ha actualizado el registro correctamente')]);
  }
}
