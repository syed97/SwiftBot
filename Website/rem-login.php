<?include_once("global.php");?>
<?
echo "$logged";
if ($logged==1){ 

    ?>
            <script type="text/javascript">
                    window.location = "./home.php";
                </script>
            <?
}
if(isset($_POST["email"])){
    $email = $_POST["email"]; 
    $password = $_POST["password"];
if((!$email)||(!$password)){
    $message = "Please insert both fields.";
    } 
else{ 

        //$_SESSION['email'] = $email;
if(($email=='admin@admin.admin')&&($password=='123')){
     $logged=1;
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;

    ?>
    
    <script type="text/javascript">
            window.location = "./home.php";
        </script>
        
    <?
    
}
    } 
    }?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" media="screen" href="./assets/login.css" />
</head>
<body class='login'>


<img class="logo" height="75" width="35"  />
<form class="vertical-form sign-in" id="sign-in" action="" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="hdUVjCES74CVhwLA0M6Rl/fmZL8gCTIy/JOGWwpYcCPh11MccSGihLZL9ScOsIjn6hzPRuEskcM+46RVnsAPuA==" /><input type="hidden" name="i" id="i" />
<input type="hidden" name="browser" id="browser" value="" />
<input type="hidden" name="operating_system" id="operating_system" value="" />
<input type="hidden" name="timezone_offset" id="timezone_offset" value="" />

<legend>
Sign In
</legend>
<input type="email" placeholder="Email Address" label="false" spellcheck="false" class="is-sensitive" value="" name="email" id="user_email" required />
<input placeholder="Password" label="false" autocomplete="off" class="is-sensitive" type="password" name="password" id="user_password" required/>
<input type="submit" name="commit" value="Sign In" />
</form>
<div class='footer'>
<p>
Don't have an account?
<a href="/signup">Create one now</a>
</p>
</div>

</body>
</html>
