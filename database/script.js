function registerUser() {
    let formData = new FormData(document.querySelector("#registerForm"));

    fetch("register.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            alert("Registration successful!");
        } else {
            alert("Registration failed!");
        }
    });
}

function loginUser() {
    let formData = new FormData(document.querySelector("#loginForm"));

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {
        if (data === "success") {
            alert("Login successful!");
            location.reload();
        } else if (data === "wrong") {
            alert("Incorrect password");
        } else {
            alert("Email not found");
        }
    });
}
