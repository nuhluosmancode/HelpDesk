<?php
// Check if a message parameter is set in the URL
if (isset($_GET['message'])) {
    // Check the value of the message parameter
    if ($_GET['message'] === 'success') {
        // Display the success message
        echo '<div class="success-message">Your ticket has been created successfully.</div>';
    }
}
?>




<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Replace these database credentials with your actual database details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "css_db";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $firstname = $_POST["first-name"];
    $middlename = $_POST["middle-name"];
    $lastname = $_POST["last-name"];
    $contact = $_POST["contact-no"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    
    
    $description = isset($_POST["description"]) ? $_POST["description"] : "";

   


    // Validate if the "description" field is not empty before proceeding
    if (trim($description) === "") {
        echo "Error: Description field cannot be empty";
    } else {
        // Prepare and execute the SQL query to insert data into the database
        $sql = "INSERT INTO guest_customers (firstname, middlename, lastname, contact, address, email, description) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $firstname, $middlename, $lastname, $contact, $address, $email, $description);
        $stmt->execute();

        // Check if the data was successfully inserted
        if ($stmt->affected_rows > 0) {
            header("Location: landing_page.php?message=success");
            exit(); // Exit after the redirect
        } else {
            echo "Error inserting data: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    }
}

// Close the database connection
$conn->close();
?>









