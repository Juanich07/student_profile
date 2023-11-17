<?php
include_once("../db.php");
include_once("../student.php"); 
include_once("../student_details.php");

$db = new Database();
$connection = $db->getConnection();
$student = new Student($db);
$student_details = new StudentDetails($db);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    
    <?php include('../templates/header.html'); ?>
    <?php include('../includes/navbar.php'); ?>

    <div class="content">
    <h2>Student Records</h2>
    <table class="orange-theme">
        <thead>
            <tr>
                <th>Student Number</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Birthdate</th>
                <th>Contact Number</th>
                <th>Street</th>
                <th>Town City</th>
                <th>Province</th>
                <th>Zip Code</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <!-- You'll need to dynamically generate these rows with data from your database -->
            
       
            
            
            <?php
            $results = $student->displayAll(); 
            foreach ($results as $result) { 

            ?>
            <tr>
            
                <td><?php echo $result['student_number']; ?></td>
                <td><?php echo $result['first_name']; ?></td>
                <td><?php echo $result['middle_name']; ?></td>
                <td><?php echo $result['last_name']; ?></td>
                <td><?php echo $result['gender'] == 1 ? 'F' : 'M'; ?></td>
                <td><?php echo date('Y M d' , strtotime($result['birthday'])); ?></td>

                
                <?php
                    $result1 = $student_details->studentSearch($result['id']);
                    echo "<td>". $result1['contact_number'] ."</td>";
                    echo "<td>". $result1['street'] ."</td>";
                    echo "<td>". $result1['town_city'] ."</td>";
                    echo "<td>". $result1['province'] ."</td>";
                    echo "<td>". $result1['zip_code'] ."</td>";
                ?>

                <td>
                    <a href="student_edit.php?id=<?php echo $result['id']; ?>">Edit</a>
                    |
                    <a href="student_delete.php?id=<?php echo $result['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>

           
        </tbody>
    </table>
        
    <a class="button-link" href="student_add.php">Add New Record</a>

        </div>
        
        
  
    <?php include('../templates/footer.html'); ?>


    <p></p>
</body>
</html>
