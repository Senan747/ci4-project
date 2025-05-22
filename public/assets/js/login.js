document.addEventListener("DOMContentLoaded", () => {
  const loginForm = document.getElementById("loginForm");
  const messageDisplay = document.getElementById("message");

  loginForm.addEventListener("submit", async (event) => {
    event.preventDefault(); // Prevent default form submission

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    messageDisplay.textContent = ""; // Clear previous messages
    messageDisplay.className = "message"; // Reset message class

    try {
      // Replace with your actual API endpoint
      const response = await fetch("api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({ username, password }),
      });

      const data = await response.json();

      if (response.ok) {
        // Login successful
        messageDisplay.textContent = data.message || "Giriş uğurlu!";
        messageDisplay.classList.add("success");
        // Here you might redirect the user or save a token
        // console.log(response);
        console.log("Login successful:", data);
        window.location.href = `user/${data.complaint_id}`
      } else {
        // Login failed
        messageDisplay.textContent =
          data.message || "İstifadəçi adı və ya şifrə yanlışdır.";
        messageDisplay.classList.add("error");
        console.error("Login failed:", data);
      }
    } catch (error) {
      // Network error or other issues
      messageDisplay.textContent =
        "Bir xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.";
      messageDisplay.classList.add("error");
      console.error("Error during login request:", error);
    }
  });
});
