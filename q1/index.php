<?php
    require_once ('connection.php');
?>

<html>

<head>
    <title>Auction - Log In/Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sulphur+Point:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/master.css">
</head>

<body class="entirePage">
    <div class="jumbotron"></div>
    <div class="row">
        <div class="col col-1"></div>
        <div class="col col-6">
            <!--Sign up Starts Here -->
            <center>
                <h1>Sign Up</h1>
            </center>
            <form action="#" method="post">
                <center>
                    <div class="md-form">
                        <input required type="text" name="FirstName" placeholder="First Name">
                        <input required type="text" name="LastName" placeholder="Last Name">
                        <br><br>
                        <input required type="text" name="username" placeholder="Username">
                        <input required type="password" name="password" placeholder="Your Password" >
                        <br><br>
                        <input type="submit" value="Sign Up" class="btn btn-primary" name = 'signUp'>
                    </div>
                </center>
            </form>
        </div>
        <div class="col col-1" style="border-right: 1px solid #7070702F"></div>
        <div class="col col-1"></div>
        <div class="col col-2">
            <!--Login Starts Here -->
            <center>
                <h1>Log In</h1>
                <form action="#" method="post">
                    <div class="md-form">
                        <input required type="text" name="username" placeholder="Username">
                        <br><br>
                        <input required type="password" name="password" placeholder="Your Password">
                        <br><br>
                        <input type="submit" name='login' value="Log In" class="btn btn-primary" style="float: right;">
                    </div>
                </form>
            </center>
        </div>
    </div>
</body>

</html>

<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
        $result = $conn->query($query);
        $rows = $result->num_rows;
        if($rows == 1){
            header("location:posting_item.php");
        }else{
            echo "<br><br><center>Please Double Check your Credential</center>";
        }
    }
    if(isset($_POST['signUp'])){
        $user_first_name = $_POST['FirstName'];
        $user_last_name = $_POST['LastName'];
        $name = $user_first_name . " " . $user_last_name;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "INSERT INTO `users` (`name`, `username`, `password`) VALUES ('$name' ,'$username', '$password'); ";
        $result = $conn->query($query);
        if(!$result){
            echo '<br><br><center>We Encountered a Problem, please try again</center>';
        }else{
            $query = "SELECT * FROM `auction_user` WHERE `user_email` = '$email'";
            $result = $conn->query($query);
            $rows = $result->num_rows;
            if($rows == 1){
                while ($data = $result->fetch_assoc())
                    $userID =   $data['user_id'];
            }
            header('location:posting_item.php');
        }
    }
    
?>