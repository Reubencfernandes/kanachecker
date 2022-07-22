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
                if($_SESSION["id"]){
             $id = $_SESSION["id"];
             $conn =  mysqli_connect("localhost","root","","kanachecker");
             if($conn){
             $finduser = "SELECT * FROM `userdata` WHERE id = $id";
             $validate = mysqli_query($conn,$finduser);
             $rows = mysqli_fetch_assoc($validate);
             if(mysqli_num_rows($validate)>0)
             {
                echo "<div class='grid'>
                
                <img src='https://i.pinimg.com/564x/db/fc/ca/dbfcca303a73f1a2abfe9ead806dd751.jpg'>";
                echo "<div class='inside-grid'>";
                echo "<h2>Id is <b>".$rows["id"]."</b></h2>";
                echo "<h2>Username is <b>".$rows["username"]."</b></h2>";
                echo "<h2>password is <b>".$rows["password"]."</b></h2>";
                echo "<h2>score is <b>".$rows["score"]."</b></h2>";
                echo '<p><a href="./delete.php">Delete Account</a></p>
                </div></div>';
             }
             }
                }
                else{
                    header("location : http://localhost/kanachecker/home.php");
                }
                ?>
    </div>
    </body>
</html>