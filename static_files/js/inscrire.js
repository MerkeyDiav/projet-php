// There are many ways to pick a DOM node; here we get the form itself and the email
// input box, as well as the span element into which we will place the error message.
const form = document.querySelector(".registration");
const email = document.getElementById("mail");
const password = document.getElementById("password");
const confirm_password = document.getElementById("confirm_password");
const passwordError = document.querySelector("#password + span.error");
const confirmPasswordError = document.querySelector("#confirm_password + span.error");
const emailError = document.querySelector("#mail + span.error");

console.log(emailError, passwordError, confirmPasswordError, mail.value)

email.addEventListener("input", (event) => {
    // Each time the user types something, we check if the
    // form fields are valid.

    if (email.validity.valid && isValidEmail(email.value)) {
        // In case there is an error message visible, if the field
        // is valid, we remove the error message.
        emailError.value = ""; // Reset the content of the message
        emailError.className = "error"; // Reset the visual state of the message
    } else {
        // If there is still an error, show the correct error
        showError();
    }

    if (password > 8 ) {
        passwordError.textContent = "";
        passwordError.className = "error";
    } else {
        showError();
    }
    if (password.value === confirm_password.valueOf){
        confirmPasswordError.textContent = "";
        confirmPasswordError.className = "error";
    } else {
        showError();
    }
});

form.addEventListener("submit", (event) => {
    // if the email field is valid, we let the form submit
    console.log("jelo")
    console.log(emailError, passwordError, confirmPasswordError, mail.value)
    if (!email.validity.valid) {
        // If it isn't, we display an appropriate error message
        showError();
        // Then we prevent the form from being sent by canceling the event
        event.preventDefault();
    }
    if (password < 8){
        showError();
        event.preventDefault()
    }
    if ( password !== confirm_password){
        showError();
        event.preventDefault();
    }
});

function showError() {
    if (email.validity.valueMissing) {
        // If the field is empty,
        // display the following error message.
        emailError.textContent = "You need to enter an email address.";
    }
    if (!isValidEmail(email.value)) {
        // If the field doesn't contain an email address,
        // display the following error message.
        emailError.textContent = "Entered value needs to be an email address.";
        console.log(emailError, "bonjour");
    } else if (email.validity.tooShort) {
        // If the data is too short,
        // display the following error message.
        emailError.textContent = `Email should be at least ${email.minLength} characters; you entered ${email.value.length}.`;
    }
    if (password.validity.valueMissing){
        passwordError.textContent = `Le mot depasse doit contenir au moin ${password.minLength} caracteres`;
        passwordError.className = "error active";
    } else if (password.validity.tooShort){
        passwordError.textContent = `Le mot depasse doit contenir au moin ${password.minLength} caracteres`;
        passwordError.className = "error active";
    } else if (password.value !== confirm_password.value){
        confirmPasswordError.textContent = "Password et confirm password dont match";
        passwordError.textContent = "Password et confirm password dont match";
        confirmPasswordError.className = "error active";
    }

    // Set the styling appropriately
    emailError.className = "error active";
}



function isValidEmail(email) {
    const res = /^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/;
    return res.test(String(email).toLowerCase());
}