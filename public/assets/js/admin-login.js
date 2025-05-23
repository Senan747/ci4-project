document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault(); // səhifənin yenilənməsinin qarşısını alır

  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  fetch("http://localhost:8080/api/admin-login", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ email, password }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.status === 'ok') {
        document.getElementById("message").style.color = "green";
        document.getElementById("message").textContent = "Login successful!";
        // burada redirect və ya token saxlama əməliyyatları ola bilər
        window.location.href = "/admin/complaints";
      } else {
        document.getElementById("message").style.color = "red";
        document.getElementById("message").textContent = "Invalid credentials";
      }
    })
    .catch((error) => {
      document.getElementById("message").style.color = "red";
      document.getElementById("message").textContent =
        "Error connecting to server";
      console.error("Error:", error);
    });
});
