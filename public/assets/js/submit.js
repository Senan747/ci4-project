function submitForm() {
  const pass1 = document.getElementById("password1").value;
  const pass2 = document.getElementById("password2").value;
  const message = document.getElementById("message");
  const username = document.getElementById("username-text").textContent;

  if (!pass1 || !pass2) {
    message.textContent = "Zəhmət olmasa hər iki şifrəni daxil edin.";
    return;
  }

  if (pass1 !== pass2) {
    message.textContent = "Şifrələr uyğun gəlmir!";
  } else {
    fetch("api/create-user", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        username: username,
        password: pass1,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.status == "ok") {
          message.style.color = "green";
          message.textContent = "Şifrə uğurla təyin edildi!";

          window.location.href = '/';

        } else {
          message.textContent = data.message || "Xəta baş verdi!";
        }
      })
      .catch((error) => {
        console.error("Xəta:", error);
        message.textContent = "Serverə qoşulmaq mümkün olmadı.";
      });
  }
}

function copyToClipboard() {
  const text = document.getElementById("username-text").innerText;
  navigator.clipboard.writeText(text).then(
    function () {
      Toastify({
        text: "İstifadəçi adı kopyalandı!",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#198754",
        stopOnFocus: true,
      }).showToast();
    },
    function (err) {
      Toastify({
        text: "Kopyalama uğursuz oldu!",
        duration: 3000,
        close: true,
        gravity: "top",
        position: "right",
        backgroundColor: "#dc3545",
        stopOnFocus: true,
      }).showToast();
    }
  );
}
