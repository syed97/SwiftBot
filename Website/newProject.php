<?require "global.php";
if ($logged==0){ 
    ?>
    <script type="text/javascript">
            window.location = "./";
        </script>
    <?
}
?>

<?

if(isset($_POST["title"])){
    $title = $_POST["title"];
    $outline = $_POST["outline"];
    $proj_id = time();
    $sql="insert into fyp_projects(`id`, `name`, `tagLine`, `userId`) values ('$proj_id', '$title', '$outline', '$session_userId')";
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }else{
            $sql="insert into fyp_collaborators(`userId`, `projId`) values ('$session_userId', '$proj_id')";
            if(!mysqli_query($con,$sql))
            {
            echo"can not";
            }
        
            ?>
            <script type="text/javascript">
                    window.location = "./home";
                </script>
            <?
        }
        
}

//get all my projects
$query_myProjects = "select * from fyp_projects where userId='$session_userId';
    "; 
    $result_myProjects = $con->query($query_myProjects);
    $noProjects = true;
    if ($result_myProjects->num_rows > 0)
    { 
        while($row = $result_myProjects->fetch_assoc()) 
        { 
            $proj_id = $row['id'];
            $proj_name = $row['name'];
            $proj_tagline = $row['tagLine'];
            $noProjects = false;
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Fypo - Anomoz Softwares</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="./newMain.css" rel="stylesheet">
<link href="https://demo.dashboardpack.com/architectui-html-pro/main.cba69814a806ecc7945a.css" rel="stylesheet">

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <?require "./phpParts/upperBar.php"?>     
        
        <div class="app-main">
                 <?require "./phpParts/leftBar.php"?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <!--here goes content-->
                        <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Create new project</h5>
                                <form class="" action="" method="post">
                                    <div class="position-relative form-group"><label for="exampleEmail" class="">Title</label>
                                    <input name="title" id="exampleEmail" placeholder="Title" type="text" class="form-control" required></div>
                                    <div class="position-relative form-group"><label for="examplePassword" class="">Outline</label><input name="outline" id="examplePassword" placeholder="Write in 1 line about you project." type="text" class="form-control" required></div>
                                    <small class="form-text text-muted">You will be change these details later.</small>
                                    
                                    <button class="mt-1 btn btn-primary">Create Project</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="app-wrapper-footer">
                        <div class="app-footer">
                            <div class="app-footer__inner">
                                
                                <div class="app-footer-right">
                                    <ul class="nav">
                                        
                                        <li class="nav-item">
                                            <a href="https://www.anomoz.com" class="nav-link">
                                                <!--
                                                <div class="badge badge-success mr-1 ml-0">
                                                    <small>NEW</small>
                                                </div>
                                                -->
                                                Built by Anomoz Softwares
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
</html>
