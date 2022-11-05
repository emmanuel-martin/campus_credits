<?php
include 'config.php';
 session_start();
$error_message = "";
 if(isset($_POST['login'])){
    $username = $_POST['emailid'];
    $pass = $_POST['pass'];

    $loginsql = "SELECT * FROM student1 WHERE email='$username' AND password='$pass'";

    $loginquery = mysqli_query($conn,$loginsql);
    
    if($loginquery){
        $_SESSION['email'] = $username; 
        header('location:dash.php');
    }
    else{
        $error_message = "Incorrect Username or Password";
    }

 };

 if(isset($_POST['registerbtn'])){
    $fname = $_POST['firstname'];
    $lname= $_POST['lastname'];
    $email= $_POST['emailid'];
    $divi= $_POST['division'];
    $pass= $_POST['password'];
    $batch= $_POST['batch'];
    $rollno= $_POST['rollno'];
    $confirmpass = $_POST['confirm'];
    
    $checkquery = "SELECT * from student1 WHERE email='$email'";
    $check = mysqli_query($conn,$checkquery);
    $exists = mysqli_num_rows($check);

    if($exists !=1){

        if($pass == $confirmpass){
            
            $sql="INSERT INTO student1( `f_name`, `l_name`, `batch`, `division`, `roll_no`, `email`, `password`) 
            VALUES ('$fname','$lname','$batch','$divi','$rollno','$email','$pass')";
        
            $data= mysqli_query($conn,$sql);
            $_SESSION['fname']=$fname;
            echo "registered successfully";
            header("Location:login.php");
            }else{
                $error_message =  "register failed";
            }
    }else{
        $error_message = "user already exists";
    }


 };
 if(isset($_POST['faculty'])){
    $username = $_POST['facultyid'];
    $pass = $_POST['facultypass'];

    $facsql = "SELECT * FROM faculty_details WHERE faculty_id='$username' AND password='$pass'";

    $facquery = mysqli_query($conn,$facsql);
    $_SESSION['fname']=$username;
    $facdata = mysqli_num_rows($facquery);
    if($facdata==1){
        header('location:facultydash.php');

    }else{
        $error_message = "Incorrect Username or Password";
    }

 }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>campus credits</title>
    <link rel="stylesheet" href="css/ss.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="left">
                <div class="logo">
                    <img src="image/CAMPUS.jpg" alt="logo">
                </div>
            </div>
            <div class="right">
                <ul id='MenuItems'>
                    <li><a href='home'>Home</a></li>
                    <li><a href='#'>About Us</a></li>
                    <li><a href='#'>Services</a></li>
                    <li><a href='#'>Contact</a></li>
                </ul>
            </div>
        </div>


        <div class="form-box" id="login-form-popup">
            <div class="controls">
                <div class="control-btns">
                    <button class="controlbtn-selected"  href='dash.php'>Login</button>
                    <button class="controlbtn" onclick="register()">Register</button>
                    <button class="controlbtn" onclick="faculty()">Faculty</button>
                </div>
            </div>
           <div class="error-meessage" style="color: red; text-align: center; margin-bottom: 20px;">
                <div class="error">
                    <span><?php echo $error_message; ?></span>
                </div>
           </div>
            <div id="login-form">
                <form action="" method="POST">
                    <span style="color: white;">Email ID:</span><br>
                    <input type="text" placeholder="Email id" class="text-input" name="emailid" required> <br>
                    <span style="color: white;">Password:</span><br>
                    <input type="password" placeholder="Password" autocomplete="off" class="text-input" name="pass" required><br>
                    <input type="checkbox" id="remme"><label for="remme" style="color: white;">Remember Me</label><br><br>
                    <button type="submit" name="login" class="glow-on-hover">Login</button>
                </form>
            </div>
        </div>
        <div class="form-box" id="register-form-popup">
            <div class="controls">
                <div class="control-btns">
                    <button class="controlbtn" onclick="login()">Login</button>
                    <button class="controlbtn-selected">Register</button>
                    <button class="controlbtn" onclick="faculty()" >Faculty</button>
                </div>
            </div>
            <div class="error-meessage" style="color: red; text-align: center; margin-bottom: 20px;">
                <div class="error">
                    <span><?php echo $error_message; ?></span>
                </div>
           </div>
            <div id="login-form" class="registerform" >
                <form action="" method="post">
                    
                    <div class="split"   style="display: flex;">
                        <div class="group-1" style="margin-right: 30px;">
                            <span style="color: white;">First Name:</span><br>
                            <input type='text' name='firstname'class='text-input'placeholder='First Name' id="firstname"required><br>
                           
                            <span style="color: white;">Email ID:</span><br>
                            <input type='email'name='emailid'class='text-input'placeholder='email id' required><br>
                            <span style="color: white;">Division:</span><br>
                            <input type='text'name='division'class='text-input'placeholder='division' required><br>
                            <span style="color: white;">Password:</span><br>
                            <input type='password'autocomplete="off" name='password'class='text-input'placeholder='Enter Password' required><br>
                        </div>
                       
    
                        <div class="group-2">
                            <span style="color: white;">Last Name:</span><br>
                            <input type='text'name='lastname'class='text-input'placeholder='Last Name ' required><br>
                            <span style="color: white;">Batch:</span><br>
                            <input type='text'name='batch'class='text-input'placeholder='batch' required><br>
                            <span style="color: white;">Roll number:</span><br>
                            <input type='text'name='rollno'class='text-input'placeholder='roll no' required><br>
                            <span style="color: white;">Confirm Password:</span><br>
                            <input type='password'name='confirm' autocomplete="off" class='text-input'placeholder='Confirm Password'  required><br>
                        </div>
                    </div>
                   
             
                    <input type='checkbox'class='check-box'><label style="color: white;">I agree to the <a href="t.html">terms and conditions</a></label><br><br>
                    <button type='submit'name='registerbtn' id="registerbtnn" class='glow-on-hover' value="register">Register
                </form>
            </div>

    </div>
    <div class="form-box" id="faculty-form-popup">
        <div class="controls">
            <div class="control-btns">
                <button class="controlbtn" onclick="login()">Login</button>
                <button class="controlbtn" onclick="register()">Register</button>
                <button class="controlbtn">Faculty</button>
            </div>
        </div>
        <div id="login-form">
            <form action="" method="post">
                <span style="color: white;">Faculty ID:</span><br>
                <input type='text' name="facultyid" class='text-input'placeholder='Faculty ID' required><br>
                <span style="color: white;">Password:</span><br>
                <input type='text' name="facultypass" class='text-input'placeholder='Password' required><br>
                <input type='checkbox'class='check-box' id="check"><label for="check"style="color: white;" >I agree to the <a href="t.html">terms and conditions</a></span><br><br>
                <button type='submit' name="faculty" class='glow-on-hover'>Login</button>
            </form>
        </div>

</div>
    <script type="text/javascript">
        function register(){
           var x =  document.getElementById('register-form-popup');
           x.style.display='block';
           var y =  document.getElementById('login-form-popup');
           y.style.display='none';
           var z =  document.getElementById('faculty-form-popup');
           z.style.display='none';

        }
        function faculty(){
            var a = document.getElementById('faculty-form-popup');
            a.style.display='block';
            var b = document.getElementById('register-form-popup');
            b.style.display='none';
            var c = document.getElementById('login-form-popup');
            c.style.display='none';
        }

        function login(){
            var e = document.getElementById('login-form-popup');
            e.style.display='block';
            var f = document.getElementById('faculty-form-popup');
            f.style.display='none';
            var g = document.getElementById('register-form-popup');
            g.style.display='none';
        }
        </script>
        
 </body>
</html>
