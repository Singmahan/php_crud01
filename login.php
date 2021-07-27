<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>login</title>
</head>

<body>
    <?php
        
        include('connect.php');

        if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $password = $conn->real_escape_string($_POST['password']);

            $sql = "SELECT * FROM member WHERE username ='$username' AND password ='$password'";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];

                header("Location: index.php");
            }else{
                echo "faild";
            }

        }
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    <h1 class="text-center">Please sign in</h1>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" class="form-control" placeholder="Username" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" class="form-control" placeholder="Password" required>
                    </div><br>
                    <div class="form-group">
                        <button type="submit" class="w-100 btn btn-lg btn-primary" >Login</button>
                    </div><br>
                    <div class="form-group">
                        <p class="text-center">&copy; 2021</p>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</body>

</html>