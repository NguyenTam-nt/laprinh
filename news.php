<?php 
include("layouts/link_header.php");
include("connect.php");

$sql = "SELECT * FROM news";
$data = LoadData($sql);
 ?>
<body>
	<div id="header">
		<?php include("layouts/nav_link.php") ?>
	</div>
	<div id="contents">
		<div class="main">
			<h1>News</h1>
			<ul class="news">
				<?php 
					foreach($data as $item) {
							echo "
							<li>
							<div class='date'>
								<p>
									<span>".date('m', strtotime($item['create_day']))."</span>
									".date('y', strtotime($item['create_day']))."
								</p>
							</div>
							<h2>".$item['title']."<span>".$item['author']."</span></h2>
							<p>
								".$item['short_content']." <span><a href='post.php?_new=".$item['id_news']."' class='more'>Read More</a></span>
							</p>
						</li>					
							";

					}			
				?>
			</ul>
		</div>
		<div class="sidebar">
			<h1>Popular Posts</h1>
			<ul class="posts">
				<li>
					<h4 class="title"><a href="post.php">Making It Work</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
				<li>
					<h4 class="title"><a href="post.php">Designs and Concepts</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
				<li>
					<h4 class="title"><a href="post.php">Getting It Done!</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
<?php  include("layouts/footer.php")?>
	
	</div>
</body>
</html>