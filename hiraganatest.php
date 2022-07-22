<html>
    <head><title>kana checker</title>
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
                    if (isset($_SESSION["username"])) {
                        echo "<li><a href='./useraccount.php'>" . $_SESSION["username"] . "</a></li>";
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
if (isset($_SESSION["id"])) {
        function gen_rand_char(){
            $json = file_get_contents("./json/hiragana.json");
            $json_data = json_decode($json, true);
            $value = rand(0, count($json_data) - 1);

            $_SESSION["answer"] = $json_data[$value]["romanization"];
            $_SESSION["img"] = $json_data[$value]["character"];
        }
        echo "<div style='text-align:center;'>";
        
        if ($_POST && isset($_POST["char"]) && isset($_SESSION["answer"])) {
            if ($_POST["char"] == $_SESSION["answer"]) {
                $conn = mysqli_connect("localhost","root","","kanachecker");
                if($conn)
                {
                    $id = $_SESSION["id"];
                    $finduser = "UPDATE `userdata` SET `score`=`score`+1 WHERE id = $id";
                    $validate = mysqli_query($conn,$finduser);
                    echo "<h1 style='color:green;font-family:poppins;'>Correct Answer</h1>";
                    $find = "SELECT * FROM `userdata` WHERE `id` = $id";
                    $val = mysqli_query($conn,$find);
                    $rows = mysqli_fetch_assoc($val);
                    echo "<p> Your Current Score is <b>".$rows['score']."</b></p>";
                    }
                gen_rand_char();          
            } else{

                echo "<h1 style='color:red;font-family:poppins;'>Wrong answer</h1>";
            }
        } else {
            gen_rand_char();    
        }


       
        echo "<div class='inchart'><h1>" . $_SESSION["img"] . "</h1></div>";
        echo '<form  method="post">
        <input type="text" id="text" name="char" placeholder="Enter Your character" required>
        <input type="submit" value="submit"> 
        </form></div>';
    }
    else {
        echo "<h1>Login in first</h1>";
    }
    ?>
</body>
    
</html>