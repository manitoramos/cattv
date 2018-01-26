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

	.troll{width: 300px;height: 30px;}
	.clrgoing{color: blue;}.clrsucess{color: green;}
	.tdfn{width: 485px;}.tdnumb{width: 26px;}.tdsize{width: 84px;}.tdstatus{width: 59px;}

	tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<br>
<div class="row">
<div class="col-md-8">
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
<!--<span>Velociade Upload: </span><span id="upersec"></span> WORKING..-->
</div>
<div class="col-md-4">
	<label for="logs" class="let">Logs:</label>
      <textarea class="form-control" id="logsapi" rows="20" style="resize:none;" disabled></textarea>
</div>

</div>



