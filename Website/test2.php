<?require "global.php";

$mapPoints = array();
$query_mapPoints = "select * from swift_mapPoints"; 
$result_mapPoints = $con->query($query_mapPoints); 
if ($result_mapPoints->num_rows > 0)
{ 
    while($row = $result_mapPoints->fetch_assoc()) 
    {
        $mapPoint ="";
        $mapPoint->name = $row['name'];
        $mapPoint->position->lat = $row['lat'];
        $mapPoint->position->lng = $row['lng'];
        //echo json_encode($mapPoint);
        array_push($mapPoints,$mapPoint);
    }
}
$myJSON = json_encode($mapPoints);
echo $myJSON;

?>
<script>
    console.log("$myJSON", JSON.parse(JSON.stringify(<?echo $myJSON?>)))
</script>