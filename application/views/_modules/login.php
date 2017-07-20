<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Base Meta Tag -->
    <title><?php echo $title; ?></title>
    <base href="<?php echo base_url(); ?>">
        
    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    
    <!-- Internal CSS -->
    <link rel="stylesheet" href="assets/css/login.css">

    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/animate.delay.css" rel="stylesheet" type="text/css">
        

  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">          
  <?php echo form_open('login/validations', "autocomplete='off'"); ?>
                <h4 class="animate3 bounceIn">Welcome Back</h4>
                <div class="form-horizontal">
                  <p class="animate4 bounceIn"><input name="username" class="form-control input-sm chat-input" type="text" placeholder="Username" required></p>
                  <p class="animate5 bounceIn"><input name="password" class="form-control input-sm chat-input" type="password" placeholder="Password" required></p>
                </div>
                <div class="wrapper">
                  <span class="group-btn">
                    <button type="submit" class="btn btn-primary btn-md"><i id="btnLogin" class="fa fa-sign-in"></i></button>
                    <div class="error-check"></div>
                  </span>
                </div>                         
              </div>
        </div> <!-- End Col MD 4 / RIGHT -->
      </div>
<?php echo form_close(); ?>
    </div> <!-- End Container-Fluid -->
  </body>
</html>


