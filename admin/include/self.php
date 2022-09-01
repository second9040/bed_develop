<?php
     $file_path = $_SERVER['PHP_SELF'];
     $file_name = basename($file_path,".php");  
     switch($file_name){
        case 'company':
            $page_index = 1;
            break;     
        case 'gtm':
            $page_index = 2;
            break;
        case 'basicsetting':
            $page_index = 3;
            break;   
        case 'member':
            $page_index = 6;
            break;
        case 'about':
            $page_index = 7;
            break;      
        case 'product':
        case 'product_add':
        case 'product_modify':
            $page_index = 9;
            break;      
        case 'contact':
        case 'contact_view':
            $page_index = 12;
            break;
        // case 'myLineJoin':
        //     $page_index = 13;
        //     break;
        // case 'lineGearing':
        //     $page_index = 14;
        //     break;  
        case 'team':
        case 'team_add':
        case 'team_modify':
            $page_index = 21;
            break;       
        default:
            $page_index = 0 ;
            break;
     }
?>

