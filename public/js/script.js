const URL_ROOT = "index.php?action";
const $container = $("#container");
const $error_message = $("#error");

$error_message.hide();

//fonction pour la connexion
$("#login-form").submit((event)=>{ 
    event.preventDefault();
    let $form = $("#login-form")
    let url = $form.attr("action");
    
    //activation de la classe de validation de bootstrap
    $form.addClass("was-validated");
    
    //test pour savoir si oui ou non déclencher le traitement ajax
    let error = false;
    $('input').each(function () {
       if (!$(this).val()) {
         error = true;
       }  
    })

    //traitement AJAX
    if (!error) {
       $.post(url,  $form.serialize(), 
           function(data, status) {
                if (data.trim() != "error") {
                   window.location.replace(`${URL_ROOT}=${data}`)
                } else {
                  $error_message.show(); 
                  $('input').keyup(function () {
                     $error_message.hide();
                  })
                }
                                                                                             
           })
    }
});

//fonction pour afficher la page d'inscription
$("#signup").on("click",function(){
   $container.load(`${URL_ROOT}=signup`);
})

//naviguation au niveau du menu de la page admin
$(".nav-link").on("click",function(event){
   //Récuperation du lien sur lequel l'admin à cliquer
   let $lien_encour = $(this);
   
  //Récuperation de l'url sauvegarder dans l'attribut lien
   const url = $lien_encour.attr("href");
   
  //Récuperation de la partie droite de la page layout_admin.php      
   let $adminContainer = $("#admin-container"); 
   
   //Vider le contenu avant de Faire le Load
   $adminContainer.html("")
   $adminContainer.load(`${url}`);

})

