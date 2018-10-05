$(() => {

    $("#region-form form").validate({
        rules: {
            region_name: {
                required: true,
                maxlength: 45
            }
        },
        messages: {
            region_name: {
                required: "El campo Regional es oblogatorio.",
                maxlength: "El campo Regional debe contener máximo 45 caracteres."
            }
        }
    });

    $("#complexes-form form").validate({
        rules: {
            id_region: {
                required: true
            },
            complex_name: {
                required: true,
                maxlength: 200
            }
        },
        messages: {
            id_region: {
                required: "El campo Regional es oblogatorio."
            },
            complex_name: {
                required: "El campo Nombre del Complejo es obligatorio.",
                maxlength: "El campo Nombre del Complejo debe contener máximo 200 caracteres."
            }
        }
    });
});