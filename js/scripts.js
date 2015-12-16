$(document).ready(function (){

    var dateDiff = function(start, end) {
        start = new Date(start);
        end = new Date(end);
        var diff  = new Date(end - start);
        return Math.floor(diff/1000/60/60/24);
    };

    $('.datepicker').datepicker({
        format : 'yyyy/mm/dd'
    })
    .on('changeDate', function (e){
        $(this).datepicker('hide');
    });

    $('button[type=submit]').off().click(function (e) {
        if (this.id === "dev") {
            dias = dateDiff($('#fecha_dev_sol').val(), $('#fecha_dev').val());
            if (dias > 0)
                alert("Tiene " + dias + " días de retraso");

        }
        $('form').valid();
    });

    $('#add_eq').off().click(function (e) {
        e.preventDefault();
        $('#eq').clone().appendTo('#equipos');
    });

    $('#aprobar_sol').off().click(function (e) {
        var aprobados = $("input[id='cantidad_sol']")
              .map(function() {
                return $(this).val();
            })
              .get();

        for (var i = 0; i < aprobados.length; ++i) {
            if (parseInt(aprobados[i]) > parseInt($($('td[id=disponibles]')[i]).text())) {
                e.preventDefault();
                alert('No puede aprobar una cantidad de equipos mayor a la disponible');
            }
        }
    });

    $.extend($.validator.messages, {
        required: "Debe ingresar este campo.",
        date: "Introduzca una fecha válida.",
        email: "Introduzca un email válido.",
        equalTo: "Las claves no coinciden."
    });

    $.validator.setDefaults({
      debug: true,
      success: "valid"
    });

    $('#actualizar_user').off().click(function (e) {
        $('form').valid();
        var new_clave = $('#new_clave').val(),
            new_clave2 = $('#new_clave2').val();

        if (new_clave !== new_clave2) {
            e.preventDefault();
            alert('Las claves nuevas no coinciden');
        }

    });

    $('#asignar').off().click(function (e) {
        var aprobados = $("#cantidad").val();
        if (parseInt(aprobados) > parseInt($($('td[id=disponibles]')[0]).text())) {
            e.preventDefault();
            alert('No puede asignar una cantidad de equipos mayor a la disponible');
        }
    });

    $('.delete').off().click(function (e) {
        var type = this.href.match(/type=(.*?)&/)[1],
            last = type.length - 1,
            word = type === 'solicitud' ? 'a' : 'e';
        type = type[last] === 's' ? type.substr(0, last) : type;
        if (!confirm('Está seguro que desea eliminar est' + word + ' ' + type + '?'))
            e.preventDefault();
    });


    $('form').validate({
        rules: {
            usuario : "required",
            clave:"required",
            nombres:"required",
            apellidos:"required",
            ci:"required",
            telefono:"required",
            fecha_sol:{
                required : true,
                date : true
            },
            fecha_dev:{
                required : true,
                date : true
            },
            "cantidad[]": "required",
            modelo:"required",
            marca:"required",
            serie:"required",
            cantidad:"required",
            dias_mant:"required",
            email:{
                required:true,
                email:true
            },
            new_clave2: {
              equalTo: "#new_clave"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});