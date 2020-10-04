<?php

session_start();
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "tuwaiq";

$con = mysqli_connect($host, $user, $password,$dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['username'], $_POST['password'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    //TODO: REMOVE DEVELOPER ACCESS, OTHER USERS IN DATABASE
    if ($username == "Developer" && $password == "Debug123"){
        die("SECRET:DELTA");
    } elseif ($username != "" && $password != ""){

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result) != 0){
            die("Welcome! SECRET:ALPHA");
            //TOTO: print name of username
        }else{
            die("Invalid username and password");
        }
    }

}
?>

<html>
    <head>
        <title>TuwaiqCMS Login</title>
        <style>
        .container{
            width:40%;
            margin:0 auto;
        }

        #div_login{
            border: 1px solid gray;
            border-radius: 3px;
            width: 470px;
            height: 270px;
            margin: 0 auto;
        }

        #div_login h1{
            margin-top: 0px;
            font-weight: normal;
            padding: 10px;
            background-color: #0074D9;
            color: white;
            font-family: sans-serif;
        }

        #div_login div{
            clear: both;
            margin-top: 10px;
            padding: 5px;
        }

        #div_login .textbox{
            width: 96%;
            padding: 7px;
        }

        #.container p{
            text-align: center;
        }

        #div_login input[type=submit]{
            padding: 7px;
            width: 100px;
            background-color: #001f3f;
            border: 0px;
            color: white;
        }
        </style>
    </head>
    <body>
    <div class="container">
        <form method="post" action="">
            <div id="div_login">
                <h1>Login</h1>
                <div>
                    <input type="text" class="textbox" id="username" name="username" placeholder="Username" />
                </div>
                <div>
                    <input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
                </div>
                <div>
                    <input type="submit" value="Submit" name="submit" id="but_submit" />
                </div>
            </div>
        </form>
        <p>Powered By TuwaiqCMS</p>
        <!-- SECRET:ETA -->
    </div>
    </body>
</html>
