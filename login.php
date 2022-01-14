<?php 
    session_start();
include("layouts/link_header.php") ?>
<body>
            <div id="header">
                <?php include("layouts/nav_link.php") ;
                    include("connect.php");

                    $msg = "";
                    if(isset($_POST["submit"])) {
                            $name = $_POST['name'];
                            $password = $_POST['password'];
                            $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$password'";
                            $user = LoadData($sql, false);

                            if($user) {
                                $_SESSION['user']  = $name;
                                    header("location: admin.php");
                            }else {
                                $msg = "vui lòng login lại";
                            }
                    }         
                ?>
            </div>
                    <div class="login_page">
                            <form method="POST">
                                <h2 style="text-align: center">LOGIN</h2>
                                    <div class="form-group">
                                                       <label for="name">Enter username</label>
                                                       <input type="text" name="name" id="name" class="form-control" />     
                                    </div>
                                    <div class="form-group">
                                                     <label for="password">Enter password</label>
                                                    <input type="password" name="password" id="password" class="form-control" />     
                                    </div>
                                    <div  class="form-group_link">
                                            <a href="register.php">Create a account</a>
                                            <a href="forGotPassword.php">Forgot password</a>
                                    </div>
                                    <input type="submit" value="Login" class="btn-primary" name="submit">
                                    <span><?= $msg?></span>
                            </form>

                    </div>
    <div id="footer">
        <?php include("layouts/footer.php") ?>

    </div>
</body>
</html>