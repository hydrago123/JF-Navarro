// funciones para validacion en javascript con ventanas emergentes.
function isEmail(email) { //validacion de caractéres en el correo electronico.
    var regex = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
function login(){ //validacion del correo para logear 
    var email=$("#email").val();
    if(!isEmail(email)){
      alert("Ingrese un Email correcto")
     return false;
  }
  var pass=$("#pass").val(); //Validacion para la contraseña que debe tener mayor cantidad de 3 caractéres
  if(pass.length<4){
      alert("La contraseña debe tener mas de 3 caracteres");
      return false;
  }

}
$("#ingresar").on("click", function(event){//se crean los on click para que nos lleve a los formularios 
    //event.preventDefault() 
    login()
    $("#form-login").submit()
})
$("#registrar").on("click", function(event){
    //event.preventDefault() 
    login()
    $("#form-registro").submit()
})
