<?php

class databaseFunctions
{
    private $conn;

    public function __construct($hostname, $user, $password, $databasename)
    {
        $this->conn = mysqli_connect($hostname, $user, $password, $databasename) or die("connection failed:" . mysqli_connect_errno());


    }

    public function insertEmployee($name, $email, $departmentId, $phoneNumber)
    {
        $name = mysqli_real_escape_string($this->conn, $name);
        $email = mysqli_real_escape_string($this->conn, $email);
        $departmentId = (int) $departmentId;
        $phoneNumber = mysqli_real_escape_string($this->conn, $phoneNumber);

        $query = "INSERT INTO employees (name, email, department_id) VALUES ('$name', '$email', $departmentId)";

        $result = mysqli_query($this->conn, $query);


        if ($result) {
            $employeeId = mysqli_insert_id($this->conn);




            $insertContact = "INSERT INTO contacts (employee_id, phone_number) VALUES ($employeeId, '$phoneNumber')";

            $result = mysqli_query($this->conn, $insertContact);

            if ($result) {


                return true;
            } else {
                return false;
            }
        } else {
            // echo "Error inserting employee: ";
            return false;
        }
    }

    public function deleteDepartment($id)
    {
        $id = (int) $id;

        $query = "DELETE FROM departments WHERE id = $id";

        $result = mysqli_query($this->conn, $query);

        if ($result) {

            return "Success";

        } else {
            return "Error: " . mysqli_error($this->conn);
        }
    }


    public function insertDepartment($name)
    {
        $name = mysqli_real_escape_string($this->conn, $name);

        $query = "INSERT INTO departments (name) VALUES ('$name')";

        $result = mysqli_query($this->conn, $query);

        if ($result) {
            $data = "New record created!";

            return $data;
        } else {
            return "Something went wrong!";
        }
    }


    public function saveContact($employeeId, $phoneNumber)
    {
        $query = "INSERT INTO contacts (employee_id, phone_number) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $employeeId, $phoneNumber);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }


    public function fetchEmployeeData()
    {
        $query = "
            SELECT 
                employees.id AS employee_id,
                employees.name AS employee_name,
                employees.email AS employee_email,
                departments.name AS department_name,
                contacts.phone_number
            FROM 
                employees
            LEFT JOIN 
                departments ON employees.department_id = departments.id
            LEFT JOIN 
                contacts ON employees.id = contacts.employee_id
        ";

        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }

    public function fetchDapartmentData()
    {
        $query = "
            SELECT *
            FROM departments
            
        ";

        $result = mysqli_query($this->conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        } else {
            return [];
        }
    }


    public function __destruct()
    {
        $this->conn->close();
    }
}

?>