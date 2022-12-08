import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone",{
    dictDefaultMessage:"sube aqui tu imagen",
    acceptedFiles:".png, .jpg, .jpeg, .gif",
    addRemoveLinks:true,
    dictRemoveFile:"borrar archivo",
    maxFiles:1,
    uploadMultiple: false,

    init:function(){
        if(document.querySelector('[name="imagen"]').value.trim()){
         const imagenpublicada  = {}
         imagenpublicada.size=1234;
         imagenpublicada.name = document.querySelector('[name="imagen"]').value;

         this.options.addedfile.call(this, imagenpublicada);
         this.options.thumbnail.call(this, imagenpublicada, `/uploads/${imagenpublicada.name}`)

         imagenpublicada.previewElement.cassList.add('dz-success','dz-complete')
        }
    },
}); 

//indicar que vamos a cargar un archivo
dropzone.on('sending',function(file,xhr,formData){
    console.log(file)
   });
   //obtener respuesta de cargue exitoso
   dropzone.on('success',function(file,response){
    document.querySelector('[name="imagen"]').value = response.imagen;
   });

   dropzone.on('removedfile', function(){
    document.querySelector('[name="imagen"]').value = "";
   })


   //en caso de que alla un error y no me suba el archivo
   dropzone.on('error',function(file,message){
    
    console.log(message);
   });
   //cuando subi un archivo y le doy eliminar que me diga archivo eliminado
   dropzone.on('removedfile',function(file,message){
    console.log("archivo eliminado");
   });