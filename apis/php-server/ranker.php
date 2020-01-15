<?//include_once("database.php")?>

<?

function calculateScores($ids, $distances){
    $scores = array();
    foreach ($distances as $key=>$value) {
        $setId = $ids[$key];
        $setVal = 0.4*($distances[$key]);
        $score = $setId*$setVal;
        //echo $setId."-".$setVal."-".($score)."<br>";
        array_push($scores,$score);
        
    }
    return $scores;
}

function getSortOrder($scores){
    $sortedOrder = array();
    $ordered_values = $scores;
    sort($ordered_values);
    foreach ($scores as $key => $value) {
        foreach ($ordered_values as $ordered_key => $ordered_value) {
            if ($value === $ordered_value) {
                $key = $ordered_key;
                break;
            }
        }
        array_push($sortedOrder,((int) $key + 1));
        //echo $value . '- Rank: ' . ((int) $key + 1) . '<br/>';
    }  
    return $sortedOrder;
}

function updateRankOnServer($ids, $ranks){
    include_once("database.php");
    foreach ($ranks as $key=>$value) {
        $setId = $ids[$key];
        $setVal = $ranks[$key];
        echo $setId.$setVal;
        $sql="update swift_booking set rank='$setVal' where bookingId='$setId'";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
    
    }
}

$ids= array(168,169);
$distances = array(80,30);

$scores = calculateScores($ids, $distances);
$ranks = getSortOrder($scores);
updateRankOnServer($ids, $ranks);

?>