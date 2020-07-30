<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
        
    <form action="register.php" method="POST">
        <div class="container">
            <?php include('error.php') ?>
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email" class="form-control col-md-4">
                </div>
                <div class="form-group">
                    <input type="password" name="password1" placeholder="Password" class="form-control col-md-4">
                </div>
                <div class="form-group">
                    <input type="password" name="password2" placeholder="Confirm Password" class="form-control col-md-4">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" name='register'> Register</button>
                </div>
                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
        </div>
    </form>
   

</body>
</html>