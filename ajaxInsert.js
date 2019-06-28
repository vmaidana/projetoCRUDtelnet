//script com requisição ajax para insert no banco
function formSubmit(){
    $.ajax({
        type:'POST',
        url:'inserirTecnico.php',
        data:$('#formTecnico').serialize(),
        success:function(resposta){
            $('#resposta').html(resposta);
        }
    });
    var form=document.getElementById('formTecnico').reset();
    return false;
}