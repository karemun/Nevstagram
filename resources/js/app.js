import Dropzone from 'dropzone'

Dropzone.autoDiscover = false; //Desactivar auto

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,
    //Se crea cuando se inicializa dropzone
    init: function () {
        //Si hay algo anteriormente, 
        if(document.querySelector('[name="imagen"]').value.trim()) {
            const imagenPublicada= {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('[name="imagen"]').value;
            //Se manda a llamar
            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);
            imagenPublicada.previewElement.classList.add("dz-success", "dz-complete");
        };
    },
})

//Cuando se envia: archivo actual, respuesta 
dropzone.on('success', function(file, response) {
    //Se asigna el nombre de la imagen al valor del input de imagen en create.blade
    document.querySelector('[name="imagen"]').value = response.imagen;
})
//Cuando se elimina
dropzone.on('removedfile', function() {
    document.querySelector('[name="imagen"]').value = "";
})
