Dropzone.autoDiscover = false;

// var myDropzone = new Dropzone("#inputUserImg", {
//   url: "#", // URL temporal para evitar el error
//   autoProcessQueue: true, // No sube automáticamente
//   uploadMultiple: false, // No permite subir varios archivos
//   maxFiles: 1, // Solo permite una imagen
//   acceptedFiles: "image/*", // Solo imágenes
//   dictDefaultMessage: "📁 Arrastra tu imagen aquí o haz clic", // Mensaje personalizado
//   addRemoveLinks: true, // Muestra el enlace para eliminar la imagen

//    // Redimensionar las imágenes a 100x100 píxeles
//    resizeWidth: 100, // Establece el ancho máximo
//    resizeHeight: 100, // Establece la altura máxima
//    resizeMethod: "crop", // Puedes usar 'crop' o 'contain' dependiendo del efecto deseado
//     resizeQuality: 0.5, // Calidad de la imagen

//   // Verifica si ya hay un archivo y lo elimina al agregar uno nuevo
//   init: function() {
//     this.on("addedfile", function(file) {
//       // Si ya hay un archivo, lo elimina
//       if (this.files.length > 1) {
//         this.removeFile(this.files[0]);
//       }
//     });
//   },
// });

// Aplicar estilos en línea directamente al contenedor de Dropzone

var myDropzone = new Dropzone("#inputUserImg", {
  url: "model/upload.php", // URL correcta según la estructura del proyecto
  autoProcessQueue: true,
  uploadMultiple: false,
  maxFiles: 1,
  acceptedFiles: "image/*",
  dictDefaultMessage: "📁 Arrastra tu imagen aquí o haz clic",
  addRemoveLinks: true,
  
  resizeWidth: 100,
  resizeHeight: 100,
  resizeMethod: "crop",
  resizeQuality: 0.5,

  init: function() {
    this.on("addedfile", function(file) {
      if (this.files.length > 1) {
        this.removeFile(this.files[0]);
      }
    });

    this.on("success", function(file, response) {
      try {
        var res = (typeof response === "object") ? response : JSON.parse(response);
        if (res.status === "success") {
          document.getElementById("userPhotoPath").value = res.file_path;
          console.log("Imagen subida: " + res.file_path);
        } else {
          toastr["error"](res.message, "Error en la imagen");
          this.removeFile(file);
        }
      } catch (e) {
        toastr["error"]("Error al procesar la respuesta del servidor", "Error");
        console.error("Respuesta del servidor no es JSON válido:", response);
        console.error(e);
      }
    });
       
    
    this.on("removedfile", function(file) {
      var filePath = document.getElementById("userPhotoPath").value;
      if (filePath) {
        $.ajax({
          url: "model/delete_image.php",
          type: "POST",
          data: { file_path: filePath },
          success: function(response) {
            var res = (typeof response === "object") ? response : JSON.parse(response);
            if (res.status === "success") {
              console.log("Imagen eliminada del servidor: " + filePath);
              document.getElementById("userPhotoPath").value = "";
            } else {
              toastr["error"](res.message, "Error al eliminar la imagen");
            }
          }
        });
      }
    });
  },
});



document.getElementById("inputUserImg").style.cssText = `
  border: 1px dashed #0087F7;
  border-radius: 10px;
  text-align: center;
`;

