<!--
Carlos Munoz
assignment09
INFO_1335_4A
Rosas
5-20-2021
-->
<?php
require('db.php');

/*
Complete the php below to query the database and display the result set with PDO.
There are examples on pages 635 and 149 of your book.
Keep in mind, we are not using functions or bind values in this page - though 
you will see those in your book.
*/

//get the student schedule info from the database
$qry = 'SELECT fname, lname, CONCAT("(", area_code, ")",phone) AS phone, CONCAT(dept, number, "-", section) AS number, name, location, meeting_time, grade
        FROM students s
        JOIN enroll e ON s.stu_id = e.stu_id 
        JOIN classes c ON e.class_id = c.class_id
        ORDER BY lname';
$stmt = $db->prepare($qry);
$stmt->execute();
$students = $stmt->fetchAll();
$stmt->closeCursor();
?>

<!--===============================================================================================
DON'T TOUCH THIS STUFF! Starting here....
-->
<!DOCTYPE html>
<head>
    <title>Student Schedules Report</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<main>
<!--
To Here.
===============================================================================================-->


    <h1>Student Schedules</h1>
    <!-- display a table based on result set $lines -->
    <div class="table100 ver6 m-b-110">
	<table data-vertable="ver6">
        <tr class="row100 head">
<!-- Use the empty th entry below as a template to create column headers for each of the headers found in the assignment -->
            <th class="column100 column1" data-column="column1">Last Name</th>
            <th class="column100 column1" data-column="column1">First Name</th>
            <th class="column100 column1" data-column="column1">Phone Number</th>
            <th class="column100 column1" data-column="column1">Course Number</th>
            <th class="column100 column1" data-column="column1">Course Name</th>
            <th class="column100 column1" data-column="column1">Location</th>
            <th class="column100 column1" data-column="column1">Meeting Times</th>
            <th class="column100 column1" data-column="column1">Earned Grade</th>
        </tr>
<!-- 
    Create a php entry below this to loop through each line in the result set        
    For each line, create a new row and the appropraite td entries to display the contents.
    Use these entries as a template for styling:
        <tr class="row100">
            <td class="column100 column1" data-column="column1"></td>
        </tr>
    There's an example of a similar problem on page 145 of your book.
-->
        <?php foreach($students as $student): ?>
        <tr class="row100">
            <td class="column100 column1" data-column="column1"><?php echo $student['lname']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['fname']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['phone']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['number']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['name']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['location']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['meeting_time']; ?></td>
            <td class="column100 column1" data-column="column1"><?php echo $student['grade']; ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
<!--===============================================================================================
DON'T TOUCH THIS STUFF! Starting here....
-->
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
<!--
To Here.
===============================================================================================-->
