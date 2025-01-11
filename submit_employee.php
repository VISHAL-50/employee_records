<?php

include("databaseFunctions.php");
$db = new databaseFunctions('localhost', 'root', '', 'employee_records');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new databaseFunctions('localhost', 'root', '', 'employee_records');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $departmentId = $_POST['department'];


    $employeeData = $db->insertEmployee($name, $email, $departmentId, $contact);


    if ($employeeData) {
        echo "Success: Employee and contact added successfully!";
    } else {
        echo "Error: Contact could not be added.";
    }
    exit;
} else {
    echo "Invalid request method.";
    exit;
}
