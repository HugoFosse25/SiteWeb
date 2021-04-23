<html>
    <head>
    <title>Objet</title>
    </head>
    <body>
        <?php
            include 'Personnage.php';
            $pdo = new PDO('mysql:host=localhost;dbname=Personnages', 'root', 'root');
            $Perso1 = new Personnage(1 ,$pdo);
            $Perso2 = new Personnage(2 ,$pdo);
            $Perso1->PresenteToi();
            $Perso2->PresenteToi();
        ?>
    </body>
</html>