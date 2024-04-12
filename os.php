
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <title>New Custom - Login</title>
  <link rel="stylesheet" type="text/css" href="css.css">

  <script src="https://cdn.tiny.cloud/1/1xp84rm43ny9nts27r9mqnnly2kj3fr8qd1pvaaldfukkse3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/os.css">
 
</head>
<body>
 

  <div class="navbar">
    <div class="logo" >
        <img src="assets/images/logo.png" alt="Logo" width="80px",height="80px" style="margin-right:90px";>
    </div>
   

<div class="title" style="margin-right:50px">
    <h1>Guest Customer</h1>
  </div>
    <div class="nav-buttons" style="margin-left:0px">
        <button class="nav-button">Home</button>
        <button class="nav-button">Login</button>
    </div>
</div>
  <div class="container">
    <div class="form-container">
      <h2>Fill The Form And Create Your Ticket</h2>
      <!-- Set the 'action' attribute to 'submit.php' to point to the processing script -->
      <form method="post" action="submit.php">

            <!-- Your form fields for login go here -->
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first-name" required>
                <span class="error-message" id="first-name-error"></span>
            </div>

            <div class="form-group">
                <label for="middle-name">Middle Name</label>
                <input type="text" id="middle-name" name="middle-name">
                <span class="error-message" id="middle-name-error"></span>
            </div>

            <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last-name" required>
                <span class="error-message" id="last-name-error"></span>
            </div>
              
            <div class="form-group">
    <label for="contact-no">Contact No</label>
    <div class="country-code">
        <img src="assets/images/malawi.png" alt="Malawi Flag" width="24" height="24">
        <label>+265</label>
        <input type="tel" id="contact-no" name="contact-no" maxlength="9" required style="margin-left: 6px;">
    </div>
    
    <div class="error-container">
        <span class="error-message" id="contact-no-error"></span>
    </div>
</div>


        <div class="form-group">
          <label for="address">Address</label>
          <input type="text" id="address" name="address" required>
        </div>

        <div class="form-group">
  <label for="email">Email</label>
  <input type="email" id="email" name="email" required>
  <span class="error-message" id="email-error"></span>
</div>

 
<!--TinyMCE website -->
<div class="form-group">
          <label for="description">Report Problem</label>
          <textarea id="description" name="description" rows="16" required></textarea>
        </div>

        <div class="form-group">
  <input type="submit" value="Submit" onclick="submitForm()">
</div>

</form>
</div>
</div>
</div>

<script>
  
  // JavaScript function to submit the form
  function submitForm() {
    // Trigger TinyMCE to save the content to the textarea
    tinymce.triggerSave();
    
    // Submit the form
    document.getElementById('your-form-id').submit(); // Replace 'your-form-id' with your actual form ID
  }
</script>
  
  <script>
  // Function to validate text fields
function validateText(inputField, errorField) {
  const inputValue = inputField.value.trim();

  if (!inputValue.match(/^[a-zA-Z]+$/)) {
    errorField.textContent = "Only letters are allowed.";
    inputField.focus(); // Set focus on the problematic input field
    return false;
  } else {
    errorField.textContent = ""; // Clear error message
    return true;
  }
}

// Function to validate the contact number
function validateContactNo(inputField, errorField) {
  const inputValue = inputField.value.trim();

  if (!inputValue.match(/^[0-9]*$/)) {
    errorField.textContent = "Only numbers are allowed.";
    inputField.focus(); // Set focus on the problematic input field
    return false;
  } else {
    errorField.textContent = ""; // Clear error message
    return true;
  }
}

// Get form elements
const firstNameInput = document.getElementById("first-name");
const middleNameInput = document.getElementById("middle-name");
const lastNameInput = document.getElementById("last-name");
const contactNoInput = document.getElementById("contact-no");
const firstNameError = document.getElementById("first-name-error");
const middleNameError = document.getElementById("middle-name-error");
const lastNameError = document.getElementById("last-name-error");
const contactNoError = document.getElementById("contact-no-error");

// Add event listeners for validation
firstNameInput.addEventListener("blur", () => validateText(firstNameInput, firstNameError));
middleNameInput.addEventListener("blur", () => validateText(middleNameInput, middleNameError));
lastNameInput.addEventListener("blur", () => validateText(lastNameInput, lastNameError));
contactNoInput.addEventListener("blur", () => validateContactNo(contactNoInput, contactNoError));

// Add form submission validation
document.querySelector("form").addEventListener("submit", function (event) {
  let valid = true; // Flag to track overall form validity

  // Validate first name
  if (!validateText(firstNameInput, firstNameError)) {
    valid = false;
  }

  // Validate middle name
  if (!validateText(middleNameInput, middleNameError)) {
    valid = false;
  }

  // Validate last name
  if (!validateText(lastNameInput, lastNameError)) {
    valid = false;
  }

  // Validate contact number
  if (!validateContactNo(contactNoInput, contactNoError)) {
    valid = false;
  }

  if (!valid) {
    event.preventDefault(); // Prevent form submission if there are validation errors
  }
});


// Function to validate email
function validateEmail(inputField, errorField) {
  const inputValue = inputField.value.trim();

  if (!inputValue.match(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/)) {
    errorField.textContent = "Please enter a valid email address.";
    inputField.focus(); // Set focus on the problematic input field
    return false;
  } else {
    errorField.textContent = ""; // Clear error message
    return true;
  }
}

// Get the email input element and error element
const emailInput = document.getElementById("email");
const emailError = document.getElementById("email-error");

// Add an event listener for email validation
emailInput.addEventListener("blur", () => validateEmail(emailInput, emailError));

// Add email validation to the form submission validation
document.querySelector("form").addEventListener("submit", function (event) {
  let valid = true; // Flag to track overall form validity

  // Validate email
  if (!validateEmail(emailInput, emailError)) {
    valid = false;
  }

  // Other validation logic for first name, middle name, last name, and contact number here...

  if (!valid) {
    event.preventDefault(); // Prevent form submission if there are validation errors
  }
});
</script>
</body>
</html>
