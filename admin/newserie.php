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
  <title>CatTv - Nova Serie</title>
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
  </style>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php
    include("assets/navigation/navigation.php");//MENU DE TODAS AS PAGINAS NO MODO ADMIN
  ?>
  <div class="content-wrapper" style="background-color: rgba(204, 230, 255, 0.8);">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" id="troc">Series - Nova Serie <b>[Modo Manual]</b></li>
      </ol>
      <div class="row">
        <div class="col-md-12 text-center whtt">
          <a class="btn btn-dark" onclick="manual()" style="cursor:pointer;">Manual</a>
          <a class="btn btn-dark" onclick="api()" style="cursor:pointer;">API</a>
        </div>
      </div>
      <br>
      <!-- A PARTE -->
      <?php require("assets/php/series/newseriemanual.php"); ?>

      <?php require_once("assets/php/series/newserieapi.php"); ?>

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

    <script src="assets/toastr/toastr.min.js"></script>
    <link href="assets/toastr/toastr.min.css" rel="stylesheet">

    <script src="assets/js/series/newseriemanual.js"></script>
    <script src="assets/js/series/newserieapi.js"></script>
    <script src="assets/js/newserie.js"></script>

  </div>
</body>

</html>
