<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // require 'path/to/PHPMailer/src/Exception.php';
    // require 'path/to/PHPMailer/src/PHPMailer.php';
    // require 'path/to/PHPMailer/src/SMTP.php';

 require 'vendor/autoload.php';
 $mail = new PHPMailer(true);
include("layouts/link_header.php");
?>
<body>
            <div id="header">
                <?php include("layouts/nav_link.php") ;
                    include("connect.php");
            
                    $msg = "";
                    $color = "red";
                    if(isset($_POST["submit"])) {
                            $email = $_POST['email'];
                            $sql = "SELECT * FROM users WHERE email = '$email'";
                            $user = LoadData($sql, false);

                            if(!empty($user)) {
                                $password = $user['password'];
                                $id = $user['id'];
                                $sql = "UPDATE users SET password = '$password' WHERE id = '$id'";
                                execute($sql); 
                                header("location: login.php") ;            
                                try {
                                    $msg = "Refresh password thành công, vui lòng kiểm tra lại email của bạn...";
                                    $color = "#cddc39";
                                    $mail->SMTPDebug = 2;                      
                                    $mail->isSMTP();                                        
                                    $mail->Host       = 'smtp.gmail.com';                     
                                    $mail->SMTPAuth   = true;                                   
                                    $mail->Username   = 'tam253199@gmail.com';                   
                                    $mail->Password   = '01672526147Tam';                         
                                    $mail->SMTPSecure ="tls";            
                                    $mail->Port       = 587;                                    
                                    $mail->CharSet       = "UTF-8";                               
                                
                                    
                                    //vannt2368@gmail.com
                                    $mail->setFrom('tam253199@gmail.com');
                                    $mail->addAddress($email);              
                        
                                                     
                                    $mail->isHTML(true);                                  
                                    $mail->Subject = 'Refresh password';
                                    $mail->Body    = 'Password của bạn là: '.$password;
                               
                                
                                    $mail->send();
                                }catch(Exception $e) {
                                  
                                }
                                   
                                   
                            }else {
                                $msg = "Email này không tồn tại";
                                $color = "red";
                            }
                    }         
                ?>
            </div>
                    <div class="login_page refresh_page">
                            <form method="POST">
                                    <div class="form-group">
                                                     <label for="email">Enter email</label>
                                                    <input type="email" name="email" id="email" class="form-control" />     
                                    </div>
                                    <div class="form-group_link">

                                        <input type="submit" value="Get password" class="btn-primary" name="submit">
                                        <span style='color: <?=$color?>'><?= $msg?></span>

                                    </div>
                            </form>

                    </div>
                    <span style="color: #999">Sau khi  refresh password thành công, vui lòng kiểm tra lại email của bạn...</span>
    <div id="footer">
        <?php include("layouts/footer.php") ?>

    </div>
</body>
</html>