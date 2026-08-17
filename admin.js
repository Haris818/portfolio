const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", function (e) {

    e.preventDefault();

    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value;

    // Admin credentials
    const adminUsername = "admin";
    const adminPassword = "Admin@12345";

    if (
        username === adminUsername &&
        password === adminPassword
    ) {

        sessionStorage.setItem("adminLoggedIn", "true");

        window.location.href = "dashboard.php";

    } else {

        document.getElementById("error").textContent =
            "Invalid username or password.";

    }

});