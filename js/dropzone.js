Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#inputUserImg", {
  url: "#", // URL temporal para evitar el error
  autoProcessQueue: true, // No sube automáticamente
  uploadMultiple: false, // No permite subir varios archivos
  maxFiles: 1, // Solo permite una imagen
  acceptedFiles: "image/*", // Solo imágenes
  dictDefaultMessage: "📁 Arrastra tu imagen aquí o haz clic", // Mensaje personalizado
  addRemoveLinks: true, // Muestra el enlace para eliminar la imagen

   // Redimensionar las imágenes a 100x100 píxeles
   resizeWidth: 100, // Establece el ancho máximo
   resizeHeight: 100, // Establece la altura máxima
   resizeMethod: "crop", // Puedes usar 'crop' o 'contain' dependiendo del efecto deseado
    resizeQuality: 0.5, // Calidad de la imagen

  // Verifica si ya hay un archivo y lo elimina al agregar uno nuevo
  init: function() {
    this.on("addedfile", function(file) {
      // Si ya hay un archivo, lo elimina
      if (this.files.length > 1) {
        this.removeFile(this.files[0]);
      }
    });
  },
});

// Aplicar estilos en línea directamente al contenedor de Dropzone
document.getElementById("inputUserImg").style.cssText = `
  border: 1px dashed #0087F7;
  border-radius: 10px;
  text-align: center;
`;

