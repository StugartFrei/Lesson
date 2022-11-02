<?php
$array1 = array(1,3,5,7,9);
$array2 = array(2,4,6,8,10);
$array3 = array_merge($array1, $array2);
$element = 0;
for($i=0; $i < count($array3); $i++){
    for($j=0; $j < count($array3)-1; $j++){
        if($array3[$j]>$array3[$j+1]){
        $element = $array3[$j];    
        $array3[$j] = $array3[$j+1];
        $array3[$j+1] = $element;
        } 
     
    }
}
print_r ($array3);   

?>