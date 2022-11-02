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
  <title>dashboard</title>
  <!---material cdn-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <!---stylesheet-->
  <link rel="stylesheet" href="css/facultydash.css">
  <style>
    
.container {
  width: 800px;
  height: 440px;
  margin: 0 auto;
  padding-left: 32px;
  padding-right: 32px;
  padding-top: 40px;
  border-radius: 12px;
  background-color: #90a4ae;
  font-family: Lato;
}

.container h2 {
  text-align: center;
}

table {
  margin: 0 auto;
}

td,
th {
  padding: 12px;
  border: 2px dotted;
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
              
                <a href="NotifiFac.php">
                  <span class="material-icons-sharp">mail_outline</span>
                  <h3>Messages</h3>
                  </a>
                  <a href="reportFaculty.php">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                    </a>
                    <a href="studresFaculty.php" class="active">
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
            <h1>Student Results</h1>
            
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

                            <div class="container">
      <h2>HTML TABLE</h2>
      <table>
        <thead>
          <tr>
            <th>Roll No.</th>
            <th>Name</th>
            <th>English</th>
            <th>Maths</th>
            <th>Science</th>
            <th>Computer Science</th>
            <th>Social Studies</th>
            <th>Total</th>
            <th>Max Marks</th>
            <th>Grade </th>
          <tr>  
        </thead>
        <tbody>
          <tr>
            <td>01</td>
            <td>Bhasker</td>
            <td>86</td>
            <td>77</td>
            <td>87</td>
            <td>92</td>
            <td>95</td>
            <td>437</td>
			<td>500</td>
			<td>A</td>
          </tr>
          <tr>
            <td>02</td>
            <td>Balwant</td>
            <td>86</td>
            <td>77</td>
            <td>87</td>
            <td>92</td>
            <td>95</td>
            <td>437</td>
			<td>500</td>
			<td>A</td>
          </tr>
          <tr>
            <td>03</td>
            <td>Kailash</td>
            <td>86</td>
            <td>77</td>
            <td>87</td>
            <td>92</td>
            <td>95</td>
            <td>437</td>
			<td>500</td>
			<td>A</td>
          </tr>
          <tr>
            <td>04</td>
            <td>Nikhil</td>
            <td>86</td>
            <td>77</td>
            <td>87</td>
            <td>92</td>
            <td>95</td>
            <td>437</td>
			<td>500</td>
			<td>A</td>
          </tr>
          <tr>
            <td>05</td>
            <td>Shubham</td>
            <td>86</td>
            <td>77</td>
            <td>87</td>
            <td>92</td>
            <td>95</td>
            <td>437</td>
			<td>500</td>
			<td>A</td>
          </tr>
        </tbody>    
      </table>
    </div>
</main>
</body>
</html>