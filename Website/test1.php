<link rel="stylesheet" href="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.css">
<style>
    #sidebar {
    width: 20%;
    float: left;
}
#main {
    width: 80%;
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

<div id="sidebar">
    <p>Drag items into the map</p>
    <ul>
        <li><span class="drag">Item 1</span></li>
        <li><span class="drag">Item 2</span></li>
        <li><span class="drag">Item 3</span></li>
        <li><span class="drag">Item 4</span></li>
        <li><span class="drag">Item 5</span></li>
    </ul>
    <p><button type="button" class="import">Import</button></p>
    <p><button type="button" class="export">Export</button></p>
    <textarea id="data"></textarea>
</div>
<div id="main">
    <div id="map"></div>
</div>
 
 
 
 <script src="https://d19vzq90twjlae.cloudfront.net/leaflet/v0.7.7/leaflet.js"></script>


 <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script>
    var imageUrl = 'http://res.freestockphotos.biz/pictures/5/5695-an-autumn-landscape-with-green-grass-pv.jpg';
var imageWidth = 654;
var imageHeight = 435;

var map = setupMap();
var markers = setupImport(map);
setupItems(map, markers);
setupExport(markers);

function setupMap() {
    var map = L.map('map', {
        minZoom: 1,
        maxZoom: 5,
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
function addItem(map, markers, item) {
    var name = item.name;
    var position = L.latLng([item.position.lat, item.position.lng]);
    var options = {draggable: true};
    var marker = L.marker(position, options).addTo(map).bindPopup(name);
    marker.name = name;
    markers.push(marker);
}
function setupItems(map, markers) {
    $('.drag').draggable({
        helper: 'clone',
        containment: 'map',
        stop: function(evt, ui) {
            var position = map.mouseEventToLatLng(evt);
            
            var item = {
                name: $(this).text(),
                position: position
            };
            addItem(map, markers, item);
        }
    });
}
function setupExport(markers) {
    $('.export').click(function () {
        var result = [];
        
        for (var i = 0; i < markers.length; i++) {
            var data = {
                name: markers[i].name,
                position: markers[i]._latlng
            };
            result.push(data);
        }
        var json = JSON.stringify(result);
        $('#data').val(json);
    });
}
function setupImport(map) {
    var markers = [];
    
    $('.import').click(function () {
        var json = $('#data').val();
        var result = JSON.parse(json);
        
        if (result && $.isArray(result)) {
            for (var i = 0; i < result.length; i++) {
                addItem(map, markers, result[i]);
            }
        }
    });
    
    return markers;
}
</script>
