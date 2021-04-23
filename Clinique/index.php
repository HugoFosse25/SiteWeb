<!DOCTYPE html>
<html>
<?php
$maBase=new PDO('mysql:host=192.168.64.196; dbname=Clinique; charset=utf8','Site','Site');
?>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Clinique</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css'  href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<!--Test -->
    <header>
        <h1>Polyclinique Médicale</h1>
    </header>
    <form action="" method="POST" class="form-example">
        <div class="form-example">
        <label for="prenom">Entrez l'identifiant du Médecin: 
            </label>
            <input type="text" name="id" id="id" required>
        </div>
        <div class="form-example">
            <label for="prenom">Entrez le nom du Médecin: 
            </label>
            <input type="text" name="nom" id="nom" required>
         </div>
         <div class="form-example">
            <label for="prenom">Entrez le prénom du Médecin:
            </label>
            <input type="text" name="prenom" id="prenom" required>
         </div>
        <div class="form-example">
            <input type="submit" value="Valider">
        </div>
    </form>
    <?php
        if(isset($_GET["delete"])){
            $sqldelete = 'DELETE FROM `Medecin` WHERE id='.$_GET["hidedelete"];
            $deleteMedecin=$maBase->query($sqldelete);
        }
        
        if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["id"])){
            $sql  = 'INSERT INTO `Medecin`(`id`, `nom`, `prenom`) VALUES ("'.$_POST["id"].'","'.$_POST["nom"].'","'.$_POST["prenom"].'")';
            $NouveauMedecin=$maBase->query($sql);
        }
        if(isset($_GET["changements"])){
            $sqlmodify  = "UPDATE `Medecin` SET `nom`='".$_GET["firstnamechange"]."' ,`prenom`='".$_GET["lastnamechange"]."' WHERE id =".$_GET["hidemodifyChangement"];
            $modifyMedecin=$maBase->query($sqlmodify);
        }
    ?>
     <form  action="" method="GET">
    <table>
        <thead>
            <tr>
                <th colspan="4">Médecins</th>
            </tr>
        </thead>
        <tbody>
             <tr>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Supprimer un Médecin</td>
                <td>Modifier les valeurs</td>
            </tr>
            
        <?php 
            $sqlmédecins  = 'SELECT * FROM `Medecin` WHERE 1';
            $LesDonneesMédecins= $maBase->query($sqlmédecins);
            
            while($TableauMédecins=$LesDonneesMédecins->fetch()){
                echo "<tr>";
                if((isset($_GET["modify"])) && ($_GET["hidemodify"]==$TableauMédecins["id"]) ){
                    
                        ?> 
                        <form  action="" method="GET">
                            <td>
                                
                                    <input type="text" name="firstnamechange" value="<?php echo $TableauMédecins["nom"]; ?>">
                            </td>
                            <td>
                                    <input type="text" name="lastnamechange" value="<?php echo $TableauMédecins["prenom"]; ?>">
                                
                            </td>
                            <td>
                        
                                <input type="submit" value="Valider les changements" name="changements">
                                <input type="hidden" id="modify" name="hidemodifyChangement" value="<?php echo $TableauMédecins["id"]?>"/>
                            
                            </td>

                        </form>
                        
                        <?php
                    
                }else{
                    echo "<td>".$TableauMédecins["nom"]."</td>";
                    echo "<td>".$TableauMédecins["prenom"]."</td>";
                }
                 ?>
                <td>
               
                    <div>
                        <input type="hidden" id="delete" name="hidedelete" value="<?php echo $TableauMédecins["id"]?>"/>
                        <input type="submit" name="delete" value="Supprimer"/>
                    </div>
                
                </td>
                <?php
                if(isset($_GET["modify"])){

                }else{
                    ?>
                    <td>
                    <form  action="" method="GET">
                        <div>
                            <input type="hidden" id="modify" name="hidemodify" value="<?php echo $TableauMédecins["id"]?>"/>
                            <input type="submit" name="modify" value="Modifier"/>
                        </div>
                    </form>
                    
                    </td>
                    </tr>
                    <?php
                }  
            }
            
            
                ?>
        </tbody>
    </table>
    </form>
</body>
</html>