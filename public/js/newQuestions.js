const $select = $("#question-type");
const $answersBlock = $("#answers-field");
const $questionForm = $("#create-question-form");
const $error = $("#create-question-error");

//display answer field depending on the selected option on the select
$select.on("change", function () {
  const selectedValue = $(this).val();

  if (selectedValue == "text") {
    $answersBlock.html("");
    $answersBlock.append(`
        <div id="textAnswer" class="form-group row">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Réponse</span>
                </div>
                <textarea required name="textAnswer" class="form-control" aria-label="With textarea"></textarea>
            </div>
        </div>
        `);
  } else {
    if (selectedValue == "simple") {
      $answersBlock.html("");
      $answersBlock.append(`
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Réponse 1</label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <input required type="text" name="simpleAnswer1" class="form-control" aria-label="Text input with radio">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="answer" value="simpleAnswer1" aria-label="radio for one of the answer" required> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                </div>
            </div>
        `);
    } else {
      if (selectedValue == "multiple") {
        $answersBlock.html("");
        $answersBlock.append(`
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">Réponse 1</label>
                    <div class="col-sm-9">
                        <div class="input-group mb-3">
                            <input required type="text" name="multipleAnswer1" class="form-control" aria-label="Text input with checkbox">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="checkbox1" value="multipleAnswer1" aria-label="checkbox for one of the answer" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
            `);
      }
    }
  }
});

var i = 1;
var j = 1;
//add fields when plus icon is clicked and type simple or multiple is is already selected
$("#add-field").on("click", function () {
  let selectedValue = $select.val();

  if (selectedValue == "simple") {
    i++;

    $answersBlock.append(`
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Réponse ${i}</label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="simpleAnswer${i}" aria-label="Text input with radio" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="answer" value="simpleAnswer${i}" aria-label="radio for one of the answer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <i class="fa fa-trash fa-2x delete" aria-hidden="true"></i>
                </div>
            </div>
        `);
  } else {
    if (selectedValue == "multiple") {
      j++;
      $answersBlock.append(`
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Réponse ${j}</label>
                <div class="col-sm-9">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="multipleAnswer${j}" aria-label="Text input with checkbox" required>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" name="checkbox${j}" value="multipleAnswer${j}" aria-label="checkbox for one of the answer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-1">
                    <i class="fa fa-trash fa-2x delete" aria-hidden="true"></i>
                </div>
            </div>
        `);
    }
  }
});

//delete field when trash icon is clicked
$answersBlock.on("click", ".delete", function () {
  let $toDelete = $(this).parent().parent();
  $toDelete.remove();
});

$questionForm.on("submit", function () {
  let selectedValue = $select.val();
  $questionForm.addClass("was-validated");

  //test pour savoir si oui ou non déclencher le traitement ajax
  var empty = false;
  $("input").each(function () {
    if (!$(this).val()) {
      empty = true;
    }
  });

  var error = false;
  if (!empty) {
    //radio button validations
    let radios = $('input[type="radio"]');
    if (selectedValue == "simple" && radios.length < 2) {
      error = true;
      $error.text("*Veuillez remplir au moins deux champs réponses.");
      setTimeout(function () {
        $error.html("");
      }, 3000);
    }

    let checkedRadio = $('input[type="radio"]:checked');
    if (selectedValue == "simple" && checkedRadio.length == 0) {
      error = true;
      $error.text("*Veuillez cocher la bonne réponse.");
      setTimeout(function () {
        $error.html("");
      }, 3000);
    }

    //checkbox input validations
    let checkbox = $('input[type="checkbox"]:checked');
    if (selectedValue == "multiple" && checkbox.length < 2) {
      error = true;
      $error.text("*Veuillez cocher 2 réponses au moins.");
      setTimeout(function () {
        $error.html("");
      }, 3000);
    }
  }

  if (!empty && !error) {
    $.ajax({
      url: "traitements/questionController.php",
      method: "POST",
      data: $questionForm.serialize(),
      success: function (data) {
        // $questionForm.removeClass("was-validated");
        $questionForm.each(function(){
          this.reset();
        });
        $("#questionModal").modal("toggle");
        setTimeout(function () {
          $("#questionModal").modal("hide");
        }, 2000);
      },
    });
  }
});
