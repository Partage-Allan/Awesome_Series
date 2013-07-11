function verifMail() 
{
    var email = document.getElementById('email');
    var emailConfirm = document.getElementById('confirmemail');
    if (email.value !== emailConfirm.value)
        emailConfirm.setCustomValidity('Les adresses mail ne correspondent pas.');
    else
        emailConfirm.setCustomValidity('');
}

function verifPass() 
{
    var pass = document.getElementById('password');
    var passConfirm = document.getElementById('confirmpassword');
    if (pass.value !== passConfirm.value)
        passConfirm.setCustomValidity('Les mots de passe de correspondent pas.');
    else
        passConfirm.setCustomValidity('');
}

function login()
{
    window.location = 'login.php';
}

function recupererVariableUrl(GetVoulu, default_)
{
  if (default_== null) default_= "";
  GetVoulu = GetVoulu.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&]"+GetVoulu+"=([^&#]*)");
  var result = regex.exec(window.location.href);
  if(result == null)
    return default_;
  else
    return result[1];
}

function setTagg()
{
    var serie = recupererVariableUrl('serie');
    window.location = 'fiche_serie.php?serie=' + serie + '&tagg=true';
}

