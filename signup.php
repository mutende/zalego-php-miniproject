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
    <title>Zalego | Signup</title>
</head>
<body>
    <!-- nav -->
<?php include('includes/nav.html');?>
<br>
<!-- content -->
<div class="container">
    <div class="row mt-5">      
        <div class="col-md-5 ml-auto mr-auto">            
            
            <div class="card">
                <div class="card-header">
                    <h3>Signup</h3>
                </div>
                <div class="card-body">         
                <form autocomplete="off" action="files/authentication.php" method="POST">
                    <div class="form-group">
                        <label for="fname">Full Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" class="form-control" id="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group mt-3">                      
                        <button type="submit" class="btn btn-primary btn-smfloat-left" style="width: 200px;" name="signup">Signup</button>
                        <a href="login.php" class=" page-link btn-sm float-right">I already have an Account?</a>                       
                    </div>
                    
                </form>
        
            </div>
        </div>
        
    </div>
</div>

<!-- footer -->
<?php include('includes/footer.html');?>

<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>    
</body>
</html>