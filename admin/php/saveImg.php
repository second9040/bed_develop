<?php
    /*  base64格式編碼轉換為圖片並儲存對應資料夾 */
    function base64_image_content($name, $base64, $path=""){
        //匹配出圖片的格式
        $res = preg_match('/^(data:\s*image\/(.+);base64,)/', $base64, $result);
        if ($res){
            $type = $result[2];
            if(!empty($path) && !file_exists($path)){
                //檢查是否有該資料夾，如果沒有就建立，並給予最高許可權
                mkdir($path, 0777);
            }
            switch ($type) {
                case 'jpeg':
                    $type = 'jpg';
                    break;
                case 'svg+xml':
                    $type = 'svg';
                    break;
                default:
                    break;
            }
            $folder = parse_ini_string(file_get_contents("../../php/folder.php"), true, INI_SCANNER_RAW)["FOLDER"]["folder"];
            $file_name = date("YmdHis").$name;
            $path = $path.$file_name.".{$type}";
            if (file_put_contents("../../img/".$path, base64_decode(str_replace($result[1], '', $base64)))){
                return $path;
            }else{
                return false;
            }
        }else{
            //DB只存圖片名 不存路徑 
            return str_replace("../img/", "", $base64);
        }
    }
?>