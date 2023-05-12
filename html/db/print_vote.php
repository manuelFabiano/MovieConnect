<?
function print_vote($vote){
    $vote += 0;
    if ($vote > 7){
        $color = 'green';
    }elseif ($vote > 4){
        $color = 'orange'; 
    }else $color = 'red';
    return $color;    
}


?>