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
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" aria-describedby="liste des joueurs">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Score</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Score</th>
                                    <th>Action</th> 
                                </tr>
                                </tfoot>
                                <tbody>
                                <tr>
                                    <td>Tiger Nixon</td>
                                    <td>System Architect</td>
                                    <td>Edinburgh</td>
                                    <td><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Garrett Winters</td>
                                    <td>Accountant</td>
                                    <td>Tokyo</td>
                                    <td><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                <tr>
                                    <td>Ashton Cox</td>
                                    <td>Junior Technical Author</td>
                                    <td>San Francisco</td>
                                    <td><i class="fa fa-lock" aria-hidden="true"></i></td>
                                </tr>
                                </tbody>
                            </table>
                        </>
                        <div class="row">
                            Précédent
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</body>
</html>