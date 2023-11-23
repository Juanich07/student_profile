<?php
include_once("../db.php"); 
include_once("../student.php"); 
include_once("../student_details.php"); 
include_once("../town_city.php");
include_once("../province.php");
include_once("../charts.php");
 
$dataPoints = array(
	array("label"=> "Education", "y"=> 284935),
	array("label"=> "Entertainment", "y"=> 256548),
	array("label"=> "Lifestyle", "y"=> 245214),
	array("label"=> "Business", "y"=> 233464),
	array("label"=> "Music & Audio", "y"=> 200285),
	array("label"=> "Personalization", "y"=> 194422),
	array("label"=> "Tools", "y"=> 180337),
	array("label"=> "Books & Reference", "y"=> 172340),
	array("label"=> "Travel & Local", "y"=> 118187),
	array("label"=> "Puzzle", "y"=> 107530)
); 
$link= mysqli_connect("localhost","root","root");
mysqli_select_db($link,"school_db");

// include_once("../charts.php");

// $db = new Database();
// $connection = $db->getConnection();
// $chart1 = new Charts($db);
// $chartData = $chart1->chart1();
 

// include_once("../charts.php");

// $db = new Database();
// $connection = $db->getConnection();
// $chart3 = new Charts($db);
// $chartData = $chart3->chart3();
// $maleCount = $chartData[0]['Male'];
// $femaleCount = $chartData[0]['Female'];

// Prepare data for the donut chart
// $chartLabels =[$count]["y"]=$row["Male"];
// $chartValues = [$maleCount, $femaleCount]; 
// $test=[$count]["y"]=$row[""];
 

$test=array();
$count=0;
$res =mysqli_query($link,"SELECT * FROM townstudent");
while($row=mysqli_fetch_array($res))
{
    // $test[$count]["label"]=$row["label"];
    $test[$count]["y"]=$row["numstudent"];
}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
   #chartContainer {
     
      float: right;
      width: 50%;
      
   }
</style>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "dark2", // "light1", "light2", "dark1", "dark2"
	title: {
		text: "Top 10 Google Play Categories - till 2017"
	},
	axisY: {
		title: "Number of Apps"
	},
	data: [{
		type: "column",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
     <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>
<div id="chartContainer" style="height: 370px; width: 80%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                              
