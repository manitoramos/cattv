<form id="newseriemanual" method="POST" enctype="multipart/form-data">
  <div class="form-group row">
    <label for="imdb" class="col-2 col-form-label">Imdb</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="imdb" name="imdb" type="text" class="form-control here">
      </div>
    </div>
    <!-- Logs para mais para a frente fazer
    <label style="position: absolute; right: 100px;" for="logs" class="col-2 col-form-label">Logs</label>
    <div>
      <textarea class="form-control" id="logs" name="logs" style="cursor: not-allowed; position: absolute; right: 10px; width: 250px; resize: none;" rows="20" disabled></textarea>
    </div>-->
  </div>
  <div class="form-group row">
    <label for="titulo" class="col-2 col-form-label">Titulo</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="titulo" name="titulo" type="text" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="rating" class="col-2 col-form-label">Pontuação</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="rating" name="rating" type="text" class="form-control here" placeholder="Exemplo: 8.9">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="begin" class="col-2 col-form-label">Ano de Inicio e Fim</label> 
    <div class="col-4">
      <input id="begin" name="begin" type="text" class="form-control here" placeholder="Inicio">
    </div>
    <div class="col-4">
      <div class="input-group">
      <input id="end" name="end" type="text" class="form-control here" placeholder="? para mais informaçao">
      <div class="input-group-addon append" data-toggle="tooltip" data-placement="right" title="Se a serie ainda estiver a decorrer nao ponhas nada neste campo">
          <i class="fa fa-question"></i>
          </div>
    </div>
  </div>
</div>
<div class="form-group row">
    <label for="categorias" class="col-2 col-form-label">Categorias</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="categorias" name="categorias" type="text" class="form-control here" placeholder="Exemplo: Terror, Ação, Aventura">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="criador" class="col-2 col-form-label">Cridador/s</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="criador" name="criador" type="text" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="personagens" class="col-2 col-form-label">Personagens</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-addon">
          <i class="fa fa-book"></i>
        </div> 
        <input id="personagens" name="personagens" type="text" class="form-control here">
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="sinopse" class="col-2 col-form-label">Sinopse</label> 
    <div class="col-8">
        <textarea id="sinopse" name="sinopse" class="form-control here" style="resize:none;" rows="4"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="img" class="col-2 col-form-label">Imagem</label> 
    <div class="col-8">
      <label class="custom-file">
        <input type="file" id="img" name="img" class="custom-file-input" placeholder="asdasda">
        <span class="custom-file-control"></span>
      </label>
      <br>
      <label id="name-file">Nenhuma imagem selecionada</label>
    </div>
  </div>    
  <div class="form-group row">
    <div class="col-12 text-center">
      <button name="newseriebutton" id="newseriebutton" type="submit" class="btn btn-primary">Inserir</button>
      <button class="btn btn-default" id="resetbutton" type="reset">Limpar Dados</button>
    </div>
  </div>
</form>