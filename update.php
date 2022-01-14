<?php include("layouts/link_header.php") ;
    include("connect.php");
    if(isset($_GET['_id'])) {
            $id = $_GET['_id'];
            $sql = "SELECT * FROM contact WHERE id_contact = '$id'";
        $data = LoadData($sql, false);
    }

?>

    <body>
    <div id="header">
        <?php include("layouts/nav_link.php") ?>
        <?php
				$name = $email = $sub = $content = $msg = "";
				if(isset($_POST['sub_send']))
				{
					if($_POST["txtname"]) $name = $_POST["txtname"];
					if($_POST["txtemail"]) $email = $_POST["txtemail"];
					if($_POST["txtsub"]) $sub = $_POST["txtsub"];
					if($_POST["txtcontent"]) $content = $_POST["txtcontent"];

					if($name == "" || $email == "" || $sub == "" || $content == "") {
							$msg = "Vui lòng nhập đủ các trường";
					}else {
                        $id = $data['id_contact'];
						$sql = "UPDATE contact SET name = '$name', email='$email', sub='$sub', content = '$content' where id_contact = '$id'";
							$run = execute($sql);
                            echo $run;
							if($run) {
								header("location: __contact_admin.php");
							}					
							else           $msg = "Đăng ký thất bại, vui lòng đăng ký lại";
					}
					
				}
			?>
    </div>
    <div id="contents">
        <div class="section">
            <form method="post" class="message">
                        <input type="text" name="txtname" value=<?= $data["name"]?> placeholder="enter your name..."/>
                        <input type="text" name="txtemail" value=<?= $data["email"]?>  placeholder="enter your email..."/>
                        <input type="text" name="txtsub" value=<?= $data["sub"]?>  placeholder="enter subject..." />
                        <textarea name="txtcontent"  placeholder="enter note..."><?= $data["content"]?></textarea>
                        <input type="submit" name="sub_send" value="Save"/>
                    </form>
        </div>
    </div>

    <div id="footer">
        <?php include("layouts/footer.php") ?>
    </div>

    </body>









