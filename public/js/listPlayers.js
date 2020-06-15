const $tbody = $("#tbody");
console.log("hello");

$(document).ready(function () {
  let offset = 0;

  //affichage des joueurs dès le chargement de la page
  $.ajax({
    url: "traitements/playerController.php",
    method: "POST",
    data: { limit: 3, offset: offset },
    dataType: "json",
    success: function (data) {
      $tbody.html("");
      printData(data, $tbody);
      offset += 3;
    },
  });

  //chargement des joueurs au clic du bouton suivant
  $("#next").on("click", function () {
    $.ajax({
      url: "traitements/playerController.php",
      method: "POST",
      data: { limit: 3, offset: offset },
      dataType: "json",
      success: function (data) {
        $tbody.html("");
        printData(data, $tbody);
        offset += 3;
      },
    });
  });
  //chargement des joueurs au clic du bouton précédent
  $("#previous").on("click", function () {
    if (offset != 0) {
      offset -= 3;
    }
    $.ajax({
      url: "traitements/playerController.php",
      method: "POST",
      data: { limit: 3, offset: offset },
      dataType: "json",
      success: function (data) {
        $tbody.html("");
        printData(data, $tbody);
        if (offset != 0) {
          offset -= 3;
        }
      },
    });
  });

  //traitement pour la suppression lorsque l'icon verrou est cliqué
  $tbody.on("click", ".lock", function () {
    let $td = $(this);
    let user_id = $td.parent().attr("id");
    var blocked;
    console.log($(this));

    //verfication pour voir si le joueur doit être au bloqué ou débloqué au clic
    if ($td.hasClass("blocked")) {
      blocked = true;
    } else {
      blocked = false;
    }
    console.log(blocked);

    //traitement AJAX pour bloquer ou débloquer le joueur en fonction du statut actuel du joueur
    $.ajax({
      url: "traitements/playerController.php",
      method: "POST",
      data: { id: user_id, blocked: blocked },
      success: function (data) {
        console.log(data);
        if (blocked) {
          $td.html(
            '<td class="center lock"><i class="fa fa-unlock" aria-hidden="true"></i></td>'
          );
          $("#lock-text").text("Joueur débloqué avec succès !");
          $("#lockModal").modal("toggle");
          setTimeout(function () {
            $("#lockModal").modal("hide");
          }, 2000);
        } else {
          $td.html("");
          $td.html(
            '<td class="center lock blocked"><i class="fa fa-lock" aria-hidden="true"></i></td>'
          );
          $("#lock-text").text("Joueur bloqué avec succès !");
          $("#lockModal").modal("toggle");
          setTimeout(function () {
            $("#lockModal").modal("hide");
          }, 2000);
        }
      },
    });
  });

  $tbody.on("click", ".edit", function () {
    let $td = $(this);
    let user_id = $td.parent().attr("id");

    //traitement au submit du form se trouvant dans le modal
    $("#edit-form").on("submit", function (event) {
      let $editForm = $("#edit-form");
      $editForm.addClass("was-validated");

      console.log($td);
      var surname = $("#surname").val();
      var firstname = $("#firstname").val();
      var score = $("#score").val();

      //test pour savoir si oui ou non déclencher le traitement ajax
      let error = false;
      $("input").each(function () {
        if (!$(this).val()) {
          error = true;
        }
      });

      if (!error) {
        let formData = new FormData();
        formData.append("id", user_id);
        formData.append("surname", surname);
        formData.append("firstname", firstname);
        formData.append("score", score);

        $.ajax({
          url: "traitements/playerController.php",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (data) {
            console.log(data);
            $("#edit-text").text("Mise à jour effectué avec succès !");
            setTimeout(function () {
              $("#editModal").modal("hide");
            }, 2000);
          },
        });
      }
    });
  });
});

//add row for players fetched from DB
function printData(data, tbody) {
  $.each(data, function (indice, player) {
    if (player.status == 0) {
      tbody.append(`
            <tr id="${player.id}">
                <td>${player.surname}</td>
                <td>${player.firstname}</td>
                <td>${player.score}</td>
                <td class="center edit"><i class="fa fa-edit" data-toggle="modal" data-target="#editModal" aria-hidden="true"></td>
                <td class="center lock blocked"><i class="fa fa-lock" aria-hidden="true"></i></td>
            </tr>
            `);
    } else {
      tbody.append(`
            <tr id="${player.id}">
                <td>${player.surname}</td>
                <td>${player.firstname}</td>
                <td>${player.score}</td>
                <td class="center edit"><i class="fa fa-edit" data-toggle="modal" data-target="#editModal" aria-hidden="true"></td>
                <td class="center lock"><i class="fa fa-unlock" aria-hidden="true"></i></td>
            </tr>
            `);
    }
  });
}
