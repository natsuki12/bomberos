<?php
    
    $error=0;
	if (isset($_POST["login"])) {
		$user=$_POST["user"];
		$pass=$_POST["password"];

		$sql="SELECT * FROM usuario WHERE nombre='$user'";
		$query=$bdd->prepare($sql);
		$query->bindValue(":user",$user);
		$query->execute();

		if ($query->rowCount()>0) {
			$datos=$query->fetch(PDO::FETCH_OBJ);

			if (password_verify($pass,$datos->password)) {
				session_start();
				$_SESSION["Nombre"]=$datos->nombre;
				$_SESSION["Nivel"]=$datos->nivel_usuario;
				if($_SESSION["Nivel"]!=3)
					header("location:home.php");
				else
					header("location:Adm_Bomberos/home.php");
			}else{
				$error=1;
			}

		}else{
			$error=1;
		}
	}
?>