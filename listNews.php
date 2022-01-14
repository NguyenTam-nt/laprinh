<?php include("admin.php") ?>

        <div id="contents_admin">
            <?php 
                        include("connect.php");
                        $sql ="SELECT * FROM news ORDER BY create_day DESC";
                        $list_news = LoadData($sql, true);
            ?>
            <div>
                <table> 
                    <thead>
                        <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Short Content</th>
                                <th>Long Conent</th>
                                <th>Date</th>
                                <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                            <?php
                            foreach($list_news as $item) {
                                    echo"
                                    <tr id=".'row_'.$item['id_news'].">
                                            <td>".$item['title']."</td>
                                            <td>".$item['author']."</td>
                                            <td>".$item['short_content']."</td>
                                            <td>".$item['long_content']."</td>
                                            <td>".$item['create_day']."</td>";     
                                                echo "
                                                <td><a href='Update_news.php?_id=".$item['id_news']."' class='button success'>Update</a> <button  class='button danger' onclick='deleteNews(".$item['id_news'].")'>Delete</button></td>                      
                            
                                                ";
                                            echo "</tr>";
                                        
                            }
                                ?>
                                </tbody>
                </table>
            </div>

        </div>
    
            <div id="footer">
                 <?php include("layouts/footer.php") ?>

            </div>

            <div class="modal_handle_contact">
                              
            </div>
            <div class="dialog_handle">
                                            <h4>Bạn có chăc chắn muốn xoá hay không?</h4>
                                            <div  class="dialog_handle_btn">
                                                <button class="btn1 btn-success" onclick="excuteNews()">Xoá</button>
                                                <button class="btn1 btn-primary" onclick="closeDialog()">Huỷ</button>
                                            </div>
                </div>
    </body>
