<?php
    session_start();
    $email    = "";
    $errors = array(); 
    
    $db = mysqli_connect('localhost', 'root', '', 'firstdatabase');
    if (isset($_POST['register'])) {
        $email =  $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];

        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }

        if (empty($password1)) {
             array_push($errors, "Password is required"); 
            }
        if ($password1 != $password2) {

            array_push($errors, "The two passwords do not match");
        }

        if (count($errors) == 0) {
            $password = md5($password1);//encrypt the password before saving in the database
      
            $query = "INSERT INTO admin ( email, password) 
                      VALUES('$email', '$password')";
            mysqli_query($db, $query);
        }
    }
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
      
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
      
        if (count($errors) == 0) 
        {   
            $password = md5($password);
            $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
            $results = mysqli_query($db, $query); 
            if($results)
            {
                $_SESSION['email'] = $email;
                $_SESSION['success']  = "You are now logged in";
                header('location: index.php');
            }
            else{
                array_push($errors , "Wrong email/password are combination");
            } 
        }
      }
    $name = "";
    $dob="";
    $edu ="";
    $chk="";
    $gender = "";
    $department = "";
    $address = "";

    if (isset($_POST['insert']))
    {   
        $name = $_POST['ename'];
        $dob = $_POST['dob'];
        $edu = $_POST['edu'];
        
        $checkbox = $_POST['skill'];
        foreach($checkbox as $chk1)  
            {  
                $chk .= $chk1.",";  
            }  
        $gender = $_POST['gender'];
        $department= $_POST['department'];
        $address = $_POST['address'];
        

        

        if (empty($name)) { 
            array_push($errors, "Name is required"); 
        }
        if (empty($dob)) { 
            array_push($errors, "DOB is required"); 
        }
        if (empty($edu)) { 
            array_push($errors, "edu is required"); 
        }
        if (empty($chk)) { 
            array_push($errors, "IT Skill is required"); 
        }
        if (empty($gender)) { 
            array_push($errors, "Gender is required"); 
        }
        if (empty($department)) { 
            array_push($errors, "Department is required"); 
        }
        if (empty($address)) { 
            array_push($errors, "Address is required"); 
        }
        if(count($errors) == 0)
        {
           
          $sql = "INSERT INTO emember (name,dob,education,IT_skill,gender,team,address) VALUES('$name','$dob','$edu','$chk','$gender','$department','$address')";
          mysqli_query($db, $sql);
          header('location: index.php');
        }  
    }

    if(isset($_POST['update']))
    {    
        $id = $_POST['id'];   
        $name = $_POST['ename'];
        $dob = $_POST['dob'];
        $edu = $_POST['edu'];
        
        $checkbox = $_POST['skill'];
        foreach($checkbox as $chk1)  
            {  
                $chk .= $chk1.",";  
            }  
        $gender = $_POST['gender'];
        $department= $_POST['department'];
        $address = $_POST['address'];
        if (empty($name)) { 
            array_push($errors, "Name is required"); 
        }
        if (empty($dob)) { 
            array_push($errors, "DOB is required"); 
        }
        if (empty($edu)) { 
            array_push($errors, "edu is required"); 
        }
        if (empty($chk)) { 
            array_push($errors, "IT Skill is required"); 
        }
        if (empty($gender)) { 
            array_push($errors, "Gender is required"); 
        }
        if (empty($department)) { 
            array_push($errors, "Department is required"); 
        }
        if (empty($address)) { 
            array_push($errors, "Address is required"); 
        }

       
      if(count($errors)==0)
        {
            //  var_dump($errors);
        //      var_dump($name);
        // var_dump($dob);
        // var_dump($edu);
        // var_dump($chk);
        // var_dump($gender);
        // var_dump($department);
        // var_dump($address);
        // die();
            $sql = "UPDATE emember SET name='$name', dob='$dob',
            education='$edu', IT_skill='$chk', gender='$gender',
            team='$department',address='$address' WHERE id = $id";
        }
        mysqli_query($db,$sql);
        header('location: index.php');       
        
    }
   
    if(isset($_POST['delete']))
  {
    $id = $_POST['id'];

    $sql = "DELETE FROM emember WHERE id = $id";
    mysqli_query($db, $sql);
    header("location: index.php");
  } 
  
  if(isset($_POST['cancel']))
  {
    header("location: index.php");
  } 
?>