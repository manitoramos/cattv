	<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <span class="navbar-header">
      <a class="navbar-brand" href="<?php
		if($_SERVER['SERVER_NAME'] == "localhost")
		{
			echo "http://" . $_SERVER['SERVER_NAME'] . "/cattv";
		}
		else
		{
			echo "http://" . $_SERVER['SERVER_NAME'];
		}
	  
	  
	  ?>">CatTv</a>
    </span>
    <ul class="nav navbar-nav">
      <!--<li class=""><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>-->
    </ul>
    <ul class="nav navbar-nav navbar-right"><!--
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
    </ul>
  </div>
</nav>