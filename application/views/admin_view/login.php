<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo  $title; ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <style> body{ background-color: #f5f3f3; }</style>

    <body class="body hold-transition login-page">
         <div class="container">
            <div class="login-box">
                    <div class="login-logo">
                        <b>Admin Login</b>
                    </div>
            <div class="login-box-body">
              <form action="<?php echo base_url();?>panel/auth" method="POST">
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username" autofocus required=""/>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck"></div>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                    </div>
              </form>
            <center>
            <?php echo $error; ?>
            </center>
            </div>
          </div>
          
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
