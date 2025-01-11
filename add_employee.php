<?php
include("main.php");

?>
<section class="form-container">
    <form action="" method="post">
        <h3>register employee</h3>
        <div class="output" style="margin-bottom: 10px;font-size: large;"></div>

        <p>your name <span>*</span></p>
        <input type="text" id="name" name="name" placeholder="enter your name" maxlength="100" required class="box">

        <p>your email <span>*</span></p>
        <input type="email" id="email" name="email" placeholder="enter your email" required class="box">

        <p>your contact <span>*</span></p>
        <input type="text" id="contact" name="contact" placeholder="enter your contact" required class="box">

        <p>your department <span>*</span></p>
        <select name="department" id="department" required class="box">
            <option value="" disabled selected>Select your department</option>
            <?php
            $DapartmentData = $db->fetchDapartmentData();

            if ($DapartmentData) {
                foreach ($DapartmentData as $row) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No records found</option>";
            }
            ?>
        </select>

        <input type="submit" value="register now" name="submit" class="btn" id="add_emp">
    </form>
</section>



<script>
    $(document).ready(function () {
        $("#add_emp").on("click", function (e) {
            e.preventDefault();

            var name = $("#name").val();
            var email = $("#email").val();
            var contact = $("#contact").val();
            var department = $("#department").val();

            $.ajax({
                url: "submit_employee.php",
                type: "POST",
                data: { name: name, email: email, contact: contact, department: department },
                success: function (response) {
                    if (response.includes("Success")) {
                        $(".output").css("color", "green").html(response);
                        $("#name").val("");
                        $("#email").val("");
                        $("#contact").val("");
                        $("#department").val("");
                    } else {
                        $(".output").css("color", "red").html(response);
                    }
                },
                error: function () {
                    $(".output").css("color", "red").html("Something went wrong!");
                },
            });
        });
    });
</script>