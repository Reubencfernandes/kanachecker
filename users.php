<html>
    <!-- THIS IS THE HOME PAGE -->
    <head>
        <title>
            Kana Checker
         
        </title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <header class="siteheader">  
            <div class="title">
            <h1> <a href="./home.php" style="color:red;font-family:monospace;">KANACHECKER</a></h1>
            </div>
            <nav>  
            <ul>  
            <li> <a href="./hiragana.php">Hiragana Chart </a></li>  
            <li> <a href="./katakana.php">katakana Chart</a></li>  
            <?php
            session_start();
            if(isset($_SESSION["username"])){
                echo "<li><a href='./useraccount.php'>".$_SESSION["username"]."</a></li>";
            } else {
            echo '<li><a href="./login.php"> Login </a></li>  
            <li> <a href="./register.php"> Register </a> </li>';
            }
            ?>
            </ul>  
            </nav>  
            </header> 
        <div class="choose">
            <h1 style="margin: 20px;">
               Users
                </h1>
          <?php
           $conn = mysqli_connect("localhost","root","","kanachecker");
           if($conn)
           {
               $finduser = "SELECT * FROM `userdata` order by `Score` DESC";
               $validate = mysqli_query($conn,$finduser);
               if(mysqli_num_rows($validate)>0){
               echo "<table class='users'>";
               echo "<tr><th>ID</th><th>NAME</th><th>Score</th><tr>";
               while($rows = mysqli_fetch_assoc($validate))
               {
                    echo"<tr><td>".$rows['id']."</td>"."<td>".$rows['username']."</td>"."<td>".$rows['score']."</td></tr>";
               }
            }
           }
           echo "</table>";
           ?>
    
    </div>
    </body>
</html>