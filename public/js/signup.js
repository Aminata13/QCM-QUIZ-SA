const $error_message1 = $("#signup-error");
const idContainer = $("#signup-card").parent().attr("id");

if (idContainer == "admin-container") {
  $(".avatar-legend").text("Avatar Admin");
  $(".login-link").hide();
} else {
  $("#title").hide();
}

//fonction pour gérer l'inscription d'un joueur
$("#signup-form").on("submit", function (event) {
  event.preventDefault();

  //activation de la classe de validation de bootstrap
  $("#signup-form").addClass("was-validated");

  //test pour savoir si oui ou non déclencher le traitement ajax
  let error = false;
  $("input").each(function () {
    if (!$(this).val()) {
      error = true;
    }
  });

  //traitement AJAX pour enregistrer un utilisateur
  var profil;
  if (idContainer == "container") {
    profil = 'player';
  } else {
    profil = 'admin';
  }
  let login = $("#login").val();
  let password = $("#password").val();
  let confirmPassword = $("#confirmPassword").val();
  let surname = $("#surname").val();
  let firstname = $("#firstname").val();
  let file_data = $("#inpFile").prop("files")[0];

  let formData = new FormData();
  formData.append("file", file_data);
  formData.append("username", login);
  formData.append("password", password);
  formData.append("confirmPassword", confirmPassword);
  formData.append("surname", surname);
  formData.append("firstname", firstname);
  formData.append("profil", profil);

  if (!error && password !== confirmPassword) {
    setTimeout(function () {
      $error_message1.text("*Les deux mots de passe ne correspondent pas.");
    }, 3000);
  } else {
    if (!error) {
      $.ajax({
        url: "traitements/setUser.php",
        method: "POST",
        data: formData,
        processData: false,
        dataType: "text",
        contentType: false,
        success: function (data) {
          if (data.trim() == "correct") {
            if (idContainer == "container") {
              $("#success-text").text("Inscription réalisée avec succès! Vous allez être redirigé vers la page de connexion.");
              $("#signupModal").modal("toggle");
              setTimeout(function () {
                window.location.replace("index.php");
              }, 5000);
            } else {
              $("#success-text").text("Admin enregistré avec succès!");
              $("#signupModal").modal("toggle");
              setTimeout(function () {
                $("#signupModal").modal('hide');
              }, 4000);
            }
          } else {
            $error_message1.text(data);
            // setTimeout(function () {
            //   $error_message1.hide();
            // }, 3000);
          }
        }
      });
    }
  }
});
