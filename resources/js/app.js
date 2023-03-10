import Dropzone from 'dropzone'

Dropzone.autoDiscover = false; //Desactivar auto

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
})

//Cuando se esta procesando: archivo actual, peticion,
dropzone.on('sending', function(file, xhr, formData) {
    console.log(file);
})
//Cuando se envia: archivo actual, respuesta 
dropzone.on('success', function(file, response) {
    console.log(response);
})
//Cuando hay error: archivo actual, mensaje
dropzone.on('error', function(file, message) {
    console.log(message);
})
//Cuando se elimina
dropzone.on('removedfile', function() {})
