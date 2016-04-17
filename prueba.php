<html>
<head>
<script type="text/javascript">
var varedit=0;
function edit(){
	if (varedit==1){
		document.user.name.disabled=true;
		document.user.surname.disabled=true;
		document.user.email.disabled=true;
		document.user.pass.disabled=true;
		document.user.submit.style.visibility="hidden";
		document.user.cancel.style.visibility="hidden";
		varedit=0;
	}else{
		document.user.name.disabled=false;
		document.user.surname.disabled=false;
		document.user.email.disabled=false;
		document.user.pass.disabled=false;
		document.user.submit.style.visibility="visible";
		document.user.cancel.style.visibility="visible";
		
		varedit=1;
	}

}
function hide()
{
		document.user.submit.style.visibility="hidden";
		document.user.cancel.style.visibility="hidden";
}
</script>
</head>
<body onload="hide()">

prueba

<form name="user" action="update.php" method="post">
	<input name="name" type="text" placeholder="Nombre" disabled />
	<input name="surname" type="text" placeholder="Apellidos" disabled />
	<input name="email" type="email" placeholder="Direccion Email" disabled />
	<input name="pass" type="password" placeholder="Contraseña" disabled />
	<button type="submit" name="submit" >Save</button>
	<button type="button" name="cancel" onclick="cancel()" >Cancel</button>
</form>
<input name="edit" type="label" value="Editar" OnClick="edit()"/>

					
							
							
							
</body>
</html>