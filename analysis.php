
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Etracker</title>
</head>
<link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="Expense-Tracker-logo-2007.png" type="image/x-icon"><script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="nav">  
    <img class="icon" src="Expense-Tracker-logo-2007.png" alt="" height="25px" width="25px"> E-TRACKER
    <a class="link" href="index.html">Logout</a>
    <a class="link" href="about.html">About</a>
    <a class="link" href="report.html">View Report</a>
    <a class="link" href="analysis.php">Analysis</a>
    <a class="link" href="home.php">Main Page</a>
    </div>
<body>

<?php 
echo "
<h1 style='font-family:cursive; text-align:center;' >
    Analysis report's here!!!
   </h1>";
  $con = new mysqli('localhost','root','','etracker');
  $query = $con->query("
    SELECT 
      date,total
    FROM daily_total
    
  ");

  foreach($query as $data)
  {
    $date[] = $data['date'];
    $total[] = $data['total'];
  }

?>


<div style="width: 700px; 
align-items:center;
position: absolute;
    top: 58%;
    left: 50%;
    transform: translate(-50%, -50%);">
  <canvas id="myChart" style="background-color: white;"></canvas>
</div>
 
<script>
  const labels = <?php echo json_encode($date) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Date vs Expense',
      data: <?php echo json_encode($total) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
<div class="footer"> <br><p>CONTACT DETAILS</p>
    <a href="https://instagram.com/navada_shash_07?igshid=ZDdkNTZiNTM="><img src="insticon.png" height="30px" width="30px"></a>
    <a href="https://github.com/ShashwathiN"><img src="github.png" height="30px" width="30px" style="background-color: white;"></a>
    <a href="https://www.linkedin.com/in/shashwathi-n-0269a9228"><img src="174857.png" height="30px" width="30px"></a>
 </div>
</html>