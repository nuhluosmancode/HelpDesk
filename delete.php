<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["record_id"])) {
    $recordId = $_POST["record_id"];
    
    // Prepare and execute the SQL query to delete the record
    $deleteSql = "DELETE FROM guest_customers WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $recordId);
    $stmt->execute();
    
    // Redirect back to the data retrieval page after deletion
    header("Location: RetrieveData.php");
    exit();
}

// Close the database connection
$conn->close();
?>
