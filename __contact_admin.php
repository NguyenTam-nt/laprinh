<?php include("admin.php") ?>
        <div id="contents_admin">
            <?php 
                        include("connect.php");
                        $sql ="SELECT * FROM contact ORDER BY authority DESC";
                        $list_contact = LoadData($sql, true);
            ?>
            <div>
                <table> 
                    <thead>
                        <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Content</th>
                                <th>Authority</th>
                                <th>Action</th>
                        </tr>

                    </thead>
                    <tbody>
                            <?php
                            foreach($list_contact as $item) {
                                    echo"
                                    <tr id=".'row_'.$item['id_contact'].">
                                            <td>".$item['name']."</td>
                                            <td>".$item['email']."</td>
                                            <td>".$item['sub']."</td>
                                            <td>".$item['content']."</td>
                                            <td>".$item['authority']."</td>";     
                                                echo "
                                                <td><a href='update.php?_id=".$item['id_contact']."' class='button success'>Update</a> <button  class='button danger' onclick='deleteUser(".$item['id_contact'].")'>Delete</button></td>                                          
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
                                                <button class="btn1 btn-success" onclick="excute()">Xoá</button>
                                                <button class="btn1 btn-primary" onclick="closeDialog()">Huỷ</button>
                                            </div>
                </div>
    </body>
