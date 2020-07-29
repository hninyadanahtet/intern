<?php
   include("server.php");
   $id = $_GET['id'];
   $result = mysqli_query($db,"SELECT * FROM emember where id = $id");
   $row = mysqli_fetch_assoc($result);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <form action="edit.php" method="post">
    <?php include('error.php'); ?>
        <div class="container">
        <input type="hidden" name ="id" value="<?php echo  $row['id']; ?>">
            <div class="form-group">
                <label for="ename" class="text-success">Name</label>
                <input name="ename" type="text" class="form-control col-md-4" value="<?php echo  $row['name']; ?>">
            </div>
            <div class="form-group">
                <label for="dob" class="text-success">Birthday</label>
                <input name="dob" type="text" class="form-control col-md-4" value="<?php echo  $row['dob']; ?>">
            </div>
            <div class="form-group">
            <label for="department" class="text-success">Department</label>
                <select name="department">
                <option>Choose...</option>

                <?php
                    $team1 = mysqli_query($db, "SELECT * FROM department");
                    while($team = mysqli_fetch_assoc($team1))
                    {
                ?>

                    <option value="<?php echo $team['id'] ?>"
                        <?php if($team['id'] == $row['team']) echo "selected"; ?> >
                        <?php echo $team['team']?>
                    </option>

                    <?php 
                    } 
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="edu" class="text-success">Education</label>
                    <input name="edu" type="radio" value="graduated" <?php if($row['education']=="graduated"){ echo "checked";}?>>Graduated

                    <input name="edu" type="radio" value="post graduated" <?php if($row['education']=="post graduated"){ echo "checked";}?> > Post Graduated
            </div>
            <div class="form-group">
                <label for="gender" class="text-success">Gender</label>
                    <input name="gender" type="radio" value="male" <?php if($row['gender']=="male"){ echo "checked";}?>>Male
                    <input name="gender" type="radio" value="female" <?php if($row['gender']=="female"){ echo "checked";}?> > Female
            </div>
        
            
            <div class="form-group">
                <label for="address" class="text-success">Address</label>
                <textarea name="address" class="form-control col-md-4" row='3'><?php echo $row['address']; ?></textarea>
            </div>
            <div class ="form-group">
                <label for="itskill" class="text-success">IT Skill</label>
                <?php
                $result = mysqli_query($db,"SELECT IT_skill FROM emember where id= $id"); 
 
                while($row = mysqli_fetch_array($result))
                {
                    $skill = explode(",", $row['IT_skill']);
            ?>
                <input type="checkbox" name="skill[]" value="php" <?php if(in_array("php",$skill)) { ?> checked="checked" <?php } ?>>PHP
                <input type="checkbox" name="skill[]" value="javascript" <?php if(in_array("javascript",$skill)) { ?> checked="checked" <?php } ?>>Javascript
                <input type="checkbox" name="skill[]" value="css" <?php if(in_array("css",$skill)) { ?> checked="checked" <?php } ?>>CSS
                <input type="checkbox" name="skill[]" value="mysql" <?php if(in_array("mysql",$skill)) { ?> checked="checked" <?php } ?>>MySQL
                <?php }
            ?>
            </div>  
            <div class="form-group">
                <button class="btn btn-warning" name="update">Update</button>
            </div>
    </div>
    </form>
</body>
</html>