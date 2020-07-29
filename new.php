<?php include("server.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <form action="new.php" method="post">
    <?php include('error.php'); ?>
        <div class="container">
            <div class="form-group" class>
                <label for="ename" class="text-success">Name</label>
                <input name="ename" type="text" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label for="dob" class="text-success">Birthday</label>
                <input name="dob" type="date" class="form-control col-md-4">
            </div>
            <div class="form-group">
                <label for="edu" class="text-success">Education</label>
                <input name="edu" type="radio" value='graduated'>Graduated
                <input name="edu" type="radio" value="post graduated"> Post Graduated
            </div>
            <div class ="form-group">
                <label for="itskill" class="text-success">IT Skill</label>
                <input type="checkbox" name="skill[]" value="php">PHP
                <input type="checkbox" name="skill[]" value="javascript">Javascript
                <input type="checkbox" name="skill[]" value="css">CSS
                <input type="checkbox" name="skill[]" value="mysql">Mysql
            </div>
            <div class="form-group">
                <label for="gender" class="text-success">Gender</label>
                <input type="radio" name="gender" value ="male">Male
                <input type="radio" name="gender" value="female">Female
            </div>
            <div class="form-group">
            <label for="department" class="text-success">Department</label>
                <select name="department">
                    <option selected>Choose...</option>
                    <?php 
                        $db = mysqli_connect('localhost', 'root', '', 'firstdatabase');
                       $result = mysqli_query($db,"SELECT id,team from department");
                        while($row = mysqli_fetch_assoc($result))
                        {
                        ?>  
                         <option value=<?php echo $row['id']; ?>><?php echo $row['team'];?>
                         </option>
                    <?php
                        }
                        ?>
                </select>
            </div>
            <div class="form-group">
                <label for="address" class="text-success">Address</label>
                <textarea name="address" class="form-control col-md-4"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-warning" name="insert">Insert</button>
            </div>
    </div>
    </form>

</body>
</html>