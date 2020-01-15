<?php
$host='localhost';
$username='anomozco_nooruser';
$user_pass='rWg#M$vFYk]+';
$database_in_use='anomozco_noor';

$conn = mysqli_connect($host,$username,$user_pass,$database_in_use);
if (!$conn)
{
    echo"not connected";
}
if (!mysqli_select_db($conn,$database_in_use))
{
    echo"database not selected";
}

if (isset($_POST["import"]))
{
  if(true){

        $targetPath = 'uploads/'.$_FILES['file']['name'];
        echo "<div id='fileUploading'>Uploading File... Please Wait...</div>";
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
  }
  else
  { 
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
  }
}
?>

<style>
    #loading {width: 100%;height: 100%;top: 0px;left: 0px;position: fixed;display: block; z-index: 99}

#loading-image {position: absolute;top: 40%;left: 40%;z-index: 100} 

</style>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    

    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="input-group-text" id="inputGroupFileAddon01" type="submit" name="import">Upload</button>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" id="file">
                <label class="custom-file-label" name="file" id="file">Choose file</label>
            </div>
        </div>
    </form>
    
    <div id="loading">
    <img id="loading-image" src="https://loading.io/spinners/progress/lg.progress-bar-preloader.gif" alt="Loading..." style="width:100px;justify-content: center;"/>
    </div> 

    <!--
    <video style="width:100%;" muted autoplay loop>
        <source src="./assets/ myface.mp4" type="video/mp4"> Your browser does not support HTML5 video.
    </video>
    -->

    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="input-group-text" id="inputGroupFileAddon01" type="submit" name="import">Upload</button>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="file" id="file">
                <label class="custom-file-label" name="file" id="file">Choose file</label>
            </div>
        </div>
    </form>
    
    <script>
        window.onload = function(){ 
            document.getElementById("loading").style.display = "none" ;
            document.getElementById("fileUploading").style.display = "none" ;
            
            
        }
    </script>