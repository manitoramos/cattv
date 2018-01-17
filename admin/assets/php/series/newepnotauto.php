<!-- INSERIR SEM APIS -->
<div class="row">
        <div class="col-md-12">
          <h1></h1>

      <center>

      <div class="col-md-4">
        <select class="form-control" id="choiceserie">
          <option value="">Escolha a serie a inserir:</option>
          <?php
            while($reg88 = mysqli_fetch_array($res88))
            {
              echo "<option value=\"{$reg88['imbd']}\">{$reg88['titulo']}</option>";
            }
          ?>
        </select>
      </div>
    </div>
    </div>

    <div class="row">

      </center>
      <div class="col-md-8">
        <label for="comment" class="let">Insere o codigo aqui:</label>
        <textarea class="form-control" rows="20" id="comment" placeholder="Exemplo:
10]<-Temporada
1**2]<-Episodios
mekeke**asdasda]<-titulo
asdasdasdasdadasdasda**asdas]<-sinopse
9.9**9.1]<-imbd rating
openload**asdasd]<-openload
streamango**asdasda]<-streamango"
        style="resize:none;"></textarea>
        <button type="button" class="btn btn-primary" onclick="inserir()">Inserir</button>
                </div>
      <div class="col-md-4">
      <label for="logs" class="let">Logs:</label>
      <textarea class="form-control" id="logs" rows="20" style="resize:none;" disabled></textarea>
      </div>
	</div>
      <!--Testing withou ajax
      <div class="col-md-12">
        <form action="inserir.php" method="post">
          <textarea class="form-control" name="inseason" rows="35" style="resize:none;"></textarea>
          <input type="submit">
        </form>
      </div>-->
  
  
  <script>
    function inserir(){
      
      
      $.ajax({
        url: 'inserir.php',
        type: 'POST',
        data: { inseason: document.getElementById('comment').value, imbd: document.getElementById('choiceserie').value },
        success: function(result) {
          if(result == "error1")
          {
            document.getElementById("choiceserie").focus();
            $('#logs').text("Escolhe a serie a que pretendes adicionar episodios");
          }
          else if(result == "error2")
          {
            document.getElementById("comment").focus();
            $('#logs').text("Sem nenhum episodio para inserir");
          }
          else
          {
            //alert('the request was successfully sent to the server');
            $('#logs').text(result);
          }
        }
      });
      
      
      //document.getElementById('logs').text = "GG";
      //$('#logs').text(document.getElementById('comment').value);
      
      //alert(document.getElementById('comment').value);
      
      /*
      var http = new XMLHttpRequest();
    
      var parametros = "inseason=" + escape(document.getElementById('comment').value);
      
      //escape() para nao ler os caracters especias como o & para nao dar conflitos de passar outro parametros
      http.open("POST", "inserir.php", true);
      
      http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      http.onreadystatechange = function() {
        if(http.readyState == 4 && http.status == 200) 
        {
          
          //console.log(http.responseText);
          $('#logs').text(http.responseText);
          console.log(http.responseText.length);
          
        }
      }
      http.send(parametros);*/
    }
  </script>