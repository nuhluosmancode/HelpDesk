
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
 document.location.href = 'landing_page.php';
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
      @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
#bg {

  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  
}

body {
  font-family: 'Lato', sans-serif;
  color: black;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  overflow: hidden;
  margin: 0;
  padding: 0;
  background: linear-gradient(to bottom, #ef9928, #54cde5);
}

form {
  width: 350px;
  position: relative;
}
form .form-field::before {
  font-size: 20px;
  position: absolute;
  left: 15px;
  top: 17px;
  color: #888888;
  content: " ";
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
}
form .form-field:nth-child(1)::before {
  background-image: url(img/user-icon.png);
  width: 20px;
  height: 20px;
  top: 15px;
}
form .form-field:nth-child(2)::before {
  background-image: url(img/lock-icon.png);
  width: 16px;
  height: 16px;
}
form .form-field {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
  margin-bottom: 1rem;
  position: relative;
}
form input {
  font-family: inherit;
  width: 100%;
  outline: none;
  background-color: #fff;
  border-radius: 4px;
  border: none;
  display: block;
  padding: 0.9rem 0.7rem;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
  color: #4A4A4A;
  text-indent: 40px;
}
form .btn {
  outline: none;
  border: none;
  cursor: pointer;
  display: inline-block;
  margin: 0 auto;
  padding: 0.9rem 2.5rem;
  text-align: center;
  background-color: #47AB11;
  color: #fff;
  border-radius: 4px;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16);
  font-size: 17px;
}
label {
        margin-right: 10px; /* Adjust the value as needed */
    }
    </style>


</head>
<body onload = "getLocation();">
    
<form class="myform" action="" method="post" autocomplete="off">
<div class="form-field">

<label for=""> Contact</label>
<input type="tel" name="name" required value=""><br>
</div>

<div class="form-field">
<label for="">Message</label>
<input type="text" name="message" required value=""><br>
</div>
<input type="hidden" name="latitude" value="">
<input type="hidden" name="longitude" value="">

<div class="form-field">
<button type="submit" class="btn"  name="submit">submit</button>
</div>
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

</body>
</html>








