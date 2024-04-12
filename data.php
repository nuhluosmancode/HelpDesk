<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Page</title>

    <script>
        function playAlarm() {
            // Create an audio element for the alarm sound
            var audio = new Audio('alarm.mp3'); // Replace with the path to your alarm sound file
            audio.play();
        }

        function redirectToLandingPage() {
            window.location.href = 'landing_page.php'; // Replace with the path to your landing page
        }

        function deleteRow(id) {
            if (confirm('Are you sure you want to delete this row?')) {
                // Redirect to the delete page with the row id as a parameter
                window.location.href = 'delete_row.php?id=' + id; // Replace with the path to your delete script
            }
        }
    </script>

    <style>
        body {
            /* Add your styles here if needed */
        }
    </style>
</head>
<body>

<?php
    require 'connection.php';
    $rows = mysqli_query($conn, "SELECT * FROM tb_data ORDER BY id DESC");
    $i = 1;

    // Check if data retrieval was successful before triggering the alarm sound
    if (!empty($rows)) {
        echo '<script>playAlarm();</script>';
    }
?>

<div style="margin-left: 8em">
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td>no.</td>
            <td>name</td>
            <td>email</td>
            <td>maps</td>
            <td>actions</td> <!-- Added a new column for delete buttons -->
        </tr>

        <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"] ?></td>
                <td style="width:450px; height:450px;">
                    <iframe src='https://www.google.com/maps?q=<?php echo $row["latitude"]; ?>,<?php echo $row["longitude"]; ?>&h1=es;z=14&output=embed' style="width:100%; height:100%; "></iframe>
                </td>
                <td>
                    <button onclick="deleteRow(<?php echo $row['id']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <button class="close-button" onclick="goToReferencePage()">Close</button>
</div>

</body>
</html>
