<?php
    // include("layouts/link_header.php");
    include("connect.php");

    $title = $author = $short_content = $long_content = $date = "";
    if(isset($_POST["submit"])) {
                if(isset($_POST['title'])) $title = $_POST['title'];
                if(isset($_POST['author'])) $author = $_POST['author'];
                if(isset($_POST['short_content'])) $short_content = $_POST['short_content'];
                if(isset($_POST['long_content'])) $long_content = $_POST['long_content'];
                if(isset($_POST['date'])) $date = $_POST['date'];

                    $sql = "INSERT INTO news 
                                VALUES (null,'$title', '$author', '$short_content', '$long_content', '$date')";

                $result =  execute($sql);
                if($result) header("location: listNews.php");
                else echo "insert fail";
    }

?>

<!-- <body>
    <div id="header"> -->
        <?php include("admin.php")?>
    <!-- </div> -->
    <div id="content_create_news">
                <form method="POST">
                    <h3 style="text-align: center">Create News</h3>
                            <div class="form-group">
                                        <label>Enter Title</label>
                                        <input name="title" id="title" class="form-control" />
                            </div>
                            <div class="form-group">
                                        <label>Enter Author</label>
                                        <input name="author" id="author" class="form-control" />
                            </div>
                            <div class="form-group">
                                        <label>Enter Short Content</label>
                                        <textarea name="short_content" id="short_content" rows="10" class="form-control"></textarea>
   
                            </div>
                            <div class="form-group">
                                        <label>Enter Long Content</label>
                                        <textarea  name="long_content" id="long_content"  rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                        <label>Date</label>
                                        <input name="date" type="date" id="date"/>
                            </div>
                         <input type="submit" class="btn_primary" value="Create News" name="submit"/>

                </form>

    </div>

<div id="footer">
<?php include("layouts/footer.php")?>
</div>
</body>