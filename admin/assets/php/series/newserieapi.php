<?php 
//precisar disto \/ para fazer algumas cenas porcausa da api
//$meke = "ei";
//$meke .= "i";
?>
<form id="newserieapi" method="POST" style="display:none;" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="imdb2" class="col-2 col-form-label">Imdb</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="imdb2" name="imdb2" type="text" class="form-control here">
      </div>
    </div>
  </div>
<!--<div class="form-group row">
    <label for="categorias2" class="col-2 col-form-label">Categorias</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="categorias2" name="categorias2" type="text" class="form-control here" placeholder="Exemplo: Horror, Ação, Aventura">
      </div>
    </div>
  </div>-->
  <div class="form-group row">
    <label for="img2" class="col-2 col-form-label">Imagem</label> 
    <div class="col-8">
      <label class="custom-file">
        <input type="file" id="img2" name="img2" class="custom-file-input" placeholder="asdasda">
        <span class="custom-file-control"></span>
      </label>
      <br>
      <label id="name-file2">Nenhuma imagem selecionada</label>
      <div class="alert alert-danger" role="alert">
  		Imagem não é obrigatorio ser inserida via API, caso não insiras nenhuma imagem, a do imdb sera a escolhida
	  </div>
    </div>
  </div>    
  <div class="form-group row">
    <div class="col-12 text-center">
      <button name="newseriebutton" id="newseriebutton2" type="submit" class="btn btn-primary">Inserir</button>
      <button class="btn btn-default" id="resetbutton2" type="reset">Limpar Dados</button>
    </div>
  </div>
</form>
