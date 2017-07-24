<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Bakkah</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style-calendar.css">
    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet" type="text/css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <body>

    <div class="container">
      <div class="top-nav">
      </div>
    </div>
    <div class="navbar-wrapper">
      <div class="container">
          <?php //echo $_header; ?>
        </div>
      </div>
    </div>

      <!-- START THE FEATURETTES -->
    <section class="article-column">
      <?php //echo $_content; ?>
    </section>

    <footer>
      <?php //echo $_footer; ?>
    </footer>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
</html>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="tanggal_lahir"]');
      var container=$('.container').length>0 ? $('.container').parent() : "body";
      var options={
        format: 'dd-mm-yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })


</script>
<div class="container">
<nav class="navbar navbar-inverse navbar-static-top ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>">Home</a></li>
        <li><a href="<?php echo base_url('menu/profile');?>">Profile</a></li>
        <li><a href="<?php echo base_url('menu/faq');?>">FAQ</a></li>
        <li><a href="<?php echo base_url('menu/download');?>">Download</a></li>
        <li><a href="<?php echo base_url('form_controller/sitemaps');?>">Site Maps</a></li>
        <li><a href="<?php echo base_url('menu/registration');?>">Daftar Online</a></li>

      </ul>
    </div>
  </div>
</nav>
</div>

