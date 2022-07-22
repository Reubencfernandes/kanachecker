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
            <li><a href="./login.php"> Login </a></li>  
            <li> <a href="./register.php"> Register </a> </li>  
            </ul>  
            </nav>  
            </header> 
            <div class="grid">
    <?php
    
    echo "    
    <img src='https://i.pinimg.com/originals/70/c0/79/70c07946f931c940a8c827aaf04cc3c3.png'><div class='inside-grid'><h1>Register</h1>
    <p>Please Enter Your details</p>";
        echo '<form  method="post">
        <label for="name">Enter Your Name</label><br>
        <input type="text" id="name" name="name" placeholder="midoriya" required><br>
        <label for="email">Enter Your Email</label> <br>
        <input type="email" id="email" name="useremail" placeholder="midori@gmail.com" required><br>
        <label for="password">Enter Your Password</label><br>
        <input type="password" id="password" name="userpassword" placeholder="helloworld123" required>
        <br>
        <input type="submit" value="submit">
    </form>';
    
    $conn = mysqli_connect("localhost","root","","kanachecker");
    if($conn)
    {
        if($_POST){
            $name = $_POST["name"];
        $email = $_POST["useremail"];
        $password = $_POST["userpassword"];
        $finduser = "SELECT * FROM `userdata` where `email`='$email'";
        $validate = mysqli_query($conn,$finduser);
        if(mysqli_num_rows($validate)<=0)
        {
            $res = time();
                mysqli_query($conn,"INSERT INTO `userdata`(`id`,`username`,`email`,`password`,`score`) values($res,'$name','$email','$password',0)");
                echo "<div class='message'>";
                echo"<h1>Your Account has been created</h1>";
                echo "<a href='./login.php'>click this link to login</a>";
                echo "</div>";
            
            
            
                

            } else{
                echo "<div class='message'>";
                echo"<h1>Your Email account already exists</h1>";
                echo "<a href='./login.php'>Click this link to login</a>";
                echo "</div>";
            }    
    }
 
    } else{
        echo "Connection Failure";
    }
    echo "</div>";
    ?>
</body>

</html>