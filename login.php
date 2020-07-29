<?php include('server.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <form action='login.php' method='post'>
    <?php include('error.php'); ?>
                <div class="container">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control col-md-4">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control col-md-4">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" name="login" class="form-control">Login</button>
                    </div>
                    <p>Not a user from register?<a href="register.php">Sign up?</a></p>
                </div>
        </form>
       
</body>
</html>