
<?php 
include './includes/templades/headerlogin.php';
require 'includes/templades/config/database.php';
?>


<?php  
	$error = [];

	if (isset($_SESSION)) {
		header('Location: usuario.php');
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// echo"</pre>";
		// var_dump($_POST);
		// echo"</pre>";

		$user = $_POST['usearname'];
		$pass = $_POST['password'];

		//

		if(!$user){
            $error[] = "The username is necessary for Log In";
        }
        if(!$pass){
            $error[] = "The password is necessary for Log In";
        }

		if(empty($error)){
            $query = "SELECT * FROM register WHERE usearname='$user'";
            $userData = mysqli_query(getConnection(), $query);
        }
		

		//die('Hello');
		if($userData->num_rows){
			//rewiev if the password is correctly
			$usuario = mysqli_fetch_array($userData, MYSQLI_ASSOC);

			//verificate if the password is correctly 
			

			$auth = password_verify($pass,$usuario['password']);
			//echo"<pre>";
			// var_dump($auth);
			//echo"</pre>";

			if($auth){
				session_start();
				
				$_SESSION['login']=true;
			
				header('Location: admin/propiedad/create.php');
			}else{
				$error[]= 'Invalid password ';	
			}
		}else{
			$error[]='the user doesn`t exist';	
		}

	}

?>

<div class="columna2">
	<form method="post">
			<fieldset class="cuadricula">
				<legend class="letra"><a>
					<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
						<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
						<line x1="10" y1="14" x2="21" y2="3" />
						<path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
					</svg><span class="nombrepagina">MiNameIsTravel!</span>
				</a></legend>
				<section class="logincuadrado">
					<div>
						<input class="type" type="text" placeholder="User Name" name="usearname" >
					</div>
							
					<div>
						<input class="type" type="password" placeholder="Password" name="password" >    
					</div>

					<div class="colorerror">
                     <?php foreach($error as $faltante){
                    echo $faltante ."<br />";  
                        }
                    ?>  
                    </div>
							
					<div>
						<input class="typebuttom botonregistro" type="submit" value="Log In">						
					<div>
								
					<hr size="0.5px" color="#e6e6e6">

					<div>
						<p class="textoregistro"> Don't have an account? <a href = "registro.php">Sing up now.</a></p>						
					<div>
				</section>
							
		</fieldset>
	</form>

</div>
	
<?php 
include './includes/templades/footers.php' 
?>
	
</body>
</html>

