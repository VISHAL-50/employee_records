<?php
include("main.php");





if (isset($_POST['create_dept'])) {
    $name = $_POST['dept_name'];

    if (!empty($name)) {

        $employeeData = $db->insertDepartment($name);
        echo "<script>alert('$employeeData');</script>";

    } else {
        echo "<script>alert('Please enter a class name.');</script>";
    }
}
?>



<section class="create-class">

    <div class="create-class-form">
        <form action="" method="post" class="create-form">
            <div class="form-row" style="
    display: flex;
    justify-content: center;
    align-items: baseline;
    gap: 1rem;
">
                <input type="text" name="dept_name" placeholder="Enter department name" required="" class="box">
                <input type="submit" value="Create" name="create_dept" class="btn create-btn">
            </div>
        </form>
    </div>
</section>

<section class="dept-table">
    <div class="table-container">
        <h1>Department List</h1>


        <!-- Class Table -->
        <table id="deptTable" class="deptTable">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>ID</th>
                    <th>Department Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $DapartmentData = $db->fetchDapartmentData();
                $counter = 1;
                if ($DapartmentData) {
                    foreach ($DapartmentData as $row) {

                        echo "<tr>
                           
                            <td>$counter</td>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                           

                            <td>
                                
                             
                                 <a href='delete_department.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this department?\")' class='delete-btn table-btn'>Delete</a>
                            </td>
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