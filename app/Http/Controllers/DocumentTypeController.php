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


  public function edit($id)
  {
    $documentType = DocumentType::findOrFail($id);
    return $documentType;
  }


  public function documentTypesList(Request $request)
  {
    $documentTypes = DocumentType::select('document_type.*')->get();
    return DataTables::of($documentTypes)
    ->addColumn('action', function($documentType) {
      $button=" ";
      return $button.'<a onclick="editDocumentType('. $documentType->id .')" class="btn btn-md btn-info text-light"><i class="fa fa-edit"></i></a>';
    })->make(true);
  }


  public function update(Request $request,  $id)
  {
    $document = DocumentType::findOrFail($id);
    $document->update($request->all());
    return $document;
  }
}
