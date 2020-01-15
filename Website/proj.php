<?require "global.php";

//delete post
if(isset($_GET["deletePost"])){
    $post_del = $_GET["deletePost"];
    $sql="update fyp_posts set status='deleted' where id='$post_del'";
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }
}

//get all my projects for navbar
$query_myProjects = "select * from fyp_projects p  inner join fyp_collaborators c on c.projId=p.id where c.userId='$session_userId';
    "; 

    
//get all posts
$noProjects = true;
if(isset($_GET['project'])){
    $proj_id = $_GET['project'];
    
    //get project details
    $query_thisProject = "select * from fyp_projects where id='$proj_id'"; 
    $result_thisProject = $con->query($query_thisProject);
    if ($result_thisProject->num_rows > 0)
    { 
        while($row = $result_thisProject->fetch_assoc()) 
        { 
            $proj_name_1 = $row['name'];
            $proj_tagline_1 = $row['tagLine'];
            $noProjects = false;
        }
    }
    
    //get all posts
    $query_myProjPosts = "select * from fyp_posts p where p.projId='$proj_id' and (p.title!='' or p.content!='' or p.image!='') and p.status='' order by p.id desc;
        "; 
        
    //get all collaborators
    $query_collaborators = "select * from fyp_collaborators c inner join fyp_users u on u.id=c.userId where c.projId='$proj_id' order by c.id desc;
        "; 
}

//add new member
if(isset($_POST['new_member_email'])&&isset($_GET['project'])){
    $new_member_email = $_POST['new_member_email'];
    $proj_id = $_GET['project'];
    
    $query_getEmail = "select * from fyp_users where email='$new_member_email';
    "; 
    $result_getEmail = $con->query($query_getEmail);
    if ($result_getEmail->num_rows > 0)
    { 
        while($row = $result_getEmail->fetch_assoc()) 
        { 
            $new_member_id = $row['id'];
            ?><script>//console.log("<?echo $new_member_id?>")</script><?
        }
        //insert member
        $sql="insert into fyp_collaborators(`userId`, `projId`) values ('$new_member_id', '$proj_id')";
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }
    }
}

//see is write access
$hasWriteAccess=false;
$query_writeAccess = "select * from fyp_collaborators where userId='$session_userId' and id='$proj_id' and userId!='';
    "; 
$result_writeAccess = $con->query($query_writeAccess);
if ($result_writeAccess->num_rows > 0)
{ 
    $hasWriteAccess = true;
}

?>

<?
//uploading posts
if(isset($_POST["title"])||isset($_POST["content"])||isset($_POST["image"])){
    $title = $_POST["title"];
    $content = $_POST["content"];
    $projId = $_GET['project'];
    $timePosted = time();
    
    extract($_POST);
    $error=array();
    $images=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

        if(in_array($ext,$extension)) {
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$newFileName);
            array_push($images,$newFileName);
        }
        else {
            array_push($error,"$file_name, ");
        }
    }
    
    foreach($images as $image) {
        $sql="insert into fyp_posts(`projId`, `userId`, `title`, `content`, `image`, `timePosted`) values ('$projId', '$session_userId', '$title', '$content', '$image', '$timePosted')";
        if(!mysqli_query($con,$sql))
        {
        echo"can not";
        }
    }
    //if no image
    if(count($images)==0){
        $sql="insert into fyp_posts(`projId`, `userId`, `title`, `content`,  `timePosted`) values ('$projId', '$session_userId', '$title', '$content',  '$timePosted')";
        if(!mysqli_query($con,$sql))
        {
        echo"can not adssadasd";
        }
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
        <?
                 if($logged==1){
                 require "./phpParts/upperBar.php";
                 }else{require "./phpParts/upperBar-loggedout.php";}
                 ?>

        <div class="app-main">
            
                 <?
                 if($logged==1){
                 require "./phpParts/leftBar.php";
                 }else{require "./phpParts/leftBar-loggedout.php";}
                 ?>
                <div class="app-main__outer">
                    <div class="app-main__inner row">
                        <div id="feed" class="col-lg-7">
                        <!--here goes content-->
                        <?if(isset($_GET['posted'])){?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    Your post was posted successfully.
                                                </div>
                        <?}?>
                        <?if(isset($_GET['deletePost'])){?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    The post was deleted successfully. You can bring back the post whenever you change your mind.
                                                </div>
                        <?}?>
                                                
                        <?if(true)
                        {
                            ?>
                            <?if($hasWriteAccess){?>
                            <div class="main-card mb-3 card">
                            <div class="card-body"><h5 class="card-title">Create Post</h5>
                                <form class="" action="./proj?posted=1&project=<?echo $_GET['project']?>" method="post" enctype="multipart/form-data">
                                    <div class="position-relative form-group"><input name="title" id="examplePassword" placeholder="Title" type="text" class="form-control" ></div>
                                    <div class="position-relative form-group">
                                    <textarea name="content" id="exampleEmail" placeholder="What's happening?" type="text" class="form-control" ></textarea></div>
                                    
                                            <label for="exampleEmail" class="">Upload images (if any)</label>
                                            <div class="mt-12 btn ">
                                                <input id="exampleFile" type="file" name="files[]" multiple class="form-control-file mt-12 btn btn-primary"/>
                                            </div>
                                    <button class="mt-12 btn btn-success">Post</button>
                                </form>
                            </div>
                        </div>
                        <?}?>
                        
                            <!--show all posts-->
                            <?
                            $result_myProjPosts = $con->query($query_myProjPosts);
                            if ($result_myProjPosts->num_rows > 0)
                            { 
                                while($row = $result_myProjPosts->fetch_assoc())
                                {
                                    date_default_timezone_set("Asia/Karachi");
                                    $newDateTime = date('d/M/Y H:i: A',$row['timePosted']);
                                    //$newDateTime = date('h:i A', strtotime($currentDateTime));
                                    
                                    ?>
                                    <div class="main-card mb-3 card">
                                        <div class="card-header-tab card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                            <?echo $row['title']?> - <?echo $newDateTime?> 
                                        </div>
                                        
                                        <?if($hasWriteAccess){?>
                                        <div class="btn-actions-pane-right">
                                            <div class="nav">
                                                <a href="./proj?deletePost=<?echo $row['id']?>&project=<?echo $_GET['project']?>" class="ml-1 btn-pill btn-wide border-0 btn-transition  btn btn-outline-alternate second-tab-toggle-alt">Delete</a>
                                            </div>
                                        </div>
                                        <?}?>
                                        
                                    </div>
                                    
                                            <div class="card-body">
                                                <p><?echo $row['content']?></p>
                                                <?if($row['image']!=''){?>
                                                <img src="./photo_gallery/<?echo $row['image']?>" style="width:100%;">
                                                <?}?>
                                                </div>
                                        </div>
                                    <?
                                    
                                }
                            }
                            ?>
                            
                            <?
                        }
                        ?>
                        </div>
                        <div id="feed" class="col-lg-5 col-sm-0">
                        <!--here goes content-->
                        <div class="main-card mb-3 card">
                                        <div class="card-header-tab card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                                            <?echo $proj_name_1?> 
                                        </div>
                                        <div class="btn-actions-pane-right">
                                            <div class="nav">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                            <div class="card-body">
                                                <p><?echo $proj_tagline_1?></p>
                                                </div>
                                        </div>
                                        
                                        <div class="main-card mb-3 card">
                                    <div class="card-header">Team
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                
                                                </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <?if($hasWriteAccess){?>
                                            <form action="./proj?project=<?echo $_GET['project']?>" method="post">
                                                <div class="input-group" style="padding:5px;">
                                                        
                                                        <input type="email" class="form-control" name="new_member_email" placeholder="Enter email address" required>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-secondary">Add Member</button>
                                                        </div>
                                                        </div>
                                            </form>
                                            <?}?>    
                                            <tbody>
                                            
                                                <?
                                                $result_collaborators = $con->query($query_collaborators);
                            if ($result_collaborators->num_rows > 0)
                            { 
                                while($row = $result_collaborators->fetch_assoc())
                                {
                                    ?>
                                    <tr>
                                                <td class="text-center text-muted">
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left mr-3">
                                                                <div class="widget-content-left">
                                                                    <img class="rounded-circle" src="./photo_gallery/<?echo $row['userImg']?>" alt="" width="40">
                                                                </div>
                                                            </div>
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?echo $row['name']?></div>
                                                                <div class="widget-subheading opacity-7"><?echo $row['email']?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                
                                                
                                            </tr>
                                    <?
                                }
                                }?>
                                
                                            
                                            </tbody>
                                        </table>
                                    </div>
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
