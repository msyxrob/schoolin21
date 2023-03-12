<?php 
	$select = "select * from ".$who." where login = '$login' and password = '$password'";
	$run = mysqli_fetch_assoc(mysqli_query($con, $select));
		$id = $run['id'];
        $name = $run['name'];
		$surname = $run['surname'];
		$img = $run['img'];
		$number = $run['phone'];
 ?>
             <div class="profile-box2">
                    <div class="profile-text">
                        <form method="post"  enctype="multipart/form-data">
                           <center>
                                <h2>Ном :</h2>
                                <textarea name="name" maxlength="20"><?php echo $name; ?></textarea>
                                <h2>Насаб :</h2>
                                <textarea name="surname" maxlength="20"><?php echo $surname; ?></textarea>
                                <h2>Рақами телефон :</h2>
                                <input name="number" value="<?php echo $number; ?>"><br>
                                <h2>Cурататонро дигар намоед!!!</h2>
                                <input type="file" name="img">
                                <br />
                            	<br />
                                <button class="btn btn-success" type="submit" name="add">Отправить</button>
                            </center>
                        </form>
                    </div>
       		</div>
<?php 
    if (isset($_POST['add'])) {
        
                        $ed_img = $_FILES['img']['name'];

                        $tmp_name = $_FILES['img']['tmp_name'];
                  
                        move_uploaded_file($tmp_name, "uploaders/$ed_img");

                        $ed_name = $_POST['name'];
                        
                        $ed_surname = $_POST['surname'];
                        
                        $ed_number = $_POST['number'];

                        $insert = "update ".$who." set name = '$ed_name', surname = '$ed_surname', phone = '$ed_number', img = '$ed_img' where id = '$id'";
                        $run_ed = mysqli_query($con, $insert);
                        if ($run_ed) {
                            echo "<script>window.open('index.php?dashboard','_self')</script>";                  
                        } 
    }
 ?>
			
						
			
            