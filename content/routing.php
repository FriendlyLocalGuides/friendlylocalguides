<?
include_once 'get_url.php';

if($id == 'editor' && !$city){
    include 'text-editor/tour-editor-index.php';
}

if($id == 'editor' && $city){
    include 'text-editor/text-editor.php';
}
