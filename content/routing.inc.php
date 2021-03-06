<?
include_once 'get_url.php';

if(!$city && !$id){
    include 'mane-page.php';
}

if($city && $id == 'tours' && !$tours){
    switch($city) {
        case 'moscow': include 'moscow_tours_list.php'; break;
        case 'saint-petersburg': include 'spb_tours_list.php'; break;
        case 'san-francisco': include 'sf_tours_list.php'; break;
        case 'new-york': include 'newyork_tours_list.php'; break;
        case 'lisbon': include 'lisbon_tours_list.php'; break;
        case 'milan': include 'milan_tours_list.php'; break;
        case 'los-angeles': include 'la_tours_list.php'; break;
        case 'washington': include 'washington_tours_list.php'; break;
        case 'chicago': include 'chicago_tours_list.php'; break;
        case 'paris': include 'paris_tours_list.php'; break;
    }
}

if($id && !$tours && !$guides && !$thanks && !$city){
    switch($id){
        case 'about': include 'about.inc.php'; break;
        case 'contact': include 'contact.inc.php'; break;
    }
}

if($id == 'tours' && $tours && $thanks || $id == 'contact' && $thanks){
    include 'thanks.php';
}

if($city && $id == 'tours' && $tours && !$thanks){
        include 'tour_page_template.php';
}

if($city && $id == 'guides' && !$guides){
    switch($city) {
        case 'moscow': include 'guides_moscow.inc.php'; break;
        case 'saint-petersburg': include 'guides_spb.inc.php'; break;
    }

}

if($id == 'guides' && $guides){
    switch($guides){
        case 'alina': include 'guides/alina.inc.php'; break;
        case 'dasha': include 'guides/dasha.inc.php'; break;
        case 'anya': include 'guides/anya.inc.php'; break;
        case 'valery': include 'guides/valery.inc.php'; break;
        case 'gelena': include 'guides/gelena.inc.php'; break;
//        case 'angelina': include 'guides/angelina.inc.php'; break;
        case 'vera': include 'guides/vera.inc.php'; break;
        case 'karina': include 'guides/karina.inc.php'; break;
//        case 'anna': include 'guides/anna.inc.php'; break;
    }
}

if($id == 'sitemap'){
    include $_SERVER['DOCUMENT_ROOT'].'/sitemap.php';
}

if($id == 'main'){
    include 'main-page-two.php';
}
/*if($id == 'editor' && $city){
    include 'text-editor/text-editor.php';
}*/


if($blog || $id == 'blog'){
    include 'blog/index.php';
}