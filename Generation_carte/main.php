<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Map</title>
    <meta name="Description" content="Génération d'une carte HTML aléatoire" />
    <link href="main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <?php
    if(isset($_POST["Generate"]) || isset($_POST["ReGenerate"])){
        for($i=0;$i<10;$i++){

            for($j=0;$j<10;$j++){

                $Map[$i][$j]=rand(0,1);
            }
        }
        for($i=0;$i<10;$i++){

            for($j=0;$j<10;$j++){
                
                if($Map[$i][$j]==0){
                    ?>
                        <div class="Map0">
                            <?php
                                echo $Map[$i][$j];
                            ?>
                        </div>
                    <?php
                }else{
                    ?>
                        <div class="Map1">
                            <?php
                                echo $Map[$i][$j];
                            ?>
                        </div>
                    <?php
                }
                
            }
        }
        ?>
        <form method="POST">
            <input type="submit" value="Recharger la carte" id="ButtonForReGenerate" name="ReGenerate"></input>
        </form>
        <?php
    }else{
        ?>
            <div class="Generate">
                <form method="POST">
                    <input type="submit" id="ButtonForGenerate" name="Generate" value="Générer la carte"></input>
                </form>
            </div>
        <?php
    }
    ?>
    </body>
</html>