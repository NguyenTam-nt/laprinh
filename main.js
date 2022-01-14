function handleNavLink() {
  const nav_link = document.querySelectorAll("ul li");

  const params = window.location.href.split("/")[4];
  nav_link.forEach((link) => {
    if (`${link.innerText.toLowerCase()}.php` === params) {
      link.classList.add("active");
    }
  });
}

handleNavLink();
let currenId = -1;

const deleteUser = (id) => {
  const modal = document.querySelector(".modal_handle_contact");
  const dialog = document.querySelector(".dialog_handle");
  modal.style.display = "block";
  dialog.style.display = "block";
  dialog.style.animation = "sliderIn linear 0.2s";
  document.body.style.overflow = "hidden";
  currenId = id;
};

const deleteNews = (id) => {
  const modal = document.querySelector(".modal_handle_contact");
  const dialog = document.querySelector(".dialog_handle");
  modal.style.display = "block";
  dialog.style.display = "block";
  dialog.style.animation = "sliderIn linear 0.2s";
  document.body.style.overflow = "hidden";
  currenId = id;
};

const closeDialog = () => {
  const modal = document.querySelector(".modal_handle_contact");
  const dialog = document.querySelector(".dialog_handle");
  modal.style.display = "none";
  dialog.style.animation = "sliderOut linear 0.2s forwards";
  document.body.style.overflow = "auto";
  setTimeout(() => {
    dialog.style.display = "none";
  }, 200);
};

const excute = () => {
  const xml = new XMLHttpRequest();
  xml.onreadystatechange = () => {
    if (xml.readyState === 4 && xml.status === 200) {
      const data = JSON.parse(xml.responseText);

      if (data.status === "ok") {
        document.querySelector(`#row_${data._id}`).remove();
        closeDialog();
      }
    }
  };
  xml.open("GET", `http://localhost:81/zerotype01/delete.php?_id=${currenId}`);
  xml.send();
};

const excuteNews = () => {
  const xml = new XMLHttpRequest();
  xml.onreadystatechange = () => {
    if (xml.readyState === 4 && xml.status === 200) {
      const data = JSON.parse(xml.responseText);

      if (data.status === "ok") {
        document.querySelector(`#row_${data._id}`).remove();
        closeDialog();
      }
    }
  };
  xml.open(
    "GET",
    `http://localhost:81/zerotype01/deleteNew.php?_id=${currenId}`
  );
  xml.send();
};

const email = document.getElementById("email");

const listenMethod = (e) => {
  let msg = document.querySelector(".msg");
  let value = e.target.value;
  const xlm = new XMLHttpRequest();
  xlm.onreadystatechange = () => {
    if (xlm.readyState === 4 && xlm.status === 200) {
      const text = JSON.parse(xlm.responseText);
      if (text.status === true) {
        msg.innerText = "Email này đã được đăng ký, vui lòng nhập lại...";
      }
    }
  };
  xlm.open(
    "GET",
    `http://localhost:81/zerotype01/handleEmail.php?email=${value}`
  );
  xlm.send();
};

email.addEventListener("blur", listenMethod);
