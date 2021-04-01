<html>
    <head>

    </head>
    <body>
        <?php
            if(isset($_POST["nbm_mots"])){
                include "fonction.php";
                for($i=0;$i<$_POST["nbm_mots"];$i++){
                    echo Generatenom();
                    ?>
                    <p></p>
                    <?php
                }  
            }else{
                ?>
                <form method="POST">
                <input type="text" id="nb_mots" name="nbm_mots">Combien de mots voulez vous ?</input>
                </form>
                <?php
            }
        ?>
    </body>
</html>
