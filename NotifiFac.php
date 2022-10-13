<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "minipro";
                                    
$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){echo "connection failed";}

session_start();
$email = $_SESSION['email'];

// $get_student_details = "SELECT * FROM student1 WHERE email='$email'";
// $get_student = mysqli_query($conn, $get_student_details);

// $student = mysqli_fetch_array($get_student);

// $username = $student['f_name'];
?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashboard</title>
  <!---material cdn-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <!---stylesheet-->
  <link rel="stylesheet" href="css/facultydash.css">
  </head>
  <body>
    <div class="container">
      <aside>
        <div class="top">
          <div class="logo">
            <img src="image/CAMPUS.jpg">
            <h2>CAMPUS <span class="danger">CREDITS</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-sharp">close</span>
            </div>
        </div>
        <div class="sidebar">
          <a href="facultydash.php" >
            <span class="material-icons-sharp">grid_view</span>
            <h3>Dashboard</h3>
            </a>
            <a href="StudProfiles.php">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profile</h3>
              </a>
              <a href="AnalyFac.php">
                <span class="material-icons-sharp">insights</span>
                <h3>Class Analytics</h3>
                </a>
              
                <a href="NotifiFac.php" class="active">
                  <span class="material-icons-sharp">mail_outline</span>
                  <h3>Messages</h3>
                  </a>
                  <a href="reportFaculty.php">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                    </a>
                    <a href="studresfaculty.php" >
                      <span class="material-icons-sharp">settings</span>
                      <h3>Student Results</h3>
                      </a>
                      <a href="EventsFaculty.php" >
                        <span class="material-icons-sharp">add</span>
                        <h3>Add Events</h3>
                        </a>
                        <a href="#">
                          <span class="material-icons-sharp">logout</span>
                          <h3>Logout</h3>
                          </a>
          </div>
          </aside>
          <!------end of aside---->
          <main>
            <h1>Push Notifications</h1>
            
                         <div class="right" >
                           <div class="top" >
                            <button id="menu-btn">
                              <span class="material-icons-sharp">menu</span>
                            </button>
                            <div class="theme-toggler" style="position:relative;left:320px;bottom:50px;">
                              <span class="material-icons-sharp active">light_mode</span>
                              <span class="material-icons-sharp">dark_mode</span>                     
                               </div>
                               <div class="profile" style="position:relative;left:320px;bottom:50px;" >
                                <div class="info">
                                  <p>hey, <b><?php echo $username; ?></b></p>
                                  <small class="text-muted">Student</small>
                                </div>
                                <div class="profile-photo">
                                  <img src="image/pic.jpeg">
                                </div>
                              </div>
                            </div>
                            <a href="addeventsfac.php"> <button>Add New Notification</button></a>
                            <div class="notification_table" >
                            <h2>Push the neccessary Notifications</h2>
                            <?php
$result = mysqli_query($conn,"SELECT * FROM notifications");
if (mysqli_num_rows($result) > 0) {
?>
                            <table style="padding: 10px;">
                            <thead>
  <tr>
    <th>Stud_Name</th>
    <th>Stud_Batch</th>
    <th>Stud_Div</th>
    <th>Stud_Rollno</th>
    <th>Stud_Email</th>
    <th>Level</th>
   
  </tr>
</thead>
<?php

while($row = mysqli_fetch_array($result)) {
  
?>
<tr>
    <td><?php echo"{$row["f_name"]} {$row["l_name"]}"; ?></td>
    <td><?php echo $row["batch"]; ?></td>
    <td><?php echo $row["division"]; ?></td>
    <td><?php echo $row["roll_no"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td class="warning"><?php echo $row["level"]; ?></td>
   

    
</tr>
<?php

}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
                         </div>