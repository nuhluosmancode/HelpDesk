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

// Handle ticket deletion if requested
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_ticket"])) {
    $ticketIdToDelete = $_POST["delete_ticket"];

    // Prepare and execute the SQL query to delete the selected ticket
    $deleteSql = "DELETE FROM guest_customers WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $ticketIdToDelete);
    $stmt->execute();

    // Redirect to prevent form resubmission
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Prepare and execute the SQL query to retrieve data from the database
$sql = "SELECT * FROM guest_customers";
$result = $conn->query($sql);

// Array to hold retrieved data
$dataArray = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataArray[] = $row;
    }
} else {
    echo "No guest ticket created.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Retrieved Data</title>
    <link rel="stylesheet" href="assets/css/retrieve.css">
    <script>
        

        function goToReferencePage() {
            window.location.href = "./";
        }
        
        // Check if data retrieval was successful before triggering the alarm sound
        <?php
            if (!empty($dataArray)) {
                echo "playAlarm();";
            }
        ?>
    </script>
</head>
<body>
    <h1>Guest customers</h1>
    <?php
    foreach ($dataArray as $data) {
        echo "<div class='ticket-box'>";
        
        echo "<form method='post'>";
        echo "<input type='hidden' name='delete_ticket' value='" . $data["id"] . "'>";
        
        echo "<h2>Ticket created by: " . $data["firstname"] . " " . $data["lastname"] . "</h2>";
        echo "<p><strong>Contact No:</strong> " . $data["contact"] . "</p>";
        echo "<p><strong>Address:</strong> " . $data["address"] . "</p>";
        echo "<p><strong>Email:</strong> " . $data["email"] . "</p>";

        // Check if description is not empty before displaying
        if (!empty($data["description"])) {
            echo "<p><strong>Description:</strong> " . nl2br($data["description"]) . "</p>";
        }
        
        echo "<button type='submit'>Delete Ticket</button>";
        echo "</form>";

        echo "</div>"; // Close the ticket-box div

        echo "<hr>";
    }
    ?>

    <button class="close-button" onclick="goToReferencePage()">Close</button>
</body>
</html>
