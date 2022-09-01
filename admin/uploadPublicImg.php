<?php
// echo "<pre>";print_r($_POST);
// print_r($_FILES);die;
    if(empty($_POST['id'])) return;
    $id = $_POST['id'];
	foreach ($_FILES["myFile"]["error"] as $key => $error) {
		if($error == 0) {
            $id = $id + $key;
            //公設最多10張圖片
            if($id > 10) return;
            $n = $_FILES["myFile"]["name"][$key];
            // var_dump($key);
            // $n = rand(0,9999999999999);
            // $name =$n.".jpg";
            $ext = pathinfo($_FILES["myFile"]["name"][$key], PATHINFO_EXTENSION);
            $file_name = date("YmdHis")."{$key}.{$ext}";
            $uploadPath = "update/" . $file_name;
            if(move_uploaded_file( $_FILES["myFile"]["tmp_name"][$key], $uploadPath)) {    
                echo "
                    <div class='publicImage'>                       
                        <input type='hidden' id='id".$id."' value='".$id."'>
                        <img src='".$uploadPath."'><br>
                        <input type='hidden' id='imgUrl".$id."' value='".$uploadPath."' class='imgleng'>
                        <input type='text' id='remark".$id."' placeholder='請輸入公設名稱'><br>
                        <input type='button' class='publicBtn' value='刪除圖片'>
                    </div>
                ";
            }
            
        }
	}
?>