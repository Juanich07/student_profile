<?php
// $dataPoints = array(
//     array("label" => "Education", "y" => 284935),
//     array("label" => "Entertainment", "y" => 256548),
//     array("label" => "Lifestyle", "y" => 245214),
//     array("label" => "Business", "y" => 233464),
//     array("label" => "Music & Audio", "y" => 200285),
//     array("label" => "Personalization", "y" => 194422),
//     array("label" => "Tools", "y" => 180337),
//     array("label" => "Books & Reference", "y" => 172340),
//     array("label" => "Travel & Local", "y" => 118187),
//     array("label" => "Puzzle", "y" => 107530)
// );

// Include the necessary class and create an instance
include_once("../db.php");
include_once("../charts.php");
$db = new Database();
$charts = new Charts($db);

// Use the chart4 method to get the data for the number of students with the same birth month
$birthMonthData = $charts->chart4();

// Process the data and update $dataPoints accordingly
$dataPoints = array();
foreach ($birthMonthData as $row) {
    $dataPoints[] = array("label" => "Month " . $row['birth_month'], "y" => $row['student_count']);
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
                    text: "Number of Students with the Same Birth Month"
                },
                axisY: {
                    title: "Number of Students"
                },
                data: [{
                    type: "column",
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
