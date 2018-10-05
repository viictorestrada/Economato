//Tabla para mostrar IVA
var tableTaxes = $('#taxesTable').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/taxes/get',
    columns: [
        { data: 'tax', name: 'tax' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funcion para agregar  IVA
function addTaxes() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#taxes-form form')[0].reset();
    $('#taxes-form').modal('show');
}

//Función que determina si se edita o se crea el IVA
$(function() {
    $('#taxes-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "taxes";
            } else {
                url = "taxes/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#taxes-form form').serialize(),
                success: function(response) {
                    $('#taxes-form').modal('hide');
                    tableTaxes.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    $('#taxes-form').modal('hide');
                    tableRegion.ajax.reload();
                }
            });
            return false;
        }
    });
});

//Función para editar Iva
function editTaxes(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#taxes-form form")[0].reset();
    $.ajax({
        url: "taxes" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#taxes-form').modal('show');
            $('#id').val(data.id);
            $('#tax').val(data.tax);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}


//Tabla para mostrar las Regionales
var tableRegion = $('#regions').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/regions/get',
    columns: [
        { data: 'region_name', name: 'region_name' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Regionales
function addRegion() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#region-form form')[0].reset();
    $('#region-form').modal('show');
}

$(function() {
    $('#region-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "regions";
            } else {
                url = "regions/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#region-form form').serialize(),
                success: function(response) {
                    $('#region-form').modal('hide');
                    tableRegion.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops! Se ha generado un error!');
                }
            });
            return false;
        }
    });
});

function editRegion(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#region-form form")[0].reset();
    $.ajax({
        url: "regions" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#region-form').modal('show');
            $('#id').val(data.id);
            $('#region_name').val(data.region_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}
// Fin Seccion Regionales



//Tabla para mostrar los complejos
var tableComplex = $('#complex').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/complex/get',
    columns: [
        { data: 'region_name', name: 'id_region' },
        { data: 'complex_name', name: 'complex_name' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Complejos
function addComplex() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#complexes-form form')[0].reset();
    $('#complexes-form').modal('show');
}

$(function() {
    $('#complexes-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "complex";
            } else {
                url = "complex/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#complexes-form form').serialize(),
                success: function(response) {
                    $('#complexes-form').modal('hide');
                    tableComplex.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                }
            });
            return false;
        }
    });
});

function editComplex(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#complexes-form form")[0].reset();
    $.ajax({
        url: "complex" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#complexes-form').modal('show');
            $('#id').val(data.id);
            $('#id_region').val(data.id_region);
            $('#complex_name').val(data.complex_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Complejos

// Tabla para mostrar centros de formación

var tableLocations = $('#locations').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/locations/get',
    columns: [
        { data: 'complex_name', name: 'id_complex' },
        { data: 'location_name', name: 'location_name' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Centros de formación
function addLocation() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#locations-form form')[0].reset();
    $('#locations-form').modal('show');
}

$(function() {
    $('#locations-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "locations";
            } else {
                url = "locations/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#locations-form form').serialize(),
                success: function(response) {
                    $('#locations-form').modal('hide');
                    tableLocations.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                }
            });
            return false;
        }
    });
});

function editLocation(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#locations-form form")[0].reset();
    $.ajax({
        url: "locations" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#locations-form').modal('show');
            $('#id').val(data.id);
            $('#id_complex').val(data.id_complex);
            $('#location_name').val(data.location_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Centros de formación

// Tabla para mostrar programas de formación

var tablePrograms = $('#programs').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/programs/get',
    columns: [
        { data: 'location_name', name: 'location_id' },
        { data: 'program_name', name: 'program_name' },
        { data: 'program_version', name: 'program_version' },
        { data: 'program_description', name: 'program_description' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Programas de formación
function addProgram() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#programs-form form')[0].reset();
    $('#programs-form').modal('show');
}

$(function() {
    $('#programs-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "programs";
            } else {
                url = "programs/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#programs-form form').serialize(),
                success: function(response) {
                    $('#programs-form').modal('hide');
                    tablePrograms.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                }
            });
            return false;
        }
    });
});

function editProgram(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#programs-form form")[0].reset();
    $.ajax({
        url: "programs" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#programs-form').modal('show');
            $('#id').val(data.id);
            $('#location_id').val(data.location_id);
            $('#program_name').val(data.program_name);
            $('#program_version').val(data.program_version);
            $('#program_description').val(data.program_description);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Programas de formación

// Tabla para mostrar Competencias

var tableCompetences = $('#competences').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/competences/get',
    columns: [
        { data: 'program_name', name: 'id_program' },
        { data: 'competence_name', name: 'competence_name' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Competencias
function addCompetence() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#competences-form form')[0].reset();
    $('#competences-form').modal('show');
}

$(function() {
    $('#competences-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "competences";
            } else {
                url = "competences/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#competences-form form').serialize(),
                success: function(response) {
                    $('#competences-form').modal('hide');
                    tableCompetences.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                }
            });
            return false;
        }
    });
});

function editCompetence(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#competences-form form")[0].reset();
    $.ajax({
        url: "competences" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#competences-form').modal('show');
            $('#id').val(data.id);
            $('#id_program').val(data.id_program);
            $('#competence_name').val(data.competence_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Competencias

// Tabla para mostrar Resultados de aprendizaje

var tableLearningResults = $('#learning_results').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/learning_results/get',
    columns: [
        { data: 'competence_name', name: 'id_competence' },
        { data: 'learning_result', name: 'learning_result' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});


//Funciones para agregar y editar Tipos de producto
function addLearningResult() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#learningResult-form form')[0].reset();
    $('#learningResult-form').modal('show');
}

$(function() {
    $('#learningResult-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "learning_results";
            } else {
                url = "learning_results/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#learningResult-form form').serialize(),
                success: function(response) {
                    $('#learningResult-form').modal('hide');
                    tableLearningResults.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editLearningResult(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#learningResult-form form")[0].reset();
    $.ajax({
        url: "learning_results" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#learningResult-form').modal('show');
            $('#id').val(data.id);
            $('#id_competence').val(data.id_competence);
            $('#learning_result').val(data.learning_result);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Resultados de aprendizaje



// Tabla para mostrar Tipo de productos


var tableProductTypes = $('#product_types').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/product_types/get',
    columns: [
        { data: 'product_type_name', name: 'product_type_name' },
        { data: 'description', name: 'description' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Resultados de aprendizaje
function addProductType() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#productType-form form')[0].reset();
    $('#productType-form').modal('show');
}

$(function() {
    $('#productType-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "product_types";
            } else {
                url = "product_types/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#productType-form form').serialize(),
                success: function(response) {
                    $('#productType-form').modal('hide');
                    tableProductTypes.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editProductType(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#productType-form form")[0].reset();
    $.ajax({
        url: "product_types" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#productType-form').modal('show');
            $('#id').val(data.id);
            $('#product_type_name').val(data.product_type_name);
            $('#description').val(data.description);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Tipo de producto


// Tabla para mostrar Presentaciones


var tablePresentations = $('#presentations').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/presentations/get',
    columns: [
        { data: 'presentation', name: 'presentation' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Presentaciones
function addPresentation() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#presentation-form form')[0].reset();
    $('#presentation-form').modal('show');
}

$(function() {
    $('#presentation-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "presentations";
            } else {
                url = "presentations/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#presentation-form form').serialize(),
                success: function(response) {
                    $('#presentation-form').modal('hide');
                    tablePresentations.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editPresentation(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#presentation-form form")[0].reset();
    $.ajax({
        url: "presentations" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#presentation-form').modal('show');
            $('#id').val(data.id);
            $('#presentation').val(data.presentation);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Presentaciones



// Tabla para mostrar Presentaciones

var tableMeasures = $('#measures').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/measures/get',
    columns: [
        { data: 'measure_name', name: 'measure_name' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Unidades de medida
function addMeasure() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#measure-form form')[0].reset();
    $('#measure-form').modal('show');
}

$(function() {
    $('#measure-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "measures";
            } else {
                url = "measures/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#measure-form form').serialize(),
                success: function(response) {
                    $('#measure-form').modal('hide');
                    tableMeasures.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editMeasure(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#measure-form form")[0].reset();
    $.ajax({
        url: "measures" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#measure-form').modal('show');
            $('#id').val(data.id);
            $('#measure_name').val(data.measure_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Unidad de medida


// Tabla para mostrar Tipo de documento

var tableDocumentType = $('#document_types').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/document_types/get',
    columns: [
        { data: 'type_document', name: 'type_document' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Tipo de documento
function addDocumentType() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#documentType-form form')[0].reset();
    $('#documentType-form').modal('show');
}

$(function() {
    $('#documentType-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "document_types";
            } else {
                url = "document_types/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#documentType-form form').serialize(),
                success: function(response) {
                    $('#documentType-form').modal('hide');
                    tableDocumentType.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editDocumentType(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#documentType-form form")[0].reset();
    $.ajax({
        url: "document_types" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#documentType-form').modal('show');
            $('#id').val(data.id);
            $('#type_document').val(data.type_document);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Tipo de Documento


// Tabla para mostrar Caracterización

var tableCharacterizacions = $('#characterizations').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/characterizations/get',
    columns: [
        { data: 'characterization_name', name: 'characterization_name' },
        { data: 'status', name: 'status' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});


//Funciones para agregar y editar Caracterizaciones
function addCharacterization() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#characterization-form form')[0].reset();
    $('#characterization-form').modal('show');
}

$(function() {
    $('#characterization-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "characterizations";
            } else {
                url = "characterizations/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#characterization-form form').serialize(),
                success: function(response) {
                    $('#characterization-form').modal('hide');
                    tableCharacterizacions.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editCharacterization(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#characterization-form form")[0].reset();
    $.ajax({
        url: "characterizations" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#characterization-form').modal('show');
            $('#id').val(data.id);
            $('#characterization_name').val(data.characterization_name);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}

// Fin seccion Caracterización


// Tabla para mostrar Roles

var tableRoles = $('#roles').DataTable({
    destroy: true,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        "url": '/DataTables/datatables-spanish.json'
    },
    ajax: '/roles/get',
    columns: [
        { data: 'role', name: 'role' },
        { data: 'action', name: 'action', orderable: false, searchable: true },
    ]
});

//Funciones para agregar y editar Caracterizaciones
function addRole() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#role-form form')[0].reset();
    $('#role-form').modal('show');
}

$(function() {
    $('#role-form form').on('submit', function(e) {
        if (!e.isDefaultPrevented()) {
            var id = $('#id').val();
            if (save_method == 'add') {
                url = "roles";
            } else {
                url = "roles/" + id;
            }
            $.ajax({
                url: url,
                type: "POST",
                data: $('#role-form form').serialize(),
                success: function(response) {
                    $('#role-form').modal('hide');
                    tableRoles.ajax.reload();
                    if (save_method == 'add') {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento agregado exitosamente!');
                    } else {
                        toastr.options = {
                            "positionClass": "toast-bottom-right"
                        }
                        toastr.success('Elemento editado exitosamente!');
                    }
                },
                error: function() {
                    toastr.options = {
                        "positionClass": "toast-bottom-right"
                    }
                    toastr.error('Oops!, Se ha generado un error!');
                    tableLearningResults.ajax.reload();
                }
            });
            return false;
        }
    });
});

function editRole(id) {
    save_method = "edit";
    $('input[name=_method]').val('PATCH');
    $("#role-form form")[0].reset();
    $.ajax({
        url: "roles" + '/' + id + "/edit",
        type: "GET",
        dataType: "JSON",
        success: function(data) {
            $('#role-form').modal('show');
            $('#id').val(data.id);
            $('#role').val(data.role);
        },
        error: function() {
            alert("No hay datos");
        }
    });
}
// Fin seccion Roles