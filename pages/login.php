<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>

</head>
<body>

<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-10 col-lg-12 col-md-9">

  <div class="card border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image">
            <div class="slogan">Le Plaisir de Jouer</div>
        </div>
        <div class="col-lg-6">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Se connecter</h1>
            </div>
            <form method="POST" id="login-form" action="index.php?action=login" class="user needs-validation" novalidate>
              <div class="form-group">
                <input required name="username" type="text" class="form-control form-control-user" id="exampleInputText" autocomplete="username" placeholder="Nom d'utilisateur">
                <div class="invalid-feedback">Champ obligatoire.</div>
              </div>
              <div class="form-group">
                <input required name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" autocomplete="current-password" placeholder="Mot de Passe">
                <div class="invalid-feedback">Champ obligatoire.</div>
              </div>
              <button type="submit" name="login" value="Connexion" class="btn btn-primary btn-user btn-block">Login</button>
            </form>
            <hr>
            <div class="text-center">
              <a id="signup" class="small" href="#">S'inscrire pour jouer?</a>
            </div>
          </div>
          <div id="error">*Login ou mot de passe incorrect. Veuillez réessayer.</div>
        </div>
      </div>
    </div>
  </div>

</div>
</div>


</body>
</html>