<?php
    include("layouts/link_header.php");
    include("connect.php");
    if(isset($_GET['_id'])) {
            $id = $_GET['_id'];
            $sql = "SELECT * FROM news WHERE id_news = '$id'";
        $data = LoadData($sql, false);
    }

    $title = $author = $short_content = $long_content = $date = "";
    if(isset($_POST["submit"])) {
                if(isset($_POST['title'])) $title = $_POST['title'];
                if(isset($_POST['author'])) $author = $_POST['author'];
                if(isset($_POST['short_content'])) $short_content = $_POST['short_content'];
                if(isset($_POST['long_content'])) $long_content = $_POST['long_content'];
                if(isset($_POST['date'])) $date = $_POST['date'];
                    $id = $data['id_news'];
                    $sql = "UPDATE news SET title = '$title', author = '$author', short_content='$short_content', long_content='$long_content' , create_day='$date' where id_news = '$id' ";

                $result =  execute($sql);
                if($result) header("location: listNews.php");
                else echo "insert fail";
    }

?>

<body>
    <div id="header">
        <?php include("layouts/nav_link.php")?>
    </div>
    <div id="content_create_news">
                <form method="POST">
                    <h3 style="text-align: center">Create News</h3>
                            <div class="form-group">
                                        <label>Enter Title</label>
                                        <input name="title" value=<?= $data["title"]?> id="title" class="form-control" />
                            </div>
                            <div class="form-group">
                                        <label>Enter Author</label>
                                        <input name="author" value=<?= $data["author"]?> id="author" class="form-control" />
                            </div>
                            <div class="form-group">
                                        <label>Enter Short Content</label>
                                        <textarea name="short_content"   id="short_content" rows="10" class="form-control"><?= $data["short_content"]?></textarea>
   
                            </div>
                            <div class="form-group">
                                        <label>Enter Long Content</label>
                                        <textarea  name="long_content" id="long_content"   rows="10" class="form-control"><?= $data["long_content"]?></textarea>
                            </div>
                            <div class="form-group">
                                        <label>Date</label>
                                        <input name="date" type="date"  value=<?= $data["create_day"]?> id="date"/>
                            </div>
                         <input type="submit" class="btn_primary" value="Save" name="submit"/>

                </form>

    </div>

<div id="footer">
<?php include("layouts/footer.php")?>
</div>
</body>