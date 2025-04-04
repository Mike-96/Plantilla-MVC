// swalToast.js
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

// swal function
function mensaje(icono,mensaje) {
  Toast.fire({
    icon: icono,
    title: mensaje,
  });
}

//
function mensajeLogin(){
  let timerInterval
Swal.fire({
  title: "Bienvenido!",
  html: 'Creando la seseion <b></b> milliseconds.',
  timer: 1500,
  timerProgressBar: true,
  heightAuto:false,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    location.reload();//recargar la apgina con la sesion ya credada
  }
})
}

var ip = "";

document.addEventListener('DOMContentLoaded', function() {
  // Función para obtener la dirección IP pública del cliente
  $.getJSON('https://api.ipify.org?format=json', function(data) {
    ip = data.ip;
    console.log(ip); // Imprime la dirección IP en el console log
    }).fail(function() {
        console.log('No se pudo obtener la dirección IP');
    });
});


var btn_login = document.getElementById("btn_login");
btn_login.onclick = function(e) {
    e.preventDefault(); // Previene el comportamiento por defecto del botón

    var txt_email = document.getElementById("txt_email").value;
    var txt_password = document.getElementById("txt_password").value;

    if (txt_email.trim() === "" || txt_password.trim() === "") {
      return mensaje("info","Rellene los campos vacíos!");
    }

    $.ajax({
        url: 'controller/users/c_login.php',
        type: 'POST',
        data: {
            email: txt_email,
            password: txt_password
        }

    }).done(function (resp) {
      var data = JSON.parse(resp);

      if (data.length>0) {
        if (data[0][7] !== "1") {
          return mensaje("warning", "El usuario no tiene acceso, comuníquese con el administrador del sistema!");
        }
        $.ajax({
          url: 'controller/users/c_create_sesion.php',
          type: 'POST',
          data: {
              user_id: data[0][0],
              user_image: data[0][1],
              user_name: data[0][2],
              email: data[0][3],
              rol: data[0][6]
          }

        }).done(function(r){ 
          mensaje("success","Login successful!");
          setTimeout(function() {//damos un tiempo entre cada funcion para hacerlo mas dinamico
            location.reload(); //reload a la pagina para que cargue el index
            }, 2000); // 2000 milisegundos = 2 segundos
        })
       
      } else {
        mensaje("error","Usuario o Contraseña incorrecta!");
        //console.log(data);
      }
        
    })

}
