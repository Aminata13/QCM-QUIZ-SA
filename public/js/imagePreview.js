const inpFile = document.getElementById("inpFile");
const avatar = document.getElementById("avatar");
const previewAvatar = avatar.querySelector(".img-preview");
inpFile.addEventListener("change", function () {
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.addEventListener("load", function () {
      previewAvatar.setAttribute("src", this.result);
    });
    reader.readAsDataURL(file);
    document.getElementById("upload-error").innerText = "";
  } else {
    previewAvatar.setAttribute("src", "public/img/img5.jpg");
    document.getElementById("upload-error").innerText =
      "*Veuillez choisir un avatar.";
  }
});
