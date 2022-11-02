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
  <title>Class Analytics</title>
  <!---material cdn-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <!---stylesheet-->
  <link rel="stylesheet" href="css/facultydash.css">
  
  <style>
    button{
      background:#00aba9;
      color:white;
      letter-spacing:2px;
padding:10px;
border-radius:32px;
font-size:1.2rem;
border:2px solid red;
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
              <a href="AnalyFac.php" class="active">
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
                    <a href="studresFaculty.php" >
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
                            <button onclick="myFunction1()">1st Sem</button>
                            <button onclick="myFunction2()">2nd Sem</button>
                            <button onclick="myFunction3()">3rd Sem</button>
                            <button onclick="myFunction4()">4th Sem</button>
                            <button onclick="myFunction5()">5th Sem</button>
                            <div class="graphcontents" id="graph1">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <canvas id="myChart" style="min-width:900px;"></canvas>
    
    <script >
    var xValues = ["A Grade", "B Grade", "C Grade", "D Grade", "E Grade"];
    var yValues = [2, 25, 10, 15,8];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        
          text: "1st Sem Grade Chart"
        }
      }
    });
    </script>
      </div>
      <div class="graphcontents" id="graph2">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <canvas id="myChart" style="min-width:900px;"></canvas>
    
    <script >
    var xValues = ["A Grade", "B Grade", "C Grade", "D Grade", "E Grade"];
    var yValues = [12, 18, 30, 10,9];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        
          text: "2nd Sem Grade Chart"
        }
      }
    });
    </script>
      </div>

      <div class="graphcontents" id="graph3">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <canvas id="myChart" style="min-width:900px;"></canvas>
    
    <script >
    var xValues = ["A Grade", "B Grade", "C Grade", "D Grade", "E Grade"];
    var yValues = [15, 25, 10, 20,5];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        
          text: "3rd Sem Grade Chart"
        }
      }
    });
    </script>
      </div>

                            <div class="graphcontents" id="graph4">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <canvas id="myChart" style="min-width:900px;"></canvas>
    
    <script >
    var xValues = ["A Grade", "B Grade", "C Grade", "D Grade", "E Grade"];
    var yValues = [10, 15, 20, 10,5];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        
          text: "4th Sem Grade Chart"
        }
      }
    });
    </script>
      </div>
      <div class="graphcontents2" id="graph5">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <canvas id="myChart" style="min-width:900px;"></canvas>
    
    <script >
    var xValues = ["A Grade", "B Grade", "C Grade", "D Grade", "E Grade"];
    var yValues = [30, 5, 10, 20,5];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
        
          text: "5th Sem Grade Chart"
        }
      }
    });
    </script>

      </div>

  </body>
  <script>
    function myFunction1() {
  var x = document.getElementById("graph1");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function myFunction2() {
  var y = document.getElementById("graph2");
  if (y.style.display === "none") {
    y.style.display = "block";
  } else {
    y.style.display = "none";
  }
}
function myFunction3() {
  var z = document.getElementById("graph3");
  if (z.style.display === "none") {
    z.style.display = "block";
  } else {
    z.style.display = "none";
  }
}
function myFunction4() {
  var d = document.getElementById("graph4");
  if (d.style.display === "none") {
    d.style.display = "block";
  } else {
    d.style.display = "none";
  }
}
function myFunction5() {
  var x = document.getElementById("graph5");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
  </script>
  </html>