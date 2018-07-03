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
});