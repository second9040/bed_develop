<?php
    require_once __DIR__."/../php/DB.class.php";
    $db = new DB;
    $db->query("UPDATE `{$db->prefix}_company` SET `company` = :company, `email` = :email, `tel` = :tel, `fax` = :fax, `address` = :address, `facebook` = :facebook, `line` = :line WHERE `id` = 1" );
    $db->bind(':company', $_POST['company']);
    $db->bind(':email', $_POST['email']);
    $db->bind(':tel', $_POST['tel']);
    $db->bind(':fax', $_POST['fax']);
    $db->bind(':address', $_POST['address']);
    $db->bind(':facebook', $_POST['facebook']);
    $db->bind(':line', $_POST['line']);
    $db->execute();
    echo json_encode(['status' => 0, 'data' => 'Success']);
?>

