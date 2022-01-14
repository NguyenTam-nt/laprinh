<?php  include("layouts/link_header.php");
include("connect.php");
$new = $_GET['_new'];

$sql = "SELECT * FROM news where id_news = '$new'";
$data = LoadData($sql, false);

?>
<body>
	<div id="header">
<?php  include("layouts/nav_link.php")?>
		
	</div>
	<div id="contents">
		<div class="post">
			<div class="date">
				<p>
					<span><?= date('m', strtotime($data['create_day']))?></span>
					<?= date('y', strtotime($data['create_day']))?>
				</p>
			</div>
			<h1><?= $data['title']?> <span class="author"><?= $data['author']?></span></h1>
			<p>
			<?= $data['short_content']?>
			</p>
			<p>
			<?= $data['long_content']?>
			
			</p>
			<span><a href="news.php" class="more">Back to News</a></span>
		</div>
	</div>
	<div id="footer">
	<?php  include("layouts/nav_link.php")?>
	</div>
</body>
</html>