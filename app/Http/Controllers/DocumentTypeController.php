<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
