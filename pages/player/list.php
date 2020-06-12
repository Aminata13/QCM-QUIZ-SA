<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Joeurs</title>

    
    <link rel="stylesheet" href="public/css/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
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
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Score</th>
                                    <th>Modifier</th>
                                    <th>Bloquer</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Score</th>
                                    <th>Modifier</th>
                                    <th>Bloquer</th> 
                                </tr>
                                </tfoot>
                                <tbody id="tbody">
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td class="center"><i class="fa fa-edit" aria-hidden="true"></td>
                                    <td class="center"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td class="center"><i class="fa fa-edit" data-toggle="modal" data-target="#editModal" aria-hidden="true"></td>
                                    <td class="center"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td class="center"><i class="fa fa-edit" aria-hidden="true"></td>
                                    <td class="center"><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <button type="button" class="btn btn-previous">Précédent</button>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <button type="button" class="btn btn-next">Suivant</button>
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
                    <div class="modal-body">
                        <form method="post" id="user_form" enctype="multipart/form-data">
                            <label>Enter First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" />
                            <br />
                            <label>Enter Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" />
                            <br/>
                            <label>Select User Image</label>
                            <input type="file" name="user_image" id="user_image" />
                            <span id="user_uploaded_image"></span>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="public/js/listPlayers.js"></script>
    
</body>
</html>