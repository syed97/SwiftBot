<?require "global.php";
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}

$query_bookedRoomsList = "select COUNT(id) as 'nUsers' from vento_users"; 
$result_bookedRoomList = $con->query($query_bookedRoomsList); 
if ($result_bookedRoomList->num_rows > 0)
{ 
    while($row = $result_bookedRoomList->fetch_assoc()) 
    { 
        $nUsers = $row['nUsers'];
    
    }
}

$query_bookedRoomsList = "select COUNT(id) as 'nUsers' from vento_resturants"; 
$result_bookedRoomList = $con->query($query_bookedRoomsList); 
if ($result_bookedRoomList->num_rows > 0)
{ 
    while($row = $result_bookedRoomList->fetch_assoc()) 
    { 
        $nVendors = $row['nUsers'];
    
    }
}

$query_bookedRoomsList = "select COUNT(id) as 'nUsers' from vento_booking"; 
$result_bookedRoomList = $con->query($query_bookedRoomsList); 
if ($result_bookedRoomList->num_rows > 0)
{ 
    while($row = $result_bookedRoomList->fetch_assoc()) 
    { 
        $nBookings = $row['nUsers'];
    
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <?require "./phpParts/header.php"?> 
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
                <div class="app-main__outer">
                    <div class="app-main__inner">
                         <!--          
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Users</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?echo $nUsers;?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Events</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning"><?echo $nBookings?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Vendors</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger"><?echo $nVendors?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Registered Venues</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success"><?echo $nUsers;?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Registered Caterers</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">$3M</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Registered Decorators</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">45,9%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        -->
                    </div>
                    <?require "./phpParts/footer.php"?>    
                </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
