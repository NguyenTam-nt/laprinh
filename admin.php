

<?php
session_start();
if(!isset($_SESSION['user'])) {
    header("location: login.php");
}
    include("layouts/link_header.php");
?>

<body>
    <div id="header">
        <?php include("layouts/nav_link.php")?>
    </div>
    <div class="link_group">
        <a href="__contact_admin.php" class="link">Xem Contact</a>
        <a href="listNews.php" class="link">Xem News</a>
        <a href="create_news.php" class="link">Thêm News</a>
    
        
        

    </div>

</body>