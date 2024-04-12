<?php
    require 'connection.php';

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Perform the deletion query
        $deleteQuery = "DELETE FROM tb_data WHERE id = $id";

        if (mysqli_query($conn, $deleteQuery)) {
            // Redirect back to the page after successful deletion
            header('Location: your_page.php'); // Replace with the actual name of your page
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid request. Missing 'id' parameter.";
    }
?>
