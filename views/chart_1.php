<?php
 
$dataPoints = array(
	array("label"=> "Lake Thalia", "y"=> 135),
	array("label"=> "Paolomouth", "y"=> 132),
	array("label"=> "Leannonmouth", "y"=> 131),
	array("label"=> "East Lawrence", "y"=> 131),
	array("label"=> "Anitaside", "y"=> 130),
	array("label"=> "East Louisa", "y"=> 128),
	array("label"=> "Wymanmouth", "y"=> 127)
);
// $link= mysqli_connect("localhost","root","root");
// mysqli_select_db($link,"school_db");
// $test=array();
// $count=0;
// $res =mysqli_query($link,"SELECT * FROM iwan");
// while($row=mysqli_fetch_array($res))
// {
//     // $test[$count]["label"]=$row["label"];
//     $test[$count]["y"]=$row[""];
// }
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
	exportEnabled: true, 
    theme: "dark2", 
	title:{
		text: "Student Population"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - Population",
		yValueFormatString: "#,##0",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
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