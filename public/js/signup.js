let $error_message1 = $("#signup-error");


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

  if (!error && password !== confirmPassword) {
    $error_message1.text("*Les deux mots de passe ne correspondent pas.");
  } else {
    if (!error) {
      $.ajax({
        url: "traitements/setUser.php",
        method: "POST",
        data: formData,
        processData: false,
        dataType: "script",
        contentType: false,
      }).done(function (data) {
        if (data.trim() == "ok") {
          window.location.replace("index.php");
        } else {
          $error_message1.text(data); //rajouter un timeout
        }
      });
    }
  }
});
