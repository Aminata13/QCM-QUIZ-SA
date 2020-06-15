<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des Questions</title>

  <link rel="stylesheet" href="public/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
  <h1 class="h3 mb-0 text-gray-800">Questions</h1>
  <div class="card question-card">
    <div class="card-body">
      <div class="nombre-questions">Nombre de questions/Jeu: </div>
      <form action="">
        <input type="text" name="nbrQuestions" id="" value="5">
        <button class="btn btn-primary btn-question" type="submit">OK</button>
      </form>
    </div>
  </div>
  <div class="card list-question-card shadow list-card mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Liste des Questions</h6>
    </div>
    <div id="card-body" class="card-body">
      <div class="question-title">1. Quels sont les langages du web?<i class="fa fa-edit fa-lg" aria-hidden="true"></i><i class="fa fa-trash fa-lg" aria-hidden="true"></i></div>
      <div class="answers-list">
        <div><i class="fa fa-check-square"></i>HTML</div>
        <div><i class="fa fa-square"></i>R</div>
        <div><i class="fa fa-check-square"></i>Java</div>
      </div>

      <div class="question-title">2. D'où vient le coronavirus?<i class="fa fa-edit fa-lg" data-toggle="modal" data-target="#editQuestionModal" aria-hidden="true"></i><i class="fa fa-trash fa-lg" data-toggle="modal" data-target="#deleteModal" aria-hidden="true"></i></div>
      <div class="answers-list">
        <div><i class="fa fa-circle"></i>Italie</div>
        <div><i class="fa fa-circle-o"></i>Chine</div>
      </div>

      <div class="question-title">3. Quel terme définit un langage qui s'adapte aussi bien sur Android que sur iOS?<i class="fa fa-edit fa-lg" aria-hidden="true"></i><i class="fa fa-trash fa-lg" aria-hidden="true"></i></div>
      <div class="answers-list">
        <input disabled type="text" name="" value="Hybride">
      </div>

      <div class="question-title">4. Quelle est la première école de codage gratuite au Sénégal?<i class="fa fa-edit fa-lg" aria-hidden="true"></i><i class="fa fa-trash fa-lg" aria-hidden="true"></i></div>
      <div class="answers-list">
        <div><i class="fa fa-circle"></i>Simplon</div>
        <div><i class="fa fa-circle-o"></i>Orange Digital Center</div>
      </div>

    </div>
  </div>

  <!-- edit question modal when the edit icon is clicked-->
  <div class="modal fade" id="editQuestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier Joueur</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div id="edit-text" class="modal-body">
          <form method="post" id="edit-form" action="javascript:void(0)" enctype="multipart/form-data" novalidate>
            <div class="form-group row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <input required type="text" name="surname" class="form-control form-control-user" id="surname" autocomplete="lastname" placeholder="Nom">
              </div>
              <div class="col-sm-6">
                <input required type="text" name="firstname" class="form-control form-control-user" id="firstname" autocomplete="firstname" placeholder="Prénom">
              </div>
            </div>
            <div class="form-group">
              <input required type="number" name="score" class="form-control form-control-user" id="score" autocomplete="score" placeholder="Score">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <button class="btn btn-warning" form="edit-form" type="submit">Mettre à jour</button>
        </div>
      </div>
    </div>
  </div>

  <!-- delete question modal when the trash icon is clicked -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Etes vous sûr de vouloir supprimer cette question? Cette action est irrévocable.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
          <button class="btn btn-danger">Supprimer</button>
        </div>
      </div>
    </div>
  </div>

  <script src="public/js/listQuestions.js"></script>
</body>

</html>