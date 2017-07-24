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

    <title>Carousel Template for Bootstrap</title>

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
          <?php echo $_header; ?>
        </div>
      </div>
    </div>

      <!-- START THE FEATURETTES -->
    <section class="article-column">
      <?php echo $_content; ?>
    </section>

    <footer>
      <?php echo $_footer; ?>
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
