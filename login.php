<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon"/>    
    <title>Zalego | login</title>
</head>
<body>
    <!-- nav -->
<?php include('includes/nav.html'); ?>
<p>login</p>

<!-- footer -->
<div class="fixed-bottom">
<?php include('includes/footer.html');?>

</div>
<!-- content -->
<div class="container">
    <div class="row mt-5">
      
        <div class="col-md-4 ml-auto mr-auto">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">         
                <form autocomplete="off" action="files/authentication.php" method="POST">
                    <?php 
                        if(isset($_SESSION["Error"]) && $_SESSION["Error"] != null){

                            ?>

                                <div class="mb-2 mt-2">
                               

                                    <span class="text-sm-center text-danger py-2">
                                    <?php  
                                    echo $_SESSION["Error"];
                                        $_SESSION["Error"] = null;
                                    ?>
                                    </span>
                                </div>

                            <?php
                        }

                        if(isset($_SESSION["success"]) && $_SESSION["success"] != null){

                            ?>

                                <div class="mb-2 mt-2">
                               

                                    <span class="text-sm-center text-success py-2">
                                    <?php  
                                    echo $_SESSION["success"];
                                        $_SESSION["success"] = null;
                                    ?>
                                    </span>
                                </div>

                            <?php

                        }
                    ?>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group mt-3">                      
                        <button type="submit" class="btn btn-primary btn-smfloat-left" name="login" style="width: 110px;">Login</button>
                        <a href="signup.php" class=" page-link btn-sm float-right">I do not have an Account?</a>                       
                    </div>
                    
                </form>
        
            </div>
        </div>
        
    </div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>