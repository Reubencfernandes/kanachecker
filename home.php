<html>
    <!-- THIS IS THE HOME PAGE -->
    <head>
        <title>
            Kana Checker
         
        </title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <?php
         session_start();
         $_SESSION["count"] =0;
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
            <?php
            if(isset($_SESSION["username"])){
                echo "<li><a href='./useraccount.php'>".$_SESSION["username"]."</a></li>";
                echo "<li><a href='./logout.php'>logout</a></li>";
            } else {
            echo '<li><a href="./login.php"> Login </a></li>  
            <li> <a href="./register.php"> Register </a> </li>';
            }
            ?>
            </ul>  
            </nav>  
            </header> 
            <?php
                if(isset($_SESSION["id"])){
        echo '<div class="choose">
            <h1 style="margin: 20px;">
                Choose
                </h1>';
            echo '<a href="hiraganatest.php" class="hiragana-select">Hiragana</a>
             <a href="katakanatest.php" class="katakana-select">katakana</a>';
                }else{
                    echo '<h1 style="color:black;font-family:poppins;" class="choose">please login first</h1>';
                }
                ?>
    </div>
    </body>
</html>