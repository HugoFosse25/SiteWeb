<?php
session_start();
if(isset($_SESSION["TempsDépart"])){

}else{
	echo "Le minuteur vient d'être initialisé";
	$_SESSION["TempsDépart"]=null;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Juste Prix</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css'  href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <h1>Juste Prix</h1>
    <?php
			
	if(isset($_SESSION['Record']))
	{
		echo "<p>Votre record est : " .$_SESSION['Record']." Essai</p>";
	}else
	{
		echo "<p>vous n'avez pas de record</p>";
	}
	if(isset($_SESSION['MavariableAleatoire']))
	{
		$_SESSION['MavariableAleatoire'];
	}
	else
	{
        echo "<p>Le juste prix n'existe pas, il vient d'être initialisé</p>";
		$_SESSION['MavariableAleatoire']  =rand(0,1000);
		$_SESSION['Essais']=0;
		
    }
	$close=0;
    ?>
    <form action="" method="POST">
			<label for="name">Rentre un chiffre aléatoire</label>

			<input type="text" id="Chiffre" name="LeChiffre" required
				    size="10" autofocus>
			<input type="submit" value="Valider">
	</form>
	<p>Voulez vous rénitialiser le record ?</p>
	<form action="" method="POST">
		<input type="submit" value="Oui" name="ReloadRecord">
	</form>
	<?php
		if(isset($_POST["ReloadRecord"]))
		{
			session_unset();
			session_destroy();
		}else{
			if(isset($_POST["LeChiffre"])){
				if($_SESSION["TempsDépart"]==null){
					$_SESSION["TempsDépart"]=new  DateTime(date('H:i:s'));
				}

				$_SESSION['Essais']++;
				if($_POST["LeChiffre"]>$_SESSION['MavariableAleatoire']){
				   echo "C'est moins!"; 
				}
	
				if($_POST["LeChiffre"]<$_SESSION['MavariableAleatoire']){
					echo "C'est plus!"; 
				}
	
				if($_POST["LeChiffre"]==$_SESSION['MavariableAleatoire']){
					echo "<p>C'est gagné!</p>";
					echo "<p>Le nombre est  " .$_SESSION['MavariableAleatoire']." Bravo !</p>";
					echo "<p>Vous avez trouver le nombre en " .$_SESSION['Essais']." essais";
					$close=1; 
				}
			}
			
			if($close==1){
				echo "<p>C'est repartie!</p>";
				
				$TempsFin=new  DateTime(date('H:i:s'));
				$origin = $_SESSION["TempsDépart"];
				$target =$TempsFin;
				$interval = date_diff($origin, $target);
				echo "<p></p>Vous avez trouvé en ".$interval->format('%i Minutes et %s secondes');
				if( !isset($_SESSION['Record']) || $_SESSION['Essais']<$_SESSION['Record'] )
				{
					$_SESSION['Record']=$_SESSION['Essais'];
				}
				$_SESSION['MavariableAleatoire'] =rand(0,1000);
				$_SESSION['Essais']=0;
				$_SESSION["TempsDépart"]=null;
				
			}
				
				
				
				
		}
		
        
	?>
    </div>
</body>