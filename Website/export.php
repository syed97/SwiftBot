<?require "global.php";
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Export Data
                                        
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th>Data</th>
                                                <th class="text-center">Download</th>
                                                
                                                
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            Users
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                <td class="text-center">
                                                    <a href="./dataDownload/users.php">
                                                    <div class="badge badge-success">Download</div>
                                                    </a>
                                                </td>
                                                
                                            </tr>
                                            
                                            
                                            
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
