<?php
function Generatenom(){
    $NomPropre="";
    $Syllabe=array('ma','ta','sa','son','pa','ni','no');
    $TailleTableau=count($Syllabe);
    $NbSyllabes=rand(2,5);
    $verify="";
    for($i=0;$i<$NbSyllabes;$i++){
        $toto =$Syllabe[rand(0,$TailleTableau-1)];
        if($verify!=$toto){
            $verify=$toto;
            $NomPropre=$NomPropre.$toto;
        }else{
            $i--;
        }
    }
    return  $NomPropre;
}