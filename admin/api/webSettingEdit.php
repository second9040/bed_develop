<?php
    require_once __DIR__."/../php/DB.class.php";
    $db = new DB;
    $db->query("UPDATE `{$db->prefix}_web_setting` SET `title` = :title, `owner` = :owner, `copyright` = :copyright, `url` = :url, `description` = :description, `keywords` = :keywords WHERE `id` = 1" );
    $db->bind(':title', $_POST['title']);
    $db->bind(':owner', $_POST['owner']);
    $db->bind(':copyright', $_POST['copyright']);
    $db->bind(':url', $_POST['url']);
    $db->bind(':description', $_POST['description']);
    $db->bind(':keywords', $_POST['keywords']);
    $db->execute();
    echo json_encode(['status' => 0, 'data' => 'Success']);
?>

