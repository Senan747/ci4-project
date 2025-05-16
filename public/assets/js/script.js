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
    const reader = new FileReader();
    reader.onload = function (e) {
      const base64 = e.target.result;
      currentFiles.push({
        name: file.name,
        size: file.size,
        type: file.type,
        content: base64,
      });
      renderFileList();
      saveFilesToLocal();
    };
    reader.readAsDataURL(file); // faylı base64 formatda oxuyur
  }
}

function saveFilesToLocal() {
  localStorage.setItem("filesData", JSON.stringify(currentFiles));
}

function loadFilesFromLocal() {
  const filesStr = localStorage.getItem("filesData");
  if (!filesStr) return;
  currentFiles = JSON.parse(filesStr);
  renderFileList();
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

function removeFile(index) {
  currentFiles.splice(index, 1);
  renderFileList();
}

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

const formStorageKey = "formData";
const stepStorageKey = "formStep";
const errorClass = "input-error";

let k = 1; // default step

// Modal görünüşü
document.addEventListener("DOMContentLoaded", () => {
  loadFilesFromLocal();

  const isModalSeen = localStorage.getItem("anonymousModalSeen");
  if (isModalSeen) {
    overlay.style.display = "none";
  } else {
    overlay.style.display = "flex";
  }

  loadFromLocal();
});

const contactStep = document.querySelector(".contact-step");
outlineButton.addEventListener("click", () => {
  overlay.style.display = "none";
  k = 1;
  hideModalAndRemember();
  updateStepView();
});

let anonymous = false;
filledButton.addEventListener("click", () => {
  overlay.style.display = "none";
  k = 2;
  contact.classList.remove("show");
  contact.classList.add("hidden");
  occur.classList.add("show");
  occur.classList.remove("hidden");
  contactStep.style.display = "none";
  contact.parentNode.removeChild(contact);
  hideModalAndRemember();
  updateStepView();

  anonymous = true;

  exIcon.style.display = "none";
});

function hideModalAndRemember() {
  overlay.style.display = "none";
  localStorage.setItem("anonymousModalSeen", "true");
}

// Navigasiya
nextIcon.addEventListener("click", () => {
  if (
    (k === 1 && !validateStep1()) ||
    (k === 2 && !validateStep2()) ||
    (k === 3 && !validateStep3())
  ) {
    return;
  }

  k++;
  updateStepView();
});

exIcon.addEventListener("click", () => {
  k--;
  if (anonymous && k != 2) {
    updateStepView();
  }
  if (anonymous && k == 2) {
    exIcon.style.display = "none";
  }
});

// View dəyişdirici
function updateStepView() {
  [contact, occur, complaint, file].forEach((step, i) => {
    if (k === i + 1) {
      step.classList.add("show");
      step.classList.remove("hidden");
    } else {
      step.classList.remove("show");
      step.classList.add("hidden");
    }
  });

  if (k === 4) {
    nextIcon.style.display = "none";
    completeButton.classList.remove("disabled");
  } else {
    nextIcon.style.display = "flex";
    completeButton.classList.add("disabled");
  }

  exIcon.style.display = k === 1 ? "none" : "flex";
  addText.classList.toggle("hidden", k !== 2 && k !== 4);

  saveToLocal();
}

// Validasiya funksiyaları
function validateStep1() {
  let valid = true;

  const requiredFields = ["name", "surname", "mobile", "email"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    const value = input.value.trim();

    removeError(input); // əvvəlki errorları təmizlə

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

function isValidEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

function validateStep2() {
  let valid = true;
  const requiredFields = ["location", "date", "hour"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    if (!input.value.trim()) {
      showError(input, "Bu xana boş buraxıla bilməz");
      valid = false;
    }
  });
  return valid;
}

function validateStep3() {
  let valid = true;
  const requiredFields = ["complaintDetails", "people"];
  requiredFields.forEach((id) => {
    const input = document.getElementById(id);
    if (!input.value.trim()) {
      showError(input, "Bu xana boş buraxıla bilməz");
      valid = false;
    }
  });
  return valid;
}

// LocalStorage
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

  updateStepView();
}

// Input dəyişəndə yadda saxla
inputs.forEach((el) => {
  el.addEventListener("input", () => {
    saveToLocal();
    removeError(el);
  });
});

function showError(input, message) {
  removeError(input);

  input.classList.add(errorClass);

  const label = input.closest(".input-container")?.querySelector("label");
  const inlineError = label?.querySelector(".error-msg-inline");

  if (inlineError) {
    inlineError.textContent = message;
  }
}

function removeError(input) {
  input.classList.remove(errorClass);

  const label = input.closest(".input-container")?.querySelector("label");
  const inlineError = label?.querySelector(".error-msg-inline");

  if (inlineError) {
    inlineError.textContent = "";
  }
}

function addFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];
    currentFiles.push(file); // Fayl obyektini saxla
  }
  renderFileList();
}

document
  .querySelector(".complete-button")
  .addEventListener("click", async () => {
    if (k !== 4) return; // Yalnız son addımda icra olunsun

    // Validasiya
    if (!validateStep1() || !validateStep2() || !validateStep3()) {
      alert("Zəhmət olmasa bütün xanaları düzgün doldurun.");
      return;
    }

    const formData = new FormData();

    // Input-ları əlavə et
    inputs.forEach((input) => {
      if (input.id && input.value.trim()) {
        formData.append(input.id, input.value);
      }
    });

    // Faylları əlavə et (currentFiles içində File obyektləri saxlanılır)
    currentFiles.forEach((file, index) => {
      formData.append("files[]", file);
    });

    try {
      const response = await fetch("/api/complaint-submit", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.status === "ok") {
        alert("Şikayət uğurla göndərildi!");
        // Formu sıfırla
        localStorage.clear();
        window.location.reload();
      } else {
        alert("Xəta baş verdi: " + (data.message || "Naməlum xəta"));
      }
    } catch (error) {
      console.error("Serverə göndərərkən xəta:", error);
      alert("Server bağlantı xətası!");
    }
  });
