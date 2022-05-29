//Funzione per vedere se le due password coincidono durante la registrazione di un nuovo utente "resource/views/auth/register"
window.onChangePassword = onChangePassword;

function onChangePassword() {
  const password = document.getElementById("password");
  const confirm = document.getElementById("password-confirm");
  

  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}

//Funzione per vedere se le due password coincidono durante la modifica dell'user "resource/views/user/edit"
window.onEditPass = onEditPass;

function onEditPass() {
  const password = document.getElementById("new_password");
  const confirm = document.getElementById("new_password_confirmation");
  

  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
}

//eliminazione dalla pagina  "resource/products/index" e "resource/clients/index"
window.btnDelete= btnDelete;

//funzione dalla quale ricavo l'id e la rotta poi lo passo nell'action del form dell'index
function btnDelete(id,route){
  document.getElementById("myForm").action = route + "/" + id;
}