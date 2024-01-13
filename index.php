<?php
    $showAlert= false;
    $showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include'dbconnect.php';
    $username = $_POST["username"];
    $emailid = $_POST["emailid"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"]; 
    // $exists = false;
    
    $existSql = "SELECT * FROM `users` WHERE username='$username'";
    $result= mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);

    if($numExistRows > 0){
        $showError = "Username already exists ";
    }
    else{
        if(($password == $cpassword )){
            $sql = "INSERT INTO `users` ( `username`, `emailid`, `password`, `date`) VALUES ( '$username', '$emailid', '$password', current_timestamp())";
    
            $result= mysqli_query($conn, $sql);
    
            if($result){
                $showAlert = true;
            }
        }
        else{
            $showError = "Passwords donot match  ";
        }  
    }
    }

   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Sign Up) Spotify - Your favourite music is here</title>
    <link rel="icon"  href="photos/logo.png">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'Ubuntu', sans-serif;

    }

    body {
        background-color: #055505;
    }

    nav {
        font-family: 'Ubuntu', sans-serif;
        width: 100%;
    }

    nav ul {
        display: flex;
        align-items: center;
        list-style-type: none;
        height: 50px;
        background-color: black;
        color: white;
    }

    nav ul li {
        padding: 0 12px;
    }


    .brand img {
        width: 44px;
        padding: 0 8px;
    }

    .brand {
        display: flex;
        align-items: center;
        font-weight: bolder;
        font-size: 1.3rem;
    }

    ul li h3 {
        text-align: center;
        font-size: 22px;
    }

    .box {

        width: 400px;
        height: 300px;
        background-color: white;
        margin-left: 489px;
        margin-top: 100px;
    }

    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        height: 100%;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 30px;
        background-color: #53ce53;
    }

    header {
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .heading {
        color: black;
    }

    .title {
        font-weight: 400;
        letter-spacing: 1.5px;
    }

    .container {
        height: 615px;
        width: 500px;
        background-color: black;
        box-shadow: 8px 8px 20px rgb(15, 15, 15);
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        color: white;
    }

    .btn {
        height: 60px;
        width: 300px;
        margin: 20px auto;
        box-shadow: 2px 2px 10px rgb(122, 234, 90);
        border-radius: 50px;
        display: flex;
        justify-content: space-around;
        align-items: center;
       
    }

    .login,
    .signup {
        color: white;
        font-size: 22px;
        border: none;
        outline: none;
        background-color: transparent;
        position: relative;
        cursor: pointer;
    }

    .slider {
        height: 60px;
        width: 300px;
        border-radius: 50px;
       
        color: black;
        position: absolute;
        top: 20px;
        left: 100px;
        transition: all 0.5s ease-in-out;
    }

    .moveslider {
        left: 250px;
    }

    .form-section {
        height: 500px;
        width: 1000px;
        padding: 20px 0;
        display: flex;
        position: relative;
        transition: all 0.5s ease-in-out;
        left: 0px;
    }

    .form-section-move {
        left: -500px;
    }

    .login-box,
    .signup-box {
        height: 100%;
        width: 500px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0px 40px;
    }

    .login-box {
        gap: 50px;
    }

    .signup-box {
        gap: 30px;
    }

    .ele {
        height: 45px;
        width: 400px;
        outline: none;
        border: none;
        color: rgb(77, 77, 77);
        background-color: rgb(240, 240, 240);
        border-radius: 50px;
        padding-left: 30px;
        font-size: 18px;
        margin-top: 10px
    }

    .clkbtn {
        height: 60px;
        width: 150px;
        border-radius: 50px;
        background-color: #53ce53;
        font-size: 22px;
        border: none;
        cursor: pointer;
    }
    p{
        color: white; 
        text-decoration: none;
    }

    /* For Responsiveness of the page */
    @media screen and (max-width: 650px) {
        .container {
            height: 600px;
            width: 300px;
        }

        .title {
            font-size: 15px;
        }

        .btn {
            height: 50px;
            width: 200px;
            margin: 20px auto;
        }

        .login,
        .signup {
            font-size: 19px;
        }

        .slider {
            height: 50px;
            width: 100px;
            left: 50px;
        }

        .moveslider {
            left: 150px;
        }

        .form-section {
            height: 500px;
            width: 600px;
        }

        .form-section-move {
            left: -300px;
        }

        .login-box,
        .signup-box {
            height: 100%;
            width: 300px;
        }

        .ele {
            height: 50px;
            width: 250px;
            font-size: 15px;
        }

        .clkbtn {
            height: 50px;
            width: 130px;
            font-size: 19px;
        }
    }
   
    @media screen and (max-width: 320px) {
        .container {
            height: 600px;
            width: 250px;
        }

        .heading {
            font-size: 30px;
        }

        .title {
            font-size: 10px;
        }

        .btn {
            height: 50px;
            width: 200px;
            margin: 20px auto;
        }

        .login,
        .signup {
            font-size: 19px;
        }

        .slider {
            height: 50px;
            width: 100px;
            left: 27px;
        }

        .moveslider {
            left: 127px;
        }

        .form-section {
            height: 500px;
            width: 500px;
        }

        .form-section-move {
            left: -250px;
        }

        .login-box,
        .signup-box {
            height: 100%;
            width: 250px;
        }

        .ele {
            height: 50px;
            width: 220px;
            font-size: 15px;
        }

        .clkbtn {
            height: 50px;
            width: 130px;
            font-size: 19px;
        }
    }

    .footer {
        background-color: black;
        color: white;
        height: 40px;
        text-align: center;
        padding-top: 15px;
        width: 100%;
    }
</style>

<body>
    <nav>
        <!-- navbar  -->
        <ul>
            <li class="brand"><img src="photos/logo.png" alt="Spotify"> Spotify</li>
            <li><button style=" height: 33px; width: 73px; border-radius: 50px; background-color: #53ce53; font-size: 16px; border: none; cursor: pointer; margin-right: 15px;" onclick="gohome1()">Login</button></li>
        </ul>
    </nav>


    <?php
    if($showAlert){

        echo'
        <div class="alert" role="alert" style="background-color: green; width: 100%; text-align: center;height: 48px;
        margin-top: -24px; padding-top: 10px; font-size: 20px; padding-left: 380px;">
        <strong>Success!</strong>Your account is created successfully
        <button type="button" data-dismiss="alert" aria-label="Close" style="background: none;  border: none; font-size: 24px;
        padding-left: 450px;">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    if($showError){

        echo'
        <div class="alert" role="alert" style="background-color: #ce0d0d; width: 100%; text-align: center;height: 48px;
        margin-top: -24px; padding-top: 10px; font-size: 20px; padding-left: 380px;">
        <strong>Error!</strong>'.$showError.'
        <button type="button" data-dismiss="alert" aria-label="Close" style="background: none;  border: none; font-size: 24px;
        padding-left: 450px;>
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    ?>


    <header>
        <h3 class="title">SignUp Here</h3>
    </header>
    <!-- container div -->
    <div class="container">
        <div class="slider"></div>
        <div class="btn">
            <button class="signup">Sign Up</button>
        </div>


        <form action="sign.php" method="post">
        <div class="form-section">
            <div class="signup-box" id="signup">
                <label for="username"><h3>USERNAME:</h3>
                <input type="text" class="name ele" name="username"placeholder="Enter Username">
                </label>
                <label for="emailid"><h3>Email ID:</h3>
                    <input type="email" class="email ele" name="emailid" placeholder="(Email ID)">
                </label>
                <label for="password"><h3>Password:</h3>
                <input type="password" class="password ele" name="password"placeholder="password">
            </label>
            <label for="conformpass"><h3>Confirm Password:</h3>
            <input type="password" class="password ele" name="cpassword" placeholder="Re-enter your password">
        </label>
                <button class="clkbtn">Signup</button>
            </div>
        </div>
        </form>
    </div>

    <!-- Footer  -->
    <footer class="footer">
        <div class="copyright">
            copyright @Spotify Clone
        </div>
    </footer>

    <script>
        function gohome1(){
        window.location.href='login.php';
    }

        let signup = document.querySelector(".signup");
        let login = document.querySelector(".login");
        let slider = document.querySelector(".slider");
        let formSection = document.querySelector(".form-section");

        signup.addEventListener("click", () => {
            slider.classList.add("moveslider");
            formSection.classList.add("form-section-move");
        });

        login.addEventListener("click", () => {
            slider.classList.remove("moveslider");
            formSection.classList.remove("form-section-move");
        });

    </script>
</body>

</html>