<?php
 
$dataPoints = array(
	array("label"=> "Food + Drinks", "y"=> 590),
	array("label"=> "Activities and Entertainments", "y"=> 261),
	array("label"=> "Health and Fitness", "y"=> 158),
	array("label"=> "Shopping & Misc", "y"=> 72),
	array("label"=> "Transportation", "y"=> 191),
	array("label"=> "Rent", "y"=> 573),
	array("label"=> "Travel Insurance", "y"=> 126)
);
	
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
		text: "Average Expense Per Day  in Thai Baht"
	},
	subtitles: [{
		text: "Currency Used: Thai Baht (฿)"
	}],
	data: [{
		type: "pie",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - #percent%",
		yValueFormatString: "฿#,##0",
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