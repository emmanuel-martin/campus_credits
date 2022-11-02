<?php 
session_start();
$conn=mysqli_connect("localhost","root","","minipro");
$email =  $_SESSION['fname'];

$get_student_details = "SELECT * FROM faculty_details WHERE faculty_id='$email'";
$get_student = mysqli_query($conn,$get_student_details);

$student = mysqli_fetch_array($get_student);

$username = $student['faculty_name'];
 

if(isset($_POST['submit']))
{
    if(!empty($_POST['eventname']) && !empty($_POST['eventdate']))
    {
$evname=$_POST['eventname'];
$evtype=$_POST['eventtype'];
$evdate=$_POST['eventdate'];
echo"error";
$sql="insert into event_details(event_name,event_type,event_date) VALUES('$evname','$evtype','$evdate')";
$query=mysqli_query($conn,$sql);

if($query)
{
    echo'<script>alert("Sucessfully Added the Event");window.location="EventsFaculty.php"</script>';
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
  <title>Add New Event</title>
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

            <form class="event-form" action="#" method="POST">
             <h1>Add New  Events</h1><br>
             <input type="text" name="eventname" id="eventname" placeholder="Enter Event Name"><br>
             <select name="eventtype" id="eventtype" class="option"><br>
                <option disabled selected>Choose Event Type</option>
                <option value="Sports">Sports</option>
                <option value="Academic">Academic</option>
                <option value="Arts">Arts</option>
                <option value="IT Fair">IT Fair</option>
</select><br>
             <input type="text" name="eventdate" id="eventdate" placeholder="Enter Event Date" onfocus="(this.type='date')"><br>
             <input type="submit" value="ADD" name="submit" id="submit">
            </form>
          </div>
          </main>
</body>
</html>