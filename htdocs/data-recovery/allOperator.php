<?php




$allOperator = $Operatormanager->getAllOperator();

foreach($allOperator as $operator){
    echo '</br>'.$operator->getName();
    echo '</br>'.$operator->getGrade();
    echo '</br>'.$operator->getLink();
    if($operator->getIs_premium()=== false){
        echo '</br>This Operator is not Premium ';
    }else{
        echo '</br>This Operator is Premium ';
    }
}