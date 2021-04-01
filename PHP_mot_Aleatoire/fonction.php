<?php
function Generatenom(){
    $NomPropre="";
    $Syllabe=array('ba','ca','da','fa','ga','ja','la','ma','na','pa','ra','sa','ta','va','za','bra','cra','dra','fra','gra','pra','tra','vra','bla','cla','fla','gla','pla','cha','be','de','fe','je','le','me','ne','pe','re','se','te','ve','ze','bre','cre','dre','fre','gre','pre','tre','vre','ble','cle','fle','gle','ple','che','bé','bè','dé','dè','fé','fè','vé','fré','plé','bi','ci','di','fi','gi','gri','fri','bru','crou','brou','brin','foi','doi','choi');
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