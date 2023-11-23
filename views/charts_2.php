<?php
 
$dataPoints = array(
	array("name" => "Brand1", "x" => 2.5, "y" => 40, "z" => 200),
	array("name" => "Brand2", "x" => 2, "y" => 12, "z" => 250),
	array("name" => "Brand3", "x" => 13.5, "y" => 10, "z" => 124),
	array("name" => "Brand4", "x" => 16, "y" => 28, "z" => 112),
	array("name" => "Brand5", "x" => 1, "y" => 32, "z" => 90),
	array("name" => "Brand6", "x" => 4.6, "y" => 26, "z" => 68),
	array("name" => "Brand7", "x" => 7.8, "y" => 19, "z" => 321),
	array("name" => "Brand8", "x" => 6, "y" => 15, "z" => 111),
	array("name" => "Brand9", "x" => 9, "y" => 12, "z" => 45),
	array("name" => "Brand10", "x" => 8.4, "y" => 16, "z" => 68),
	array("name" => "Brand11", "x" => 7.5, "y" => 22, "z" => 72),
	array("name" => "Brand12", "x" => 8, "y" => 28, "z" => 180),
	array("name" => "Brand13", "x" => 8.5, "y" => 12, "z" => 123),
	array("name" => "Brand14", "x" => 9, "y" => 3, "z" => 23),
	array("name" => "Brand15", "x" => 9.5, "y" => 42, "z" => 90),
	array("name" => "Brand16", "x" => 10, "y" => 18, "z" => 88),
	array("name" => "Brand17", "x" => 10.5, "y" => 12, "z" => 174),
	array("name" => "Brand18", "x" => 11, "y" => 6, "z" => 235),
	array("name" => "Brand19", "x" => 11.5, "y" => 38, "z" => 120),
	array("name" => "Brand20", "x" => 12, "y" => 40, "z" => 74),
	array("name" => "Brand21", "x" => 12.5, "y" => 7, "z" => 190),
	array("name" => "Brand22", "x" => 13, "y" => 42, "z" => 154),
	array("name" => "Brand23", "x" => 13.5, "y" => 43, "z" => 134),
	array("name" => "Brand24", "x" => 14, "y" => 7, "z" => 239),
	array("name" => "Brand25", "x" => 14.5, "y" => 46, "z" => 295),
	array("name" => "Brand26", "x" => 15, "y" => 9, "z" => 132),
	array("name" => "Brand27", "x" => 15.5, "y" => 48, "z" => 145),
	array("name" => "Brand28", "x" => 16.0, "y" => 34, "z" => 168),
	array("name" => "Brand29", "x" => 15.5, "y" => 16, "z" => 145),
	array("name" => "Brand30", "x" => 18, "y" => 50, "z" => 168)
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
      width: 80%;
   }
   </style>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
    theme: "dark2",  
	title: {
		text: "Brand Growth vs Market Shares and Sales"
	},
	axisX: {
		title: "Growth",
		suffix: "%"
	},
	axisY: {
		title: "Market Share",
		suffix: "%"
	},
	data: [{
		type: "bubble",
		toolTipContent: "<b>{name}</b><br><b>Growth: </b> {x}%<br><b>Market Share: </b>{y}%<br><b>Sales :</b> ${z}k ",
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
<div id="chartContainer" style="height: 370px; width: 70%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                