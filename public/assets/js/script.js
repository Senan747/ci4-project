const fileInput = document.getElementById("fileInput");
const fileList = document.getElementById("fileList");
const uploadLabel = document.getElementById("uploadLabel");
let currentFiles = [];

fileInput.addEventListener("change", () => {
  addFiles(fileInput.files);
});

uploadLabel.addEventListener("dragover", (e) => {
  e.preventDefault();
  uploadLabel.style.backgroundColor = "#e0f2fe";
});

uploadLabel.addEventListener("dragleave", () => {
  uploadLabel.style.backgroundColor = "#f8fafc";
});

uploadLabel.addEventListener("drop", (e) => {
  e.preventDefault();
  uploadLabel.style.backgroundColor = "#f8fafc";
  addFiles(e.dataTransfer.files);
});

function addFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    currentFiles.push(file); // Fayl obyektini əlavə et
  }
  renderFileList();
  saveFilesToLocal();
}

function removeFile(index) {
  currentFiles.splice(index, 1);
  renderFileList();
  saveFilesToLocal();
}

function renderFileList() {
  fileList.innerHTML = "";
  currentFiles.forEach((file, index) => {
    const li = document.createElement("li");
    li.innerHTML = `
      ${file.name} (${(file.size / 1024).toFixed(1)} KB)
      <button class="remove-btn" onclick="removeFile(${index})">❌</button>
    `;
    fileList.appendChild(li);
  });
}

function saveFilesToLocal() {
  const serialized = currentFiles.map((file) => ({
    name: file.name,
    size: file.size,
    type: file.type,
  }));
  localStorage.setItem("filesMeta", JSON.stringify(serialized));
}

function loadFilesFromLocal() {
  const saved = localStorage.getItem("filesMeta");
  if (saved) {
    try {
      currentFiles = JSON.parse(saved).map(
        (meta) => new File([""], meta.name, meta)
      );
      renderFileList();
    } catch (e) {
      console.warn("Faylları yükləmək mümkün olmadı");
    }
  }
}

// Modal və Step idarəsi
const overlay = document.querySelector(".overlay");
const outlineButton = document.querySelector(".outline-button");
const filledButton = document.querySelector(".filled-button");
const nextIcon = document.getElementsByClassName("next")[0];
const exIcon = document.getElementsByClassName("ex")[0];
const contact = document.getElementById("contact");
const occur = document.getElementById("event");
const complaint = document.getElementById("complaint");
const file = document.getElementById("file");
const addText = document.querySelector(".add-text");
const completeButton = document.querySelector(".complete-button");
const inputs = document.querySelectorAll("input, textarea");
const contactStep = document.querySelector(".contact-step");

const formStorageKey = "formData";
const stepStorageKey = "formStep";
const errorClass = "input-error";

let k = 1;
let anonymous = false;

document.addEventListener("DOMContentLoaded", () => {
  // loadFilesFromLocal();

  const isModalSeen = localStorage.getItem("anonymousModalSeen");
  if (!isModalSeen) {
    overlay.style.display = "flex";
  } else {
    overlay.style.display = "none";
  }

  if (localStorage.getItem("anonymous")) {
    anonymous = true;
    k = 2;
    if (contact) {
      contact.parentNode.removeChild(contact);
    }
    contactStep && (contactStep.style.display = "none");
    exIcon.style.display = "none";
  }

  loadFromLocal();
  updateStepView();
});

outlineButton.addEventListener("click", () => {
  overlay.style.display = "none";
  k = 1;
  localStorage.removeItem("anonymous");
  localStorage.setItem("anonymousModalSeen", "true");
  updateStepView();
});

filledButton.addEventListener("click", () => {
  overlay.style.display = "none";
  anonymous = true;
  k = 2;
  localStorage.setItem("anonymous", true);
  localStorage.setItem("anonymousModalSeen", "true");

  if (contact) {
    contact.parentNode.removeChild(contact);
  }
  contactStep && (contactStep.style.display = "none");
  exIcon.style.display = "none";
  updateStepView();
});

nextIcon.addEventListener("click", () => {
  if (
    (k === 1 && !validateStep1()) ||
    (k === 2 && !validateStep2()) ||
    (k === 3 && !validateStep3())
  )
    return;

  k++;
  updateStepView();
});

exIcon.addEventListener("click", () => {
  k--;
  if (anonymous && k == 2) {
    exIcon.style.display = "none";
  }
  updateStepView();
});

function updateStepView() {
  [contact, occur, complaint, file].forEach((step, i) => {
    if (step) {
      if (k === i + 1) {
        step.classList.add("show");
        step.classList.remove("hidden");
      } else {
        step.classList.remove("show");
        step.classList.add("hidden");
      }
    }
  });

  nextIcon.style.display = k === 4 ? "none" : "flex";
  completeButton.classList.toggle("disabled", k !== 4);
  addText.classList.toggle("hidden", k !== 2 && k !== 4);

  if (anonymous) {
    exIcon.style.display = k > 2 ? "flex" : "none";
  } else {
    exIcon.style.display = k > 1 ? "flex" : "none";
  }

  saveToLocal();
}

// Validasiya funksiyaları
function validateStep1() {
  let valid = true;
  const requiredFields = ["name", "surname", "phone", "email"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    const value = input?.value.trim();
    removeError(input);
    if (!value) {
      showError(input, "Bu xana boş buraxıla bilməz");
      valid = false;
    } else if (id === "email" && !isValidEmail(value)) {
      showError(input, "Düzgün e-poçt formatı daxil edin");
      valid = false;
    }
  });
  return valid;
}

function validateStep2() {
  let valid = true;
  const requiredFields = ["location", "event_date", "hours_range"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    if (!input?.value.trim()) {
      showError(input, "Bu xana boş buraxıla bilməz");
      valid = false;
    }
  });
  return valid;
}

function validateStep3() {
  let valid = true;
  const requiredFields = ["complain_details", "people"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    if (!input?.value.trim()) {
      showError(input, "Bu xana boş buraxıla bilməz");
      valid = false;
    }
  });
  return valid;
}

function isValidEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// LocalStorage form
function saveToLocal() {
  const data = {};
  inputs.forEach((el) => {
    if (el.id) data[el.id] = el.value;
  });
  localStorage.setItem(formStorageKey, JSON.stringify(data));
  localStorage.setItem(stepStorageKey, k.toString());
}

function loadFromLocal() {
  const data = JSON.parse(localStorage.getItem(formStorageKey)) || {};
  Object.entries(data).forEach(([id, value]) => {
    const el = document.getElementById(id);
    if (el) el.value = value;
  });

  const savedStep = parseInt(localStorage.getItem(stepStorageKey));
  if (!isNaN(savedStep) && savedStep >= 1 && savedStep <= 4) {
    k = savedStep;
  }
}

// Input dəyişdikdə yadda saxla
inputs.forEach((el) => {
  el.addEventListener("input", () => {
    saveToLocal();
    removeError(el);
  });
});

function showError(input, message) {
  if (!input) return;
  input.classList.add(errorClass);
  const label = input.closest(".input-container")?.querySelector("label");
  const inlineError = label?.querySelector(".error-msg-inline");
  if (inlineError) inlineError.textContent = message;
}

function removeError(input) {
  if (!input) return;
  input.classList.remove(errorClass);
  const label = input.closest(".input-container")?.querySelector("label");
  const inlineError = label?.querySelector(".error-msg-inline");
  if (inlineError) inlineError.textContent = "";
}

// Göndər düyməsi
document
  .querySelector(".complete-button")
  .addEventListener("click", async () => {
    if (k !== 4) return;

    if (
      !validateStep2() ||
      !validateStep3() ||
      (!anonymous && !validateStep1())
    ) {
      alert("Zəhmət olmasa bütün xanaları düzgün doldurun.");
      return;
    }

    const payload = {};
    inputs.forEach((input) => {
      if (input.id && input.value.trim()) {
        payload[input.id] = input.value;
      }
    });

    payload.is_anonymous = anonymous;

    try {
      const response = await fetch("/api/create-complaint", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(payload),
      });

      const data = await response.json();
      if (data.status === "ok") {
        const formData = new FormData();

        const fileInput = document.getElementById("fileInput");

        for (let i = 0; i < fileInput.files.length; i++) {
          formData.append("files[]", fileInput.files[i]);
        }

        fetch(`/api/upload-files/${data?.id}`, {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            // console.log("Uğurla göndərildi:", data);
            window.location.href = "/register";
            localStorage.clear();
          })
          .catch((error) => {
            console.error("Xəta baş verdi:", error);
          });
      } else {
        alert("Xəta baş verdi: " + (data.message || "Naməlum xəta"));
      }
    } catch (err) {
      console.error("Serverə göndərərkən xəta:", err);
      alert("Server bağlantı xətası!");
    }
  });
