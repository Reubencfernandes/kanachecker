<html>
<head>
    <link rel="stylesheet" href="./style.css">
    <title>
        Kana Checker
    </title>
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
            <div class="grid">
    <?php
    echo "<img src='https://i.pinimg.com/564x/14/af/36/14af367a818cbc2342fd7a33bc251c6d.jpg'>";
    echo "<div class='inside-grid'><h1>Welcome Back</h1>
    <p>Please Enter Your details</p>";
    
    echo '<form  method="post">
        <label for="email">Enter Your Email</label> <br>
        <input type="email" id="email" name="useremail" placeholder="reubenfernandes20ce09apv@gmail.com" required><br>
        <label for="password">Enter Your Password</label><br>
        <input type="password" id="password" name="userpassword" placeholder="abcd" required><br>
        <input type="submit" value="submit"><br>
        <p>Not A Member ? <a href="./register.php">Create An Account</a></p>
    </form>';
    
    $conn = mysqli_connect("localhost","root","","kanachecker");
    if($conn)
    {
        if($_POST){
        $email = $_POST["useremail"];
        $password = $_POST["userpassword"];
        $finduser = "SELECT * FROM `userdata` where `email`='$email'";
        $validate = mysqli_query($conn,$finduser);
        
        if(mysqli_num_rows($validate)>0)
        {
            $rows = mysqli_fetch_assoc($validate);
            
            if($rows["email"] == $email && $rows["password"] == $password)
            {
                $_SESSION["score"] = $rows["score"];
                $_SESSION["username"] = $rows["username"];
                $_SESSION["id"] = $rows["id"];
                header("location: http://localhost/kanachecker/home.php");

            } else if($rows["email"] == $email && $rows["password"] != $password)
            {
                echo "<div class='message'>";
            echo"<h1>You Have Entered A wrong password</h1>";
            echo "</div>";
            } else if($rows["email"] != $email && $rows["password"] != $password)
            {
                echo "<div class='message'>";
                echo"<h1>Your Password and Email id couldnt be found</h1>";
                echo "<a href='register'>Register Your Account here</a>";
                echo "</div>";
            }
                

        }else{
            echo "<div class='message'>";
            echo"<h1>Your Password and Email id couldnt be found</h1>";
            echo "<a href='register'>Register Your Account here</a>";
            echo "</div>";
        }       
    }
    } else{
        echo "Connection Failure";
    }
    echo "</div>";
    ?>
    </div>
</body>

</html>