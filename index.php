<?php
include("main.php");

?>

<section class="employee-table">
    <div class="table-container">
        <h1>Employee List</h1>
        <table id="employeeTable" class="index-table">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>contact</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $employeeData = $db->fetchEmployeeData();
                $counter = 1;
                if ($employeeData) {
                    foreach ($employeeData as $row) {

                        echo "<tr>
                           
                            <td>$counter</td>
                            <td>{$row['employee_name']}</td>
                            <td>{$row['employee_email']}</td>
                            <td>{$row['department_name']}</td>
                            <td>{$row['phone_number']}</td>

                           
                        </tr>";
                        $counter++;
                    }
                } else {
                    echo "<tr>
                        <td colspan='6'>No students found</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</section>