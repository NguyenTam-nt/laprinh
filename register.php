<?php include("layouts/link_header.php") ?>
<body>
            <div id="header">
                <?php include("layouts/nav_link.php") ;
                        include("connect.php");
                        $msg = "";
                        if(isset($_POST["submit"])) {
                                $name = isset($_POST['name']) ? $_POST["name"] : "";
                                $email = isset($_POST['email']) ? $_POST["email"] : "";
                                $password = isset($_POST['password']) ? $_POST["password"] : "";
                                $repassword = isset($_POST['repassword']) ? $_POST["repassword"] : "";

                                if($name == '' || $email == '' || $password == '' || $repassword == '') {
                                        $msg = "vui lòng nhập đầy đủ các trường...";
                                }else {
                                        if($password != $repassword) {
                                                $msg = "Confirm password không hợp lệ...";
                                        }else {
                                                $sql = "SELECT * FROM users where  email = '$email'";
                                                $data = LoadData($sql, false);
                
                                                if(empty($data)) {
                                                $sql = "INSERT INTO users values(null, '$name', '$password', '$email')";
                                                                $run = execute($sql);
                                                                if($run) {
                                                                        header("location: login.php");
                                                                }else {
                                                                        $msg = "Lỗi đường truyền...";
                                                                }
                                                }else{
                                                        $msg = "Email này đã được đăng ký, vui lòng nhập lại...";
                                                }
                                        }
                                }
                        }
                
                ?>
            </div>
                    <div class="register_page">
                            <form method="POST">
                                    <h2>Resgister</h2>
                                    <div class="form-group">
                                                       <label for="name">Enter username</label>
                                                       <input type="text" name="name" id="name" class="form-control" />     
                                    </div>
                                    <div class="form-group">
                                                       <label for="email">Entet Email</label>
                                                       <input type="email" name="email" id="email" class="form-control"  />     
                                    </div>
                                    <div class="form-group">
                                                     <label for="password">Enter Password</label>
                                                    <input type="password" name="password" id="password" class="form-control" />     
                                    </div>
                                    <div class="form-group">
                                                     <label for="repassword">Enter Confirm Password</label>
                                                    <input type="password" name="repassword" id="repassword" class="form-control" />     
                                    </div>
                                    <input type="submit" value="Sign Up" class="btn-primary" name="submit">
                                    <span class="msg"><?= $msg?></span>
                            </form>

                    </div>
        <div id="footer">
                <?php include("layouts/footer.php") ?>

        </div>
</body>
</html>