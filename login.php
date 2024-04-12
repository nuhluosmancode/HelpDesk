<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login | Lilongwe Help Desk System</title>

  <?php include('./header.php'); ?>
  <?php 
  if(isset($_SESSION['login_id']))
  header("location:index.php?page=home");
  ?>

  <style>
    body {
      width: 100%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #36db86;
      margin: 0;
      padding: 0;
    }
	

    .card {
      max-width: 400px;
      width: 100%;
    }

  

    /* Center text on the page */
    #main {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    /* Center the h1 text within the navbar */
 
    .navbar {
  display: flex;
  justify-content: space-between; /* Add space between logo and buttons */
  align-items: center;
  
  color: #fff;
  height: 70px;
  padding: 10px;
}

/* Adjust the logo and title styles */
.logo {
  margin-right: 10px; /* Reduce margin for smaller screens */
}

.title {
  margin-right: 10px; /* Reduce margin for smaller screens */
  font-size: 18px; /* Reduce font size for smaller screens */
}

.nav-buttons {
  display: flex;
  gap: 12px;
}

.nav-button {
  background-color: #36db86;
  color: #fff;
  border: none;
  border-radius: 50px;
  padding: 10px 20px;
  cursor: pointer;
  transition: background-color 0.3s;
}

/* Add a media query for smaller screens */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column; /* Stack elements vertically */
    height: auto; /* Remove fixed height */
  }

 

  .title {
    font-size: 16px; /* Reduce font size further for smaller screens */
  }
}
    h1,h2 {
            font-family: 'Poppins', sans-serif;
        }

    .navbar h1 {
      margin: 0;
    }

    .nav-buttons {
      display: flex;
      gap: 12px; /* Adjust the spacing between buttons */
    }

    .nav-button {
      background-color: #36db86; /* Set the button background color to orange */
      color: #fff; /* Text color */
      border: none; /* Remove the button border */
      border-radius: 50px; /* Make it oval rounded */
      padding: 10px 20px; /* Adjust padding as needed */
      cursor: pointer;
      transition: background-color 0.3s; /* Add a transition for hover effect */
    }

    .nav-button:hover {
      background-color: #efa104; /* Change to blue on hover */
    }

    /* Add custom CSS to align the form to the right and center align the content */
    body {
     
      background: linear-gradient(to bottom, #ef9928, #54cde5);
      margin: 0;
      padding: 0;
      width: 100%;
      height:calc(100%);
      position: fixed;
      top: 0;
      left : 0;
      
    }

    main#main{

width: -90%;
calc(100%);


    }

  </style>

</head>

<body>

<div class="navbar">
    <div class="logo" >
    

       
    </div>
</div>
    </a>
 

  <main id="main">
    <div class="align-self-center w-100">
      <h4 class="text-white text-center"  ><b>Sign in to create & check ticket status </b></h4>
      <div id="login-center">
        <div class="card" >
          <div class="card-body">
            <form id="login-form">
              <div class="form-group">
                <label for="username" class="control-label text-dark">Username</label>
                <input type="text" id="username" name="username" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label for="password" class="control-label text-dark">Password</label>
                <input type="password" id="password" name="password" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label for="password" class="control-label text-dark">Type</label>
                <select class="custom-select custom-select-sm" name="type">
                  <option value="3">Customer</option>
                  <option value="2">Staff</option>
                  <option value="1">Admin</option>
                </select>
              </div>
              <center><button class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script>
    $('#login-form').submit(function(e) {
      e.preventDefault()
      $('#login-form button[type="button"]').attr('disabled', true).html('Logging in...');
      if ($(this).find('.alert-danger').length > 0)
        $(this).find('.alert-danger').remove();
      $.ajax({
        url: 'ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
          console.log(err)
          $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
        },
        success: function(resp) {
          if (resp == 1) {
            location.href = 'index.php?page=home';
          } else {
            $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
            $('#login-form button[type="button"]').removeAttr('disabled').html('Login');
          }
        }
      })
    })
    $('.number').on('input', function() {
      var val = $(this).val()
      val = val.replace(/[^0-9 \,]/, '');
      $(this).val(val)
    })
  </script>
      </script>
    <!-- Start of LiveChat (www.livechat.com) code -->

<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 16571145;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/16571145/" rel="nofollow"></a>,  <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

    </noscript>
    <!-- End of LiveChat code -->

</body>

</html>
