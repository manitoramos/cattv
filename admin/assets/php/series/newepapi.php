<style>
	table {
	    border-collapse: collapse;
	    width: 100%;
	}
	.scrolly{
		max-height: 200px;
	    overflow: auto; 
	}

	.scrolly::-webkit-scrollbar{
		width:3px;
	}
	.scrolly::-webkit-scrollbar-thumb{
		border-radius: 10px;
		background-color:#cccccc;
		box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	}
	.scrolly::-webkit-scrollbar-track{
		border-radius: 10px;
		background-color:white;
		box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	}
	th, td {
	    text-align: left;
	    padding: 3px;
	}

	th{
		background-color: #e9ecef;
	}
	/* STYLE FOR TABLE SERVERS */
	.bdlf{border-left: 1px solid #668cff;border-bottom: 1px solid #688cff;}
	.bdrt{border-right: 1px solid #668cff;}
	.htbb{background-color: #668cff; color:white;}


	.troll{width: 300px;height: 30px;}
	.clrgoing{color: blue;}.clrsucess{color: green;}
	.tdfn{width: 485px;}.tdnumb{width: 26px;}.tdsize{width: 84px;}.tdstatus{width: 59px;}

	tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<div class="row">
<div class="col-md-12">
	<center>
	<table id="servers" style="width: 50%; display:none;">
	<tr>
		<th class="htbb">Server</th>
		<th class="htbb"><a onclick="teste($(this).html())">Status</a></th>
		<th class="htbb">Sent Data</th>
		<th class="bdrt htbb">Events</th>
	</tr>
	<tr style="background-color: white;">
		<td id="oplserver" class="bdlf">Openload</td>
		<td id="oplstatus" class="bdlf">0%</td>
		<td id="opldata" class="bdlf"><span id="oplenv">0 </span>of <span id="oplsize">500 Mb</span></td>
		<td id="oplevents" class="bdlf bdrt">Wainting</td>
	</tr>
	<tr>
		<td id="strserver" class="bdlf">Streamango</td>
		<td id="strstatus" class="bdlf">0%</td>
		<td id="strdata" class="bdlf"><span id="strenv">0 </span>of <span id="strsize">500 Mb</span></td>
		<td id="strevents" class="bdlf bdrt">Wainting</td>
	</tr>
	<tr>
		<th class="htbb"></th>
		<th class="htbb"></th>
		<th class="htbb"></th>
		<th class="bdrt htbb"></th>
	</tr>
	</table>
	</center>
	<br>
	<form id='file-catcher'>
  <input id='file-input' type='file' multiple/>
  <button type='submit' id="buttsend" onclick="tim = setInterval(myTimer, 1000)" class="btn btn-info" disabled>
    Submit
  </button>
</form>
<!--
<div style="text-align: center;">
	<button id="pauseee">Pausar</button>
	<button id="testeee">Cancelar</button>
</div>
-->
<table id="headtable" style="display:none;">
	<th width="26">#</th>
	<th width="485">Filename</th>
	<th width="84">Size</th>
	<th width="61">Status</th>
</table>
<div class="scrolly">
<table id='file-list-display'>
</table>
</div>
<table id="bottable" style="display:none;">
	<th width="26"></th>
	<th width="485"></th>
	<th id="totalflls" width="84">0b</th>
	<th id="ttstt" width="61">0%</th>
</table>
<!--<div class="progress" id="ttsda">
<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>-->

<div style="display: none;" id="percenttt"></div>
<div style="display: none;" id="howmany"></div>
<div style="display: none;" id="donee"></div>
<!--<div id="doing">0</div>-->
<div id="timer"></div>
<span id="sizeenv" style="display:none;">0 de </span><span id="sizemb"></span><span id="sizesend" style="display: none;"> Enviados</span>
<br>


<!--<span>Velociade Upload: </span><span id="upersec"></span> WORKING..
</div>
<div class="col-md-4">
	<label for="logs" class="let">Logs:</label>
      <textarea class="form-control" id="logsapi" rows="20" style="resize:none;" disabled></textarea>
</div>-->

</div>
<div class="col-md-12">
	<div id="legendmethod" style="display: none;">
	<br>
	<center>
	<div class="form-group">
	    <!--<label for="exampleFormControlSelect1"></label>-->
	    <select class="form-control col-md-4" id="selectmetedo">
	      <option value="">Escolhe o Metedo:</option>
	      <option value="manual">Manual</option>
	      <option value="api">Api</option>
	    </select>
  	</div>
  	<form id="manualform" style="display: none;">
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="serieimdb" aria-describedby="" placeholder="Serie IMDB">
  	</div>
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="epimdb" aria-describedby="" placeholder="Episodio IMDB">
  	</div>
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="rating" aria-describedby="" placeholder="Pontuação IMDB">
  	</div>
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="season" aria-describedby="" placeholder="Season">
  	</div>
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="epnumb" aria-describedby="" placeholder="Episode">
  	</div>
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" class="form-control col-md-4" id="title" aria-describedby="" placeholder="Title">
  	</div>
  	<input type="text" name="subname" id="subname" style="display: none;">
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <textarea class="form-control col-md-4" id="sinopse" aria-describedby="" placeholder="Sinopse"></textarea>
  	</div>
  	<div class="form-group">
	    <label for="exampleFormControlFile1">Legenda</label>
	    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  	</div>
  	<div class="form-group">
	   	<button type="submit" class="btn btn-primary">Submit</button>
  	</div>
  	</form>
  	<form id="apiform" style="display: none;">
  	<div class="form-group">
	    <!--<label for="exampleInputEmail1"></label>-->
	    <input type="text" name="epimdb" class="form-control col-md-4" id="epimdb" aria-describedby="" placeholder="Episodio IMDB">
  	</div>
  	<input type="text" name="subname" id="subname2" style="display: none;">
  	<div class="form-group">
	    <label for="exampleFormControlFile1">Legenda</label>
	    <input type="file" name="sub" class="form-control-file" id="exampleFormControlFile1">
  	</div>
  	<div class="form-group">
	    <button type="submit" class="btn btn-primary">Submit</button>
  	</div>	
  	</form>
  	</center>
  	</div>  	
</div>
</div><!-- ./row -->




