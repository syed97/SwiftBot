<?require "global.php";
if(isset($_POST['saveField'])){
    $saveField = $_POST['saveField'];
    $addedByField = $_POST['addedByField'];

    
    //delete all points
    
    $sql="delete from swift_mapPoints";
    if(!mysqli_query($con,$sql))
    {
        echo "err";
    }
    
    //for
    $saveField = (json_decode($saveField));
    $addedByField = (json_decode($addedByField));
    for($i=0; $i < count($saveField); $i++){
        
        $name = $saveField[$i]->name;
        $lat = $saveField[$i]->position->lat;
        $lng = $saveField[$i]->position->lng;
        $addedBy = $addedByField[$i];
        ?>
        <script>console.log("a <?echo $addedBy?>")</script>
        <?
        
        $sql="insert into swift_mapPoints(`name`, `lat`, `lng`, `addedBy`) values('$name', '$lat', '$lng', '$addedBy')";
        if(!mysqli_query($con,$sql))
        {
            echo "err";
        }
        
        
    }
}
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}
?>
<script>var addedBy = [];</script>
<?
$mapPoints = array();
$query_mapPoints = "select * from swift_mapPoints"; 
$result_mapPoints = $con->query($query_mapPoints); 
if ($result_mapPoints->num_rows > 0)
{ 
    while($row = $result_mapPoints->fetch_assoc()) 
    {
        $mapPoint ="";
        $mapPoint->name = $row['name'];
        $mapPoint->addedBy = $row['addedBy'];
        $mapPoint->position->lat = $row['lat'];
        $mapPoint->position->lng = $row['lng'];
        ?>
        <script>addedBy.push("<?echo $mapPoint->addedBy;?>")</script>
        <?
        array_push($mapPoints,$mapPoint);
    }
}
$mapPoints_json = json_encode($mapPoints);
?>
<script>
    var allPoints = JSON.parse(JSON.stringify(<?echo $mapPoints_json?>));
    //console.log("$mapPoints_json",allPoints )
</script>
<!doctype html>
<html lang="en">

<head>
    <?require "./phpParts/header.php"?> 
    <style>
        #main {
            width: 100%;
            float: left;
        }
        #map {
            width: 100%;
            height: 600px;
        }
        .drag {
            cursor: pointer;
        }
        #data {
            width: 90%;
            height: 200px;
        }
    </style>
    <link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.css">
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?if($logged==1){
                 require "./phpParts/upperBar.php";
                 }
                 ?>
        
        <div class="app-main">
                <?
                 if($logged==1){
                 require "./phpParts/leftBar.php";
                 }
                 ?>
                <div class="app-main__outer col-md-12 col-lg-12">
                    <div class="app-main__inner">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        <div>Generated Map</div>
                                        <div class="btn-actions-pane-right">
                                            <div  class="input-group " style="padding:5px;">
                                                            
                                                            <input type="text" class="form-control" name="new_location" placeholder="Enter location name." required="" id="new_location">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-secondary" onclick="addPointerBtn()">Add Pointer</button>
                                                            </div>
                                                            
                                                            <div class="input-group-append" style="margin-left:5px;">
                                                                <button class="btn btn-success" onclick="save()">Save</button>
                                                            </div>
                                                            
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="table-responsive col-lg-12 col-md-12">
                                     
                                        <div id="main">
                                            <div id="map"></div>
                                        </div>

                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?require "./phpParts/footer.php"?>    
                </div>
        </div>
    </div>
    <form method="post" action="./map.php" id="saveForm">
        <input placeholder="save" id="saveField" name="saveField" type="text">
        <input placeholder="addedBy" id="addedByField" name="addedByField" type="text">
    </form>
    
</body>
<script type="text/javascript" src="./assets/scripts/main.js"></script>

<script src="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.js"></script>


 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script>
    var imageUrl = './assets/map.png';
    var imageWidth = 654;
    var imageHeight = 435;
    
    var map = setupMap();
    var markers = [];
    setupItems(map, markers);
    //setupExport(markers);
    setupPointersOnMap(allPoints);
    
    function setupMap() {
        var map = L.map('map', {
            minZoom: 1,
            maxZoom: 8,
            center: [0, 0],
            zoom: 5,
            crs: L.CRS.Simple
        });
        var southWest = map.unproject([0, imageHeight]);
        var northEast = map.unproject([imageWidth, 0]);
        var bounds = new L.LatLngBounds(southWest, northEast);
        L.imageOverlay(imageUrl, bounds).addTo(map);
        map.setMaxBounds(bounds);
        
        return map;
    }
    function addItem(map, markers, item, addedByVal) {
        var name = item.name;
        var position = L.latLng([item.position.lat, item.position.lng]);
        var options = {draggable: true};
        var marker = L.marker(position, options).addTo(map).bindPopup(name);
        marker.name = name;
        //marker.title(name);
        markers.push(marker);
        console.log("addedBy", addedBy, addedByVal)
        if(addedByVal!=undefined){
            addedBy.push(addedByVal)
        }
    }
    function setupItems(map, markers) {
        $('.drag').draggable({
            helper: 'clone',
            containment: 'map',
            stop: function(evt, ui) {
                var position = map.mouseEventToLatLng(evt);
                
                var item = {
                    name: $(this).text(),
                    position: position,
                    addedBy:"admin"
                };
                addItem(map, markers, item, "admin");
            }
        });
    }
  
    
    
    function placePointer(name){
        var result = [{"name":name,"position":{"lat":-7.1875,"lng":9.75}, "addedBy":"admin"}];
            if (result && $.isArray(result)) {
                for (var i = 0; i < result.length; i++) {
                    addItem(map, markers, result[i], "admin");
                }
            }
    }
    
    function setupPointersOnMap(allPoints){
        var result = allPoints;
        if (result && $.isArray(result)) {
            for (var i = 0; i < result.length; i++) {
                addItem(map, markers, result[i], allPoints.addedBy);
            }
        }
    }
    
    function addPointerBtn(){
        
        var pointerName = document.getElementById("new_location").value
        console.log("pointerName", pointerName);
        placePointer(pointerName)
        //exportData()
    }

    function exportData(){
        var result = [];
        for (var i = 0; i < markers.length; i++) {
            var data = {
                name: markers[i].name,
                position: markers[i]._latlng
            };
            result.push(data);
        }
        var json = JSON.stringify(result);
        console.log("json", json)
        return json;
    }
    
    function save(){
        var savingData = exportData()
        addedBy = JSON.stringify(addedBy);
        document.getElementById("saveField").value = savingData
        document.getElementById("addedByField").value = addedBy
        console.log("addedBy", addedBy)
        document.getElementById("saveForm").submit(); 
    }
</script>

</html>
