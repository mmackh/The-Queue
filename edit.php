<?php 

// Define your username and password 
$username = "user"; 
$password = "pw"; 

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 

?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>The Queue - Login</title>
                     
                <link rel="stylesheet" href="style.css">
    </head>
    <body>
<center>   
<h1>The Queue: Login</h1> 

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    <p><label for="txtUsername">Username:</label> 
    <br /><input type="text" title="Enter your Username" name="txtUsername" /></p> 

    <p><label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" /></p> 

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 
</center>

</div>

</body>
</html>


<?php 

} 
else { 

?> 

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>The Queue - Add</title>
                     
                <link rel="stylesheet" href="style.css">
    </head>
    <body>
<div id="content" style="width: 480px; margin: 30px auto 60px auto;">   
<h1>Add to the Queue</h1>

            <form action="insert.php" method="post">
    
            <label name="link" style="float: left;">URL:</label>
        <input style="display: block; clear: both; width: 100%; margin-bottom: 20px;" id="link" name="link" type="text" value=""/>   
                    <label name="link" style="float: left;">Date Published:</label>
        <input style="display: block; clear: both; width: 100%; margin-bottom: 20px;" id="pubDate" name="pubDate" type="text" value=""/>     
    <label for="bookmark_title" style="float: left;">Title:</label>
    <div style="font-size: 0.8em; font-style: italic; float: right; padding-top: 4px;">
       
    </div>
    <input style="display: block; clear: both; width: 100%; margin-bottom: 20px;" id="title" name="title" type="text" value=""/>
    <label style="float: left;">Summary:</label>
    <div style="font-size: 0.8em; font-style: italic; float: right; padding-top: 4px;">
        
    </div>
    <textarea style="display: block; clear: both; width: 100%; height: 4.25em; margin-bottom: 20px;" id="description" name="description"></textarea>
    
    <div style="text-align: center;">
        <input id="submit" type="submit" style="width: 150px; height: 40px; font-size: 18px;" value="Add"/>
    </div>
                
        
</form>  

</div>

</body>
</html>

<?php 

} 

?> 
