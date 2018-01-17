toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": true,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$("#resetbutton").click(function(){//para resetar o img para nenhum ficheiro selecionado ao clicar no butao reset
  $("#name-file").text("Nenhuma imagem selecionada");
});


//SELECIONAR IMAGEM PARA APARECER O NOME
$("#img").change(function(){

        if($("#img").val() == ""){
          $("#name-file").text("Nenhuma imagem selecionada");
        }
        else
        {
          var text = $("#img").val();

          var str = escape(text);
          var res = str.split("%5C");
          $("#name-file").text(res[2]);
        }
});
// .\FIM IMAGEM PARA APARECER O NOME

//Verificar se o IMDB foi corretamente inserido
$("#imdb").blur(function(){
  var imdb = document.getElementById("imdb");

  //alert($("#imdb").html.length);
  //alert(document.getElementById("imdb").value.length);

  if(imdb.value.length > 10){
    //aqui para por o codigo da form com a cruz de errado e vermelho a volta
  }
  else if(imdb.value.length > 0 && imdb.value.length < 9){
    //dar erro tambem porque nao tem o comprimento suficiente
  }
  else{
    //aqui e para meter o codigo de quando esta certo
  }
});
// .\FIM IMDB


// FORM SUBMIT INICIO
$(document).ready(function (e) {
  $("#newseriemanual").submit(function(e) {
    e.preventDefault();

    //alert("testing");
    $.ajax({
      url: "./assets/php/novaseriem.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data)
      {
         //console.log(data);

         var str = data;
         var res = str.split("/");

         if(res[1] == "true"){
            toastr["success"]("Serie Inserida com Sucesso!!");
         }
         else if(res[1] == "already"){
            toastr["warning"]("Esta serie ja foi inserida! Caso ainda não esteja disponivel em opção ao inserir episodios pode ainda nao ter sido confirmada pelo admin");
         }
         else if(res[0] == "falseimg"){
            toastr["warning"]("Tens de selecionar uma imagem para inserir não outro ficheiro!!!");
         }
         else if(res[0] == "again"){
            toastr["info"]("Tenta outra vez");
         }
         else{
            toastr["error"](data);
            console.log(data);
         }
      },
      error: function() 
      {
        toastr["error"]("Algo correu mal!!");
      }           
    })
  })
});
// .\FIM FORM SUBMIT
