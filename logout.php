<html>
    <head>
        <title>
            Kana Checker
         
        </title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
         session_start();
         session_destroy();

       
        ?>
        <header class="siteheader">  
            <div class="title">
            <h1> <a href="./home.php" style="color:red;font-family:monospace;">KANACHECKER</a></h1>
            </div>
            <nav>  
            <ul>  
            <li> <a href="./hiragana.php">Hiragana Chart </a></li>  
            <li> <a href="./katakana.php">katakana Chart</a></li>  
            <li> <a href="./users.php">Users </a></li>  
            <li><a href="./login.php"> Login </a></li>  
            <li> <a href="./register.php"> Register </a> </li>
            
            </ul>  
            </nav>  
            </header> 
        <div class="choose">
            <h1 style="margin: 20px;">
                You have logged out successfully
            <a href="./login.php"> Login </a> or
            <a href="./register.php"> Register </a> 
                </h1>
            
    
    </div>
    </body>
</html>