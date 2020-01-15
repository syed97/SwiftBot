<?require "global.php";
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}

$query_bookedRoomsList = "select * from swift_users"; 

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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Registered Users
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Phone number</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?
                                                $result_bookedRoomList = $con->query($query_bookedRoomsList); 
                                            if ($result_bookedRoomList->num_rows > 0)
                                            { 
                                                while($row = $result_bookedRoomList->fetch_assoc()) 
                                                { 
                                                    ?>
                                                    <tr>
                                                <td class="text-center text-muted">#<?echo $row['id']?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <?echo $row['name']?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center"><?echo $row['email']?></td>
                                                <td class="text-center">
                                                    <div class="badge badge-success"><?echo $row['phoneNumber']?></div>
                                                </td>
                                                
                                            </tr>
                                                    <?
                                                }
                                            }
                                                ?>
                                            
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?require "./phpParts/footer.php"?>    
                </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
