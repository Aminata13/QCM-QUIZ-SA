<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joeurs</title>

    
    <link rel="stylesheet" href="public/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <h1 class="h3 mb-0 text-gray-800">Joueurs</h1>
        <div class="card shadow list-card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Joueurs</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTable_length" id="dataTable_length">
                                    <label for="">
                                        Montrer
                                        <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm" id="">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                        </select>
                                        Joueurs
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered" id="dataTable" aria-describedby="liste des joueurs">
                                <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Bloquer</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Score</th>
                                    <th scope="col">Modifier</th>
                                    <th scope="col">Bloquer</th> 
                                </tr>
                                </tfoot>
                                <tbody id="tbody">
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <button id="previous" type="button" class="btn btn-previous">Précédent</button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button id="next" type="button" class="btn btn-next">Suivant</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <div class="modal fade" id="lockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <i class="fa fa-check-circle-o fa-3x" aria-hidden="true"></i>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div id="lock-text" class="modal-body"></div>
                </div>
            </div>
        </div>

        <script src="public/js/listPlayers.js"></script>
    
</body>
</html>