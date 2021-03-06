<?php
  session_start();
  include("assets/bd/bd.php");
  
  $SQL88 = "SELECT * FROM series";
  $res88 = mysqli_query($BD,$SQL88);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Series - Novo Episodio</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <style>
    .whtt{
      color:white;
    }

    .progress-bar{
      animation: progress 1.5s easy-in-out forwards;
    }
  </style>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
    include("assets/navigation/navigation.php");//MENU DE TODAS AS PAGINAS NO MODO ADMIN
  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="progress" id="ttsda" style="margin-bottom: 5px; display:none;">
<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Series - Novo Episodio</li>
      </ol>
      <div class="row">
        <!--<div class="col-md-12 text-center whtt">
          <a class="btn btn-dark" onclick="manual()" style="cursor:pointer;">Manual</a>
          <a class="btn btn-dark" onclick="manual()" style="cursor:pointer;">.txt</a>
          <a class="btn btn-dark" onclick="api()" style="cursor:pointer;">API</a>
        </div>-->
      </div>
      <!-- A PARTE -->
      <?php include("assets/php/series/newepnotauto.php"); ?>

      <?php require_once("assets/php/series/newepapi.php"); ?>

      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include("assets/navigation/footer.php"); ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include("assets/navigation/modal_logout.php"); ?>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <script src="assets/js/series/newepapi.js"></script>
    <script>
      $( "#selectmetedo" ).change(function() {
        if($("#selectmetedo").val() == "manual"){
          $("#manualform").show();
          $("#apiform").hide();
        }
        else if($("#selectmetedo").val() == "api"){
          $("#manualform").hide();
          $("#apiform").show();
        }
        else{
          $("#manualform").hide();
          $("#apiform").hide();
        }
      });

      function teste(come){
        tagname = come;
        $('#manualform')[0].reset();
        $('#apiform')[0].reset();
        $("#legendmethod").show();
        //console.log(tagname);
      }

      var isPaused = false;
      $(document).ready(function (e) {
        $("#apiform").submit(function(e) {
          e.preventDefault();
            gerarhash();
            //setTimeout(function() {
              waitForIt();//so manda a legenda quando o hash tiver pronto
              function waitForIt(){
                  if (isPaused) {
                      setTimeout(function(){waitForIt()},100);
                  } else {
                      $.ajax({
                        url: 'http://cattv.000webhostapp.com/savesub.php',
                        type: 'POST',
                        data: new FormData(document.getElementById('apiform')),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(data) {
                            console.log(data);
                            if(data == "moved")
                            {
                              console.log("movida com successo!");
                            }
                        },
                        error: function(data) {

                        }
                    })
                  }
              }
            //}, 3000);
        })
      });


        function gerarhash(){
          isPaused = true;
            $.ajax({
              url: 'assets/php/novaseriesavep.php',
              type: 'POST',
              data: { work: "publishep" },
              success: function(data) {
                  console.log(data);
                  if($("#selectmetedo").val() == "manual"){$("#subname").val(data)}
                  else if($("#selectmetedo").val() == "api"){$("#subname2").val(data)}
                  isPaused = false;
              },
              error: function(data) {
                alert("algo correu mal ao gerar um hash para o nome da legenda");
              }
            })
       }
    </script>
  </div>
</body>

</html>
