<?php 
include 'config.php';

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
  <title>Faculty Dashboard</title>
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
          <a href="facultydash.php" class="active">
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
              
                <a href="NotifiFac.php">
                  <span class="material-icons-sharp">mail_outline</span>
                  <h3>Messages</h3>
                  </a>
                  <a href="reportFaculty.php">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                    </a>
                    <a href="studresfaculty.php">
                      <span class="material-icons-sharp">settings</span>
                      <h3>Student Results</h3>
                      </a>
                      <a href="EventsFaculty.php">
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
            <h1>Dashboard</h1>
            <div class="date">
              <input type="date">
            </div>
            <div class="middle">

            hi
</div>
            <div class="recent-orders" >
                            <h2>Recent events </h2>
                            <?php
$result = mysqli_query($conn,"SELECT * FROM event_details");
if (mysqli_num_rows($result) > 0) {
?>
                            <table style="padding: 10px;">
                            <thead>
  <tr>
    <th>Event Name</th>
    <th>Event Type</th>
    <th>Event Date</th>
    <th>Status</th>
  </tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["event_name"]; ?></td>
    <td><?php echo $row["event_type"]; ?></td>
    <td><?php echo $row["event_date"]; ?></td>
    <td class="warning"><?php echo $row["status"]; ?></td>
    <td class="primary">Details</td>
</tr>
<?php
$i++;
}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
                            <a href="#">show all</a>
                         </div>
                         </main>

                         <div class="right">
                           <div class="top">
                            <button id="menu-btn">
                              <span class="material-icons-sharp">menu</span>
                            </button>
                            <div class="theme-toggler">
                              <span class="material-icons-sharp active">light_mode</span>
                              <span class="material-icons-sharp">dark_mode</span>                     
                               </div>
                               <div class="profile">
                                <div class="info">
                                  <p>hey, <b><?php echo $username; ?></b></p>
                                  <small class="text-muted">Faculty</small>
                                </div>
                                <div class="profile-photo">
                                  <!img src="image/pic.jpeg">
                                </div>
                              </div>
                            </div>
                            <div class="recent-updates">
                              <h2>Recent update</h2>
                            <?php
$result = mysqli_query($conn,"SELECT * FROM notifications where status='visible'");
if (mysqli_num_rows($result) > 0) {?>
<?php

while($row = mysqli_fetch_array($result)) {
  
?>
                              <div class="updates" style="padding: 20px;">
                                 <div class="update">
                                   <div class="profile-photo">
                                    <?php $s=$row["notfi_img"]; ?>
                                  <?php echo '<img src="'.$s.'" alt="HTML5 Icon" style="width:128px;height:128px">';
   ?> 
                                  </div>
                                   <div class="message">
                                      <p><b><?php echo $row["notifi_text"]; ?></b> <?php echo $row["notifi_des"]; ?></p>
                                      <small class="text-muted"><?php echo $row["notifi_link"]; ?></small>
                                   </div>
                                  </div>

                          
<?php }
}?>
</div>

<div class="sales-analytics">
  <h2>Events Analytics</h2>
  <div class="item online" style="padding: 20px;">
    <div class="icon" style="height: 40px; width: 40px;">
      <span class="material-icons-sharp">bar_chart</span>
  </div>
  <div class="right">
    <div class="info">
      <h3>Online Events</h3>
      <small class="text-muted">Last 2 weeks</small>
</div>
<h5 class="success">+39%</h5>
<h3>15</h3>
</div>
</div>
 
<div class="item offline" style="padding: 20px;">
    <div class="icon" style="height: 40px; width: 40px;">
      <span class="material-icons-sharp">bar_chart</span>
  </div>
  <div class="right">
    <div class="info">
      <h3>On campus Events</h3>
      <small class="text-muted">Last 2 weeks</small>
    </div>
      <h5 class="success">+39%</h5>
       <h3>15</h3>
  </div>
</div>
</div>
</div>
</div>
<script src="dash.js"></script>
</body>
 </html>

