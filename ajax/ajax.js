
$("#nombre_registro").change(function(){
    //console.log( $("#nombre_registro").val() );
    if( $("#nombre_registro").val() != $("#nombre_validar").val()){
        validarExistente("#nombre_registro", "Nombre" )
    }
});

$("#email_registro").change(function(){
    //console.log( $("#nombre_registro").val() );
    if( $("#email_registro").val() != $("#email_validar").val()){
        validarExistente("#email_registro", "Correo Electrónico" )
    }
});

function validarExistente(idElemento, tipoElemento ){
    var nombre = $(idElemento).val();
    var datos = new FormData();
    datos.append("nombre", nombre);

    $.ajax({
        url: "ajax/ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        before: function(){

        },
        success: function(respuesta){
            console.log(respuesta);
            if(respuesta === "1" || respuesta === 1){
                $(idElemento).val("");
                $(idElemento).select();
                document.querySelector("div[for='mensaje_error']").innerHTML = "El "+tipoElemento+" de usuario ya existe.";
            }else{
                document.querySelector("div[for='mensaje_error']").innerHTML = "";
            }
        },
        error: function(respuesta){
            console.log("Ocurrió un error:" + respuesta);
        }, 
        complete: function(){

        }
    });
}

function subir_archivo(){
    var input_file = $("#archivo")[0];
    var file = input_file.files[0];
    if(( typeof file === "object") && (file != null) ){
        var data = new FormData();
        data.append("file",file);
        $.ajax({
            url: "ajax/ajax.php",
            method: "POST",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            before: function(){
                console.log("Subiendo Archivo");
            },
            success: function(respuesta){
                console.log(respuesta);
                if( respuesta == "300"){
                    console.log("Archivo No permitido");
                }else if( respuesta == "301"){
                    console.log("Archivo muy grande");
                }else if( respuesta == "302"){
                    console.log("Falló al subir Archivo");
                }else if( respuesta == "303"){
                    console.log("Archivo Vacío");
                }else{
                    $("#archivo_subido").val(respuesta);
                }
            },
            error: function(respuesta){
                console.log("Ocurrió un error:" + respuesta);
            }, 
            complete: function(){
                console.log("Archivo Subido");
            }
        });
    }
}

/* 

Tarea

Realizar el mismo proceso de verificacion de nombre para el correo electrónico
Y además para el modificar usuarios (editar) en ambos, correo y nombre de usuario

*/