<?
include_once 'get_url.php';

if($id == 'editor' && $city && $tour){
    include 'text-editor/text-editor.php';
}

if($id == 'editor' && $city && !$tour){
    include 'text-editor/tour-editor-index.php';
}

if($id == 'admin' && !$city){
    include $_SERVER['DOCUMENT_ROOT'].'/admin/admin.php';
}