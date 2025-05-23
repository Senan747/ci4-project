function editComplaint(id) {
  window.location.href = "/admin/complaints/edit/" + id;
}

document
  .getElementById("responseForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const form = e.target;
    const id = form.id.value;
    const data = {
      status: form.status.value,
      response: form.response.value,
      responser: form.responser.value,
    };
    const baseUrl = window.location.origin;
    const response = await fetch(
      `${baseUrl}/api/admin/complaints/update/${id}`,
      {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      }
    );

    const result = await response.json();

    if (result.status === "ok") {
      alert("Məlumat uğurla yeniləndi.");
    //   window.location.href = "/admin/complaints";
    } else {
      alert("Xəta: " + result.message);
    }
  });
