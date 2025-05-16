function validateForm() {
  // Get values
  const fullName = document.getElementById("fullName").value.trim();
  const email = document.getElementById("email").value.trim();
  const password1 = document.getElementById("password1").value;
  const password2 = document.getElementById("password2").value;
  const zip = document.getElementById("zipCode").value.trim();
  const checkBox = document.getElementById("checkBox");

  // Get error elements
  const fullNameError = document.getElementById("fullNameError");
  const emailError = document.getElementById("emailError");
  const password1Error = document.getElementById("password1Error");
  const password2Error = document.getElementById("password2Error");
  const zipCodeError = document.getElementById("zipCodeError");
  const checkBoxError = document.getElementById("checkBoxError");

  // Clear previous error messages
  fullNameError.textContent = "";
  emailError.textContent = "";
  password1Error.textContent = "";
  password2Error.textContent = "";
  zipCodeError.textContent = "";
  checkBoxError.textContent = "";

  // Validation flag
  let isValid = true;

  const specialCharPattern = /[^a-zA-Z0-9 .]/;
  const dotCount = (fullName.match(/\./g) || []).length;

  if (specialCharPattern.test(fullName)) {
    fullNameError.textContent = "Special character detected in full name!";
    isValid = false;
  }

  if (dotCount > 1) {
    fullNameError.textContent = "Full name cannot contain more than one dot.";
    isValid = false;
  }

  const emailPattern = /^\d{2}-\d{5}-\d@student\.aiub\.edu$/;
  if (!emailPattern.test(email)) {
    emailError.textContent =
      "Email must be in the format: xx-xxxxx-x@student.aiub.edu";
    isValid = false;
  }

  if (password1.length < 8) {
    password1Error.textContent = "Password must be at least 8 characters long.";
    isValid = false;
  }

  if (password1 !== password2) {
    password2Error.textContent = "Passwords do not match.";
    isValid = false;
  }

  if (zip.length < 4) {
    zipCodeError.textContent = "Zip code must be at least 4 characters long.";
    isValid = false;
  }

  if (!checkBox.checked) {
    checkBoxError.textContent = "You must agree to the Terms and Conditions.";
    isValid = false;
  }

  // If everything is valid, allow the form to submit
  return isValid;
}
