function validateForm() {
  
  const fullName = document.getElementById("fullName").value.trim();
  const email = document.getElementById("email").value.trim();
  const password1 = document.getElementById("password1").value;
  const password2 = document.getElementById("password2").value;
  const zip = document.getElementById("zipCode").value.trim();
  const checkBox = document.getElementById("checkBox");


  const fullNameError = document.getElementById("fullNameError");
  const emailError = document.getElementById("emailError");
  const password1Error = document.getElementById("password1Error");
  const password2Error = document.getElementById("password2Error");
  const zipCodeError = document.getElementById("zipCodeError");
  const checkBoxError = document.getElementById("checkBoxError");

  fullNameError.textContent = "";
  emailError.textContent = "";
  password1Error.textContent = "";
  password2Error.textContent = "";
  zipCodeError.textContent = "";
  checkBoxError.textContent = "";

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

  if (dob) {
    const birthDate = new Date(dob);
    if (isNaN(birthDate.getTime())) {
      document.getElementById("dobError").textContent = "Invalid Date of Birth.";
      hasError = true;
    } else {
      const today = new Date();
      let age = today.getFullYear() - birthDate.getFullYear();
      const m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
      }
  
      if (age < 18) {
        document.getElementById("dobError").textContent = "You must be at least 18 years old.";
        hasError = true;
      }
    }
  } 

  if (zip.length < 4) {
    zipCodeError.textContent = "Zip code must be at least 4 characters long.";
    isValid = false;
  }

  if (!checkBox.checked) {
    checkBoxError.textContent = "You must agree to the Terms and Conditions.";
    isValid = false;
  }

  
  return isValid;
}
