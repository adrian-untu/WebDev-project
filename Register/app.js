//the animation
//add a class to the container element when we click on sign up button on panel1
//remove that class when we click on the sign in button from the panel2
//switch from sign up form to the register and move the background

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
//show and hide the password
const passwordEl = document.querySelector(".password");
const eyeButton = document.querySelector(".fa");
let isPass = true;
function togglePass() {
  if (isPass) {
    passwordEl.setAttribute("type", "text");
    eyeButton.classList.remove("fa-eye-slash");
    eyeButton.classList.add("fa-eye");
    isPass = false;
  } else {
    passwordEl.setAttribute("type", "password");
    eyeButton.classList.remove("fa-eye");
    eyeButton.classList.add("fa-eye-slash");
    isPass = true;
  }
}
