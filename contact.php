<?php
session_start();
include("layouts/link_header.php") ?>
<body>
	<div id="header">
		<?php include("layouts/nav_link.php") ?>
	</div>
	<div id="contents">
		<div class="section">
			<h1>Contact</h1>
			<p>
				You can replace all this text with your own text. Want an easier solution for a Free Website? Head straight to Wix and immediately start customizing your website! Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. All Wix templates are fully customizable and free to use. Just pick one you like, click Edit, and enter the online editor.
			</p>
			<?php
				include('connect.php');
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
						$sql = "INSERT INTO contact(name, email, sub, content) VALUES ('$name', '$email', '$sub', '$content')";
							$run = execute($sql);
							if($run) {

								$_SESSION["user"] = $name;
								header("location: __contact_admin.php");
							}					
							else           $msg = "Đăng ký thất bại, vui lòng đăng ký lại";
					}
					
				}
			?>
			<form method="post" class="message">
				<input type="text" name="txtname" placeholder="enter your name..." onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="txtemail"  placeholder="enter your email..." onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" name="txtsub"  placeholder="enter subject..." onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<textarea name="txtcontent" placeholder="enter note..."></textarea>
				<span><?= $msg?></span>
				<input type="submit" name="sub_send" value="Send"/>
			</form>
		
		</div>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>877-433-8137</span>
			</p>
			<p>
				Or you can visit us at: <span>ZeroType<br> 250 Business ParK Angel Green, Sunville 109935</span>
			</p>
		</div>
	</div>
	<div id="footer">
		<?php
		include("layouts/footer.php")
		
		?>
	</div>
</body>
</html>