<?php
include_once '/srv/http/helpers/wrapper.php';
include_once '/srv/http/helpers/songFunctions.php';
require_once '/srv/http/helpers/displayMessage.php';
if($_SESSION['admin']) { 
    $link;
    $name;
    $notes;
    foreach($_POST as $first => $second){
        if(is_int($first)){
            switch($second) {
            case 'name':
                changeName($name, $first);
                displayPopupNotification('Changed song name to ' . $name . '.', '/admin/songs');
                break;
            case 'link':
                changeLink($link, $first);
                displayPopupNotification('Changed song link to ' . $link . '.', '/admin/songs');
                break;
            case 'notes':
                changeNotes($notes, $first);
                displayPopupNotification('Changed song notes to ' . $notes . '.', '/admin/songs');
                break;
            default:
                displayPopupNotification('An unknown error occurred, please try again.');
            }
        } else if($first=='name'){
            $name=$second;
        } else if($first=='link'){
            $link=$second;
        } else {
            $notes = $second;
        }
    }
} else {
    notLoggedIn();
}