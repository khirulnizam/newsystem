<?php
include ("header.template.php");

$servername = "localhost";//server location / IP number
$username = "root";//db admin username
$password = "abcd1234";//password for db admin username
$dbname = "newsystem";//database name

// Create connection
$conn = mysqli_connect($servername, $username, 
			$password, $dbname);
// Check connection
if (!$conn) {
	//terminate system if not connected 
    die("Connection failed: " . mysqli_connect_error());
}

//embed SQL commands
$sql = "SELECT * FROM students_result";
//execute sql commands that will return result set
$result = mysqli_query($conn, $sql);
?>

<h1>My 2nd Google Graph</h1>
<p>My 2nd google graph.</p>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <div id="chart_div"></div>

  <script type="text/javascript">
  	
  	google.charts.load('current', {packages: ['corechart', 'bar']});
	google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
      	['Name', 'Marks',],
      	<?php
      	while($row = mysqli_fetch_assoc($result)) {
        	echo "['".$row['name']."', ".$row['mark'].",],";
        	//['City','2010 Population',],
        }//end while
        ?>
      ]);

      var options = {
        title: 'Student names against mark',
        chartArea: {width: '50%'},
        hAxis: {
          title: 'Student Marks for 2020',
          minValue: 0
        },
        vAxis: {
          title: 'City'
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
  </script>

<?php
include ("footer.template.php");
?>