<?php include('../includes/conexion.php');
//Sentencia SQL para buscar un usuario con esos datos 
$usuario = $_POST['usuario'];
$pass= $_POST['pass'];
$sql = "select * from operador where trim(codoperador)='".$usuario."' and trim(clave)='".$pass."'";
//Ejecuto la sentencia 
$result = mysql_query($sql,$link); 
//vemos si el usuario y contrase�a es v�ildo 
//si la ejecuci�n de la sentencia SQL nos da alg�n resultado 
//es que si que existe esa conbinaci�n usuario/contrase�a 
if (mysql_num_rows($result)!=0){ 
    //usuario y contrase�a v�lidos 
    //defino una sesion y guardo datos 
    $row = mysql_fetch_array($result);
    session_start(); 
	$_SESSION['USUARIO']=$usuario;
	$_SESSION['NOMBRE']=$row["nombre"];
	$_SESSION['AGENCIA']=$row["agencia"];
	$_SESSION['NOMBREAGENCIA']=$row["nombreagencia"];
    session_register("autentificado"); 
    $autentificado = "SI"; 
	header ("Location: ../modulos/home.php"); 
	
}else { 
   header("Location: ../Listados.php?errorusuario=si"); 
} 
mysql_free_result($result); 
mysql_close($link); ?> 