<?php 

session_start();
include 'config.php';
$email =  $_SESSION['fname'];

$get_student_details = "SELECT * FROM faculty_details WHERE faculty_id='$email'";
$get_student = mysqli_query($conn,$get_student_details);

$student = mysqli_fetch_array($get_student);

$username = $student['faculty_name'];
 

if(isset($_POST['submit']))
{
    if(!empty($_POST['personname']) && !empty($_POST['notidesc']))
    {
$notiname=$_POST['personname'];
$notidesc=$_POST['notidesc'];
$notifi_img = $_FILES['uploadimg']['name'];
$notitime=$_POST['notitime'];
$stu_id=$_POST['stu_id'];


$sql="insert into `notifications`(`notifi_text`, `notifi_des`,notfi_img, `notifi_link`, `stu_id`) VALUES('$notiname','$notidesc','$notifi_img','$notitime','$stu_id')";
$query=mysqli_query($conn,$sql);

if($query)
{
    echo'<script>alert("Sucessfully Added the Event");window.location="NotifiFac.php"</script>';
}

    }
}

?>
<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add new Notification</title>
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
                      <a href="EventsFaculty.php" class="active">
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
            <h1>Events</h1>
            
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
                                  <small class="text-muted">Faculty</small>
                                </div>
                                <div class="profile-photo">
                                  <!img src="image/pic.jpeg">
                                </div>
                              </div>
                            </div>
      
                            <div class="add-events">

            <form class="event-form" action="#" method="POST" enctype="multipart/form-data">
             <h1>Add New Notifications</h1><br>
             <input type="text" name="personname" id="personname" placeholder="Enter Student Name"><br>
             <label for="img">Choose Student Image</label>
             <br>
             <br>
             <input  type="file" name="uploadimg" id="uploadimg">
             <br>
             <input type="text" name="notidesc" id="notidesc" placeholder="Enter Desc"><br>
             <input type="text" name="notitime" id="notitime" placeholder="Enter Time Ago"><br>
             <input type="text" name="stu_id" id="stu_id" placeholder="Enter Student Id"><br>
             <input type="submit" value="ADD" name="submit" id="submit">
            </form>
          </div>
          </main>
</body>
</html>