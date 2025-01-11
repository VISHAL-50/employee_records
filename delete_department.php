<?php
include("main.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->deleteDepartment($id);

    if ($result) {
        echo "<script>alert('Department deleted successfully!'); window.location.href='departments.php';</script>";
    } else {
        echo "<script>alert('Failed to delete department.'); window.location.href='departments.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='departments.php';</script>";
}
?>