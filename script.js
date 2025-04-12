document.getElementById("checkBtn").addEventListener("click", (event) => {
    event.preventDefault(); // Prevent form submission

    const fullName = document.getElementById("fullName").value;
    const email = document.getElementById("email").value;
    const password1 = document.getElementById("password1").value;
    const password2 = document.getElementById("password2").value;
    const zip= document.getElementById("zipCode").value;
    const checkBox= document.getElementById("checkBox");

    const specialCharPattern = /[^a-zA-Z0-9 .]/;
if (specialCharPattern.test(fullName)) {
    alert("Special character detected in full name!");
    return;
}


    // Email format check: 22-48818-3@student.aiub.edu
    const emailPattern = /^\d{2}-\d{5}-\d@student\.aiub\.edu$/;
    if (!emailPattern.test(email)) {
        alert("Email must be in the format: xx-xxxxx-x@student.aiub.edu");
        return;
    }

    // Password length check
    if (password1.length < 8) {
        alert("Password must be at least 8 characters long.");
        return;
    }

    // Password match check
    if (password1 !== password2) {
        alert("Passwords do not match.");
        return;
    }

    if (zip.length < 4) {
        alert("zip code must be at least 4 characters long.");
        return;
    }

     if (!checkBox.checked) {
        alert("You must agree to the Terms and Conditions.");
        return;
    }

    alert("Form Submitted Successfully");
    document.querySelector("form").reset();
});
