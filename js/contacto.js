$(document).ready(function(){
    $('#btnSend').click(function(){

        let errores = '';

        if( $('#name').val() == '' ){
            errores += '<p>Escriba un nombre</p>';
            $('#name').css("border-bottom-color", "#F14B4B")
        } else{
            $('#name').css("border-bottom-color", "#d1d1d1")
        }
        if( $('#email').val() == '' ){
            errores += '<p>Ingrese un correo</p>';
            $('#email').css("border-bottom-color", "#F14B4B")
        } else{
            $('#email').css("border-bottom-color", "#d1d1d1")
        }
        if( $('#asunto').val() == '' ){
            errores += '<p>Escriba un asunto</p>';
            $('#asunto').css("border-bottom-color", "#F14B4B")
        } else{
            $('#asunto').css("border-bottom-color", "#d1d1d1")
        }
        if( $('#mensaje').val() == '' ){
            errores += '<p>Escriba un mensaje</p>';
            $('#mensaje').css("border-bottom-color", "#F14B4B")
        } else{
            $('#mensaje').css("border-bottom-color", "#d1d1d1")
        }


        if( errores == '' == false){
            let mensajeModal = '<div class="modal-wrap">'+
                                    '<div class="mensaje-modal">'+
                                        '<h3>Errores encontrados</h3>'+
                                        errores+
                                        '<span id="btnClose">Cerrar</span>'+
                                    '</div>'+
                                '</div>'

            $('body').append(mensajeModal);
        }

        // CERRANDO MODAL ==============================
        $('#btnClose').click(function(){
            $('.modal-wrap').remove();
        });
    });
});
