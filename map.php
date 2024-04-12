
<?php

 require 'connection.php';

 if(isset($_POST["submit"])){

    $name = $_POST["name"];
    $message = $_POST["message"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];

    $query = "INSERT INTO tb_data VALUES('','$name', '$message','$latitude','$longitude' )";
 mysqli_query($conn, $query);

 echo 
 "
 <script>
 alert('Data added Successfully');
 document.location.href = 'data.php';
 </script>
 
 
 "
 ;
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Sender</title>
    <style>
        body {
            background: linear-gradient(to bottom, #ef9928, #54cde5);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            flex-direction: column; /* Add this to stack elements vertically */
        }

        input {
            margin-bottom: 10px; /* Add space at the bottom of the input fields */
            padding: 8px;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>


</head>
<body onload = "getLocation();">
    
<form class="myform" action="" method="post" autocomplete="off">


<label for=""> Contact</label>
<input type="number" name="name" required value=""><br>

<label for="">Message</label>
<input type="text" name="message" required value=""><br>

<input type="hidden" name="latitude" value="">
<input type="hidden" name="longitude" value="">
<button type="submit"  name="submit">submit</button>
</form>

<script type="text/javascript">
    function getLocation(){

        if(navigator.geolocation){

            navigator.geolocation.getCurrentPosition(showPosition,showError);
        }
    }
function showPosition(position){

    document.querySelector('.myform input[name = "latitude"]'). value = position.coords.latitude;
    document.querySelector('.myform input[name = "longitude"]'). value = position.coords.longitude;
}

function showError(error){

    switch(error.code){
        case error.PERMISSION_DENIED:
            alert("You Must Allow The Request For Geolocation To Fill Out The Form");
            location.reload();
            break;
    }
}
</script>
<br>
<a href="data.php">Database page</a>
</body>
</html>








