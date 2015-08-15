<?
include_once 'get_url.php';

if(!$city && !$id){
    include 'mane-page.php';
}

if($city && $id == 'tours' && !$tours){
    switch($city) {
        case 'moscow': include 'tours_moscow.inc.php'; break;
        case 'saint-petersburg': include 'tours_spb.inc.php'; break;
    }
}

if($id && !$tours && !$guides && !$thanks){
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
        case 'inna': include 'guides/inna.inc.php'; break;
        case 'anya': include 'guides/anya.inc.php'; break;
        case 'katya': include 'guides/katya.inc.php'; break;
        case 'valery': include 'guides/valery.inc.php'; break;
    }
}

if($blog || $id == 'blog'){
    include 'blog/index.php';
}