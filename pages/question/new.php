<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer Questions</title>
</head>

<body>
    <h1 class="h3 mb-0 text-gray-800">Création de Question</h1>
    <div class="card shadow list-card mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Paramétrer une question</h6>
        </div>
        <div class="card-body">
            <form id="create-question-form" method="POST" class="needs-validation" action="javascript:void(0)" novalidate>
                <div class="form-group row">
                    <label for="inputQuestion" class="col-sm-2 col-form-label" data-toggle="modal" data-target="#questionModal">Question</label>
                    <div class="col-sm-10">
                        <input required type="text" name="question" class="form-control" id="inputQuestion" placeholder="Question">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPoints" class="col-sm-2 col-form-label">Nombre de points</label>
                    <div class="col-sm-10">
                        <input required type="number" name="point" class="form-control" id="inputPoints" placeholder="Point">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputType" class="col-sm-2 col-form-label">Type de question</label>
                    <div class="col-sm-9">
                        <select required id="question-type" name="type" class="custom-select">
                            <option value="">Donnez le type de réponse</option>
                            <option value="text">Texte</option>
                            <option value="simple">Simple</option>
                            <option value="multiple">Multiple</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        <i id="add-field" class="fa fa-plus-square fa-2x" aria-hidden="true"></i>
                    </div>
                </div>
                <div id="answers-field">

                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </div>
            </form>
            <div id="create-question-error"></div>
        </div>
    </div>

    <div class="modal fade text-center" id="questionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-check-circle-o fa-3x" aria-hidden="true"></i>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div id="" class="modal-body">Question enregistrée avec succès!</div>
            </div>
        </div>
    </div>


    <script src="public/js/newQuestions.js"></script>
</body>

</html>