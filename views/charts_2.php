<?php

include_once("../db.php"); // Include the file with the Database class

class Charts
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function chart1()
    {
        // ... (unchanged)
    }

    public function chart2()
    {
        // ... (unchanged)
    }

    public function chart3()
    {
        try {
            $query01 = "SELECT
                SUM(CASE WHEN s.gender = 1 THEN 1 ELSE 0 END) AS Male,
                SUM(CASE WHEN s.gender = 0 THEN 1 ELSE 0 END) AS Female
            FROM
                students s
            JOIN
                student_details sd ON s.id = sd.student_id
            JOIN
                town_city tc ON sd.town_city = tc.id
            WHERE
                tc.name = 'Paolomouth';";

            $stmt = $this->db->getConnection()->prepare($query01);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    // ... (unchanged)

}
?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css"> <!-- Ensure correct path to your CSS file -->
    <style>
        #chartContainer {
            float: right;
            width: 50%;
        }
    </style>
    <script>
        window.onload = function () {

            var maleVsFemaleData = <?php echo json_encode((new Charts(new Database()))->chart3(), JSON_NUMERIC_CHECK); ?>;
            
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                theme: "dark2",
                title: {
                    text: "Male VS Female in Lake Thalia"
                },
                data: [{
                    type: "pie",
                    startAngle: 240,
                    yValueFormatString: "##0.00\"%\"",
                    indexLabel: "{label} {y}",
                    dataPoints: [
                        { y: maleVsFemaleData[0].Male, label: "Male" },
                        { y: maleVsFemaleData[0].Female, label: "Female" }
                    ]
                }]
            });

            chart.render();

        }
    </script>
    <style>
        #backButton {
            border-radius: 4px;
            padding: 8px;
            border: none;
            font-size: 16px;
            background-color: #2eacd1;
            color: white;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .invisible {
            display: none;
        }
    </style>
</head>

<body>
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div id="chartContainer" style="height: 370px; width: 80%;"></div>
    <button class="btn invisible" id="backButton">&lt; Back</button>
    <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>

</html>
