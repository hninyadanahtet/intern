<?php
   session_start();
   if(!isset($_SESSION['email']))
   {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
   }
   if(isset($_GET['logout']))
   {
    
       session_destroy();
       unset($_SESSION['email']);
       header('location: login.php');
   }
   if(isset($_GET['addNew']))
   {
       header('location: new.php');
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<div class='header'>
 <!-- <h2>Home Page</h2> -->
 </div>
 <div class = "content">
   <?php
        if(isset($_SESSION['success'])): ?>

     
    <div class="error success" >
    <h3>
        <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            ?>
    </h3>
    </div>
    <?php endif ?>
    <?php
        if(isset($_SESSION['email'])):?>
    
            <p>Welcome<strong><?php echo $_SESSION['email'] ?></strong></p>
    <?php endif ?>
    <p class=" text-left col-md-12 " style="font-size:30px">  
      <a href="index.php?addNew='1'" class="badge badge-info font-weight-light margin-right">Add New</a>
      <a href="index.php?logout='1'"class="badge badge-warning font-weight-light margin-left">Log out</a> </p>
      
    
   
            <?php

                $db = mysqli_connect('localhost','root','','firstdatabase');
                $sql = "SELECT emember.*,department.team FROM emember LEFT JOIN department ON emember.team=department.id";
                $result = mysqli_query($db,$sql);
                echo "<table class='table table-bordered'>
                        <thead class='thead-light'>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Birthday</th>
                                <th>Education</th>
                                <th>IT Skill</th>
                                <th>Gender</th>
                                <th>Department</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>";
               
                while($row = mysqli_fetch_assoc($result))
                {   
                    echo "<tr>";
                            echo "<th>" . $row['id'] . "</th>";
                            echo "<td class='center'>" . $row['name'] . "</td>";
                            echo "<td class='center'>" . $row['dob'] . "</td>";
                            echo "<td class='center'>" . $row['education'] . "</td>";
                            echo "<td class='center'>" . $row['IT_skill'] . "</td>";
                            echo "<td class='center'>" . $row['gender'] . "</td>";
                            echo "<td class='center'>" . $row['team'] . "</td>";
                            echo "<td class='center'>" . $row['address'] . "</td>";
                            echo "<td class='center'>
                            <form method='post' action='server.php'>
                            <input type='hidden' name='id' value='$row[id]'>
                            <a href='edit.php?id=$row[id]' class='btn btn-success'>Edit</a>
                            <button class='btn btn-dark' onclick='return confirm(&quot;are you sure to want to delete? &quot;)' type='submit' name='delete'>Delete</button></p>
                            </form>
                            </td>"; 

                            echo "</tr>";
                }
            ?>    
        </table>
    </div>
   
 </div>
</body>
</html>