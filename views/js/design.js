var horas = document.getElementsByClassName('horas');
var seg = document.getElementsByClassName('horas')[1];
var images = document.getElementsByClassName('images');

window.addEventListener('load', deshabilitar_t);

var btnForm = $('#btn-form');


btnForm.click((e) => {
    var usuario = $('#usuario');
    var pass = $('#password');

    $.ajax({
        type: 'post',
        url: 'controller/validar_usuario.php',
        data: {usuario: usuario.val(), password: pass.val()},
        success: (data)=>{
            var res = JSON.parse(data);
            validarUsuario(res.mensaje, usuario, pass);
        }
    });
});

function carga(ruta) {
    $('form').waitMe({
        effect : 'facebook',
        onClose : function() {}
      });

      setTimeout(()=>{
        if(ruta != 'undefined') {
            window.open(ruta, '_self');
        }
        console.log(`La ruta es ${ruta}`);
        $('form').waitMe('hide');
      }, 2000);
    
}

//Funcion para validar el usuario
function validarUsuario(status, user, password) {
    var error = $('#errorUsuario');
    var rutaMain = 'views/src/principal.php';
    if(status == 'error') {
        error.removeClass('oculta-error-usuario');
        error.addClass('error-usuario');
        password.val('');
        password.focus();
    }else {
        carga(rutaMain);
    }
}

//----------Condicionando horas----------------//
seg.addEventListener('focusout', function () {
    //alert('sale');
    var valida_h1 = new Array();
    var valida_h2 = new Array();

    var hora_i = document.getElementById('h_inicial').value;
    var hora_f = document.getElementById('h_final').value;

    valida_h1 = validar(hora_i);
    valida_h2 = validar(hora_f);

    var hora_h = valida_h2[0] - valida_h1[0];
    var min_h = valida_h2[1] - valida_h1[1];


    //Validamos la hora para que no de negativo
    if (hora_h < 0) {
        hora_h = hora_h * (-1);
    }

    //Condicionamos para que los minutos no den negativo
    if (min_h < 0) {
        min_h = min_h * (-1);
    }


    //Condicionamos si el horario inicial es mayor que el final
    if (hora_f < hora_i) {
        hora_h = ((24 + parseInt(hora_f)) - parseInt(hora_i));

        if (valida_h2[1] < valida_h1[1]) {
            hora_h = ((24 + parseInt(hora_f)) - parseInt(hora_i)) - 1;
            min_h = ((parseInt(valida_h2[1]) + 60) - (valida_h1[1]));

        }
    }



    if (validar(hora_i) == false || validar(hora_f) == false) {
        if (validar(hora_i) == false) {
            alert('Formato de hora inicial no valido!');
            //document.getElementById('h_inicial').select();
        }

        if (validar(hora_f) == false) {
            alert('Formato de hora final no valido!');
            //document.getElementById('h_final').select();
        }
    } else {
        document.getElementById('h_hombre').value = hora_h + ":" + min_h;
        document.getElementById('res_hh').value = hora_h + ":" + min_h;

    }
});


//-------Abrimos ventana de agregar----------------//
function agregar() {
    window.open('agregar.php', '_self');
}


//-------Abrimos ventana de pendientes----------------//
function pendientes() {
    window.open('pendientes.php', '_self');
}


//-------------Funcion para habilitar los horarios
function habilitar_t() {
    for (var i = 0; i < horas.length; i++) {
        horas[i].disabled = false;
        images[i].disabled = false;
        horas[i].placeholder = 'hh:mm';
    }
}

//-------------Funcion para deshabilitar los tecnicos
function deshabilitar_t() {
    for (var i = 0; i < horas.length; i++) {
        horas[i].disabled = true;
        images[i].disabled = true;
    }

}

///Funcion para validar hora
function validar(hora) {
    var horario = new Array();

    var horas = hora.substr(0, 2);
    var minuto = hora.substr(3, 5);
    var puntos = hora.substr(2, 1);

    if (!isNaN(horas) && hora.length == 5 && puntos == ':' && horas <= 23 && minuto <= 59) {
        horario[0] = horas;
        horario[1] = minuto;

        return horario;

    } else {
        return false;
    }
}

function usuarioAutenticado() {
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    );
}

