<html>
    <head><title>Hiragana Chart</title>
    <link rel="stylesheet" href="./style.css">
</head>
    <body>
    <header class="siteheader">  
            <div class="title">
            <h1> <a href="./home.php" style="color:red;font-family:monospace;font-family: poppins;">KANACHECKER</a></h1>
</div>
            <nav>  
            <ul>  
            <li> <a href="./hiragana.php">Hiragana Chart </a></li>  
            <li> <a href="./katakana.php">katakana Chart</a></li>  
            <?php
            session_start();
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
$json = file_get_contents("./json/hiragana.json");
$json_data = json_decode($json,true);
echo "<h1 style='text-align:center;padding:10px;color:black;font-family: poppins;'>Hiragana ひらがな</h1>";
echo "<div class='chart'>";
   for($i=0;$i<count($json_data);$i++)
  {
    echo "<div class='inchart'>";
    echo "<h1>".$json_data[$i]["character"]."</h1>";
    echo "<p>".$json_data[$i]["romanization"]."</p></div>";

    
  }
  echo "</div>";
        ?>
    </body>
    
</html>
