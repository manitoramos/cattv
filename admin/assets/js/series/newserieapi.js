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
  "timeOut": "8000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$("#resetbutton2").click(function(){//para resetar o img para nenhum ficheiro selecionado ao clicar no butao reset
  $("#name-file2").text("Nenhuma imagem selecionada");
});

//SELECIONAR IMAGEM PARA APARECER O NOME
$("#img2").change(function(){

        if($("#img2").val() == ""){
          $("#name-file2").text("Nenhuma imagem selecionada");
        }
        else
        {
          var text = $("#img2").val();

          var str = escape(text);
          var res = str.split("%5C");
          $("#name-file2").text(res[2]);
        }
});
// .\FIM IMAGEM PARA APARECER O NOME

// FORM SUBMIT INICIO
$(document).ready(function (e) {
  $("#newserieapi").submit(function(e) {
    e.preventDefault();

    //alert("testing");
    $.ajax({
      url: "./assets/php/novaserieap.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function(data)
      {
         //console.log(data);
         //toastr["success"](data);

         var str = data;
         var res = str.split("/");

         if(res[0] == "true"){
            toastr["success"]("Serie Inserida com Sucesso!!");
         }
         else if(res[0] == "already"){
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