<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "minipro";
                                    
$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){echo "connection failed";}

session_start();
$email =  $_SESSION['fname'];

$get_student_details = "SELECT * FROM faculty_details WHERE faculty_id='$email'";
$get_student = mysqli_query($conn,$get_student_details);

$student = mysqli_fetch_array($get_student);

$username = $student['faculty_name'];
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
  <style>
    .act-btns span{
      background:aqua;
      color:crimson;
      border-radius:10px;
      padding:10px;
      letter-spacing:2px;
      border:2px solid black;
    }
    .act-btns2 span{
      padding:10px;

      border:2px solid black;
      border-radius:10px;
      letter-spacing:2px;

      background:yellow;
      color:black;
    }
    .act-btns span:hover{
      
     background:black;
     color:white;
      
    }
    .act-btns2 span:hover{
      background:black;
     color:white;
    }
    .notifi_table thead th{
      
      text-align:center;
      margin-left:200px;
      font-size:1.5rem;
      padding:10px;
      left:100px;
    }
    .notifi_table tbody td,thead th{
font-size:1.2rem;    
 min-width:5vw;

  }
  table td{
    padding-bottom:40px;
  }
  </style>
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
                        <a href="login.php">
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
                            <h2>Push the neccessary Notifications</h2>
                            <div class="notification_table" >
                            <?php
$result = mysqli_query($conn,"SELECT * FROM notifications");
if (mysqli_num_rows($result) > 0) {
  
?>
                            <table style="padding: 10px;" class="notifi_table">
                            <thead>
  <tr>
    <th>Notif_id</th>
    <th>Noti_Caption</th>
    <th>Noti_Desc</th>
    <th>Noti_Time</th>
    <th>Stud_id</th>
    <th>Status</th>
    <th>Action</th>

   
  </tr>
</thead>
<?php

while($row = mysqli_fetch_array($result)) {
  $notiid=$row["notifi_id"];
?>
<tr>
    <td><?php echo"{$row["notifi_id"]}"; ?></td>
    <td><?php echo $row["notifi_text"]; ?></td>
    <td><?php echo $row["notifi_des"]; ?></td>
    <td><?php echo $row["notifi_link"]; ?></td>
    <td><?php echo $row["stu_id"]; ?></td>
    <td class="warning"><?php echo $row["status"]; ?></td>
     <td class="act-btns"><?php echo"<a href='updatenoti.php?notifi_id={$notiid}'><span>Visible</span></a>"?></td>
     <td class="act-btns2"><?php echo"<a href='updatenotihide.php?notifi_id={$notiid}'><span>Hide</span></a>"?></td> 
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