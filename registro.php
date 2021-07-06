
<?php 

include './includes/templades/header_register.php';
require 'includes/templades/config/database.php';

?>

<?php 

$error =[]; //tengo que validar el usuario 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $namenew = $_POST['namenew'];
    $surname = $_POST['surname'];
    $usearname = $_POST['usearname'];
    $password = $_POST['password'];
    
    $pass_crypt = password_hash($password,PASSWORD_DEFAULT);
    //insert into the database 
  
    
   
        if(!$namenew){
            $error[] = "The name is necessary";
        }
        if(!$surname){
            $error[] = "The surname is necessary";
        }
        if(!$usearname){
            $error[] = "The username is necessary";
        }
        if(!$password){
            $error[] = "The password is necessary for most segurity";
        }

        if(empty($error)){
            $query = "INSERT INTO register (namenew, surname, usearname, password) VALUES ('$namenew','$surname','$usearname','$pass_crypt')";
            $resultateregist = mysqli_query(getConnection(), $query);
        }
        
    }

  ?>


        <form class="columna2" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <fieldset class="cuadricula">
                <legend>
                    <a>
						<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
							<line x1="10" y1="14" x2="21" y2="3" />
							<path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
						  </svg><span class="nombrepagina">MiNameIsTravel!</span>

					</a>
                </legend>

                <section class="logincuadrado">
                    <div>
                        <h1>
                            Create a new account

                        </h1>
                        <h2>
                            It's quick and easy.
                        </h2>
                            
                    </div>
                    <div>
                        <input class="type" type="text" placeholder="Your Name" name="namenew" >
                    </div>
                        
                    <div>
                        <input class="type" type="text" placeholder="Your surname" name="surname">    
                     </div>
                        
                    <div>
                        <input class="type" type="text" placeholder="Username" name="usearname">  			
                    </div>

                    <div>
                        <input class="type" type="password" placeholder="Password" name="password">  			
                    </div>

                    <div>
                        <input class="type" type="password" placeholder="Confirm password" >  			
                    </div>
                    
                    <div class="colorerror">
                        <?php foreach($error as $faltante){
                             echo $faltante ."<br />";  
                        }
                        ?>  
                    </div>


                    <div>
                        <input class="typebuttom  botonregistro" type="submit" value=" Register">						
                    </div>

                    <div>
							<p class="textoregistro"> Already have account?  <a href = "login.php">Login here.</a></p>						
					<div>
                </section>
            </fieldset>
        </form>

    <?php 
	include './includes/templades/footers.php' 
	?>
	
    </body>

</html>