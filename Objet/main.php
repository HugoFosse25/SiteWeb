<html>
    <head>
    <title>Objet</title>
    </head>
    <body>
        <?php
            include 'Personnages.php';
            $pdo = new PDO('mysql:host=localhost;dbname=Personnages', 'root', 'root');
            $Perso1 = new Personnages();
            $Perso2 = new Personnages();
            $Perso1->SetNom("Hugo");
            echo $Perso1->GetNom();
        ?>
    </body>
</html>