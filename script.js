const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const registerForm = document.getElementById('registerForm');
signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});
registerForm.addEventListener('submit', (e) => {
    const password = document.getElementById('reg_password').value;
    if (password.length < 6) {
        e.preventDefault();
        alert('Password must be at least 6 characters long.');
    }
});