<!DOCTYPE html>

<script>
    window.history.forward();
	function noBack() 
	{
		 window.history.forward();
	}
</script>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form class="form" method="post" name="login" >
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>

  <?php
  $var=null;
   if (isset($_POST["username"])) 
   {
session_start();
$userN = $_POST['username'];
$passW = $_POST['password'];
$var = False;

$myFile = "users.txt";
    $contents = file_get_contents($myFile);
    $contents = explode("\n", $contents);

foreach($contents as $values){
     $loginInfo = explode("|", $values,2);
    // undefine offset 1
    if ($loginInfo[0] == $userN && $loginInfo[1]==$passW) {  
        $var = True;
        break;
    }
}
if ($var==True) {
    header("Location: index.php");;
} 
else {
    echo "<br> You have entered the wrong username or password. Please try again. <br>";
}}
    ?>
    </body>
</html>