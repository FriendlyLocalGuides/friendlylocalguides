<?
include_once 'get_url.php';

if(!$id){
    include 'mane-page.php';
}

if($city && !$id){
    switch($city) {
        case 'moscow': include 'moscow-page.php'; break;
        case 'saintpetersburg': include 'saintpetersburg-page.php'; break;
    }
}

if($city && !$tours && !$guides && !$thanks){
    switch($id){
        case 'guides': include 'guides.inc.php'; break;
        case 'tours': include 'tours.inc.php'; break;
        case 'about': include 'about.inc.php'; break;
        case 'contact': include 'contact.inc.php'; break;
    }
}

if($id == 'tours' && $tours && $thanks || $id == 'contact' && $thanks){
    include 'thanks.php';
}

if($id == 'tours' && $tours && !$thanks){
//    switch($tours){
        include 'tour_page_template.php';
        /*case 'free-tour': include 'tours/free_tour.inc.php'; break;
        case 'red-square-and-kremlin': include 'tours/rsk.inc.php'; break;
        case 'red-square-and-the-city': include 'tours/red_square_and_the_city.inc.php'; break;
        case 'going-out-in-moscow': include 'tours/going_out_in_moscow.inc.php'; break;
        case 'izmailovo': include 'tours/izmailovo.inc.php'; break;
        case '10-hours-in-moscow': include 'tours/10_hours_in_moscow.inc.php'; break;
        case '2-days-in-moscow': include 'tours/2_days_in_moscow.inc.php'; break;
        case '3-days-in-moscow': include 'tours/3_days_in_moscow.inc.php'; break;
        case 'moscow-at-night': include 'tours/moscow_at_night.inc.php'; break;
        case 'airport-pickup-in-moscow': include 'tours/airport_pickup_in_moscow.inc.php'; break;
        case 'russia-in-cold-war': include 'tours/russia_in_cold_war.inc.php'; break;
        case 'communist-russia': include 'tours/communist_russia.inc.php'; break;
        case 'photo-tour-of-moscow': include 'tours/photo_tour.inc.php'; break;
        case 'bike-tour-in-moscow': include 'tours/bike_tour.inc.php'; break;*/
//    }
}

if($id == 'guides' && $guides){
    switch($guides){
        case 'alina': include 'guides/alina.inc.php'; break;
        case 'monika': include 'guides/monika.inc.php'; break;
        case 'sasha': include 'guides/sasha.inc.php'; break;
        case 'stas': include 'guides/stas.inc.php'; break;
        case 'ksusha': include 'guides/ksusha.inc.php'; break;
        case 'katia': include 'guides/katia.inc.php'; break;
        case 'dasha': include 'guides/dasha.inc.php'; break;
        //case 'masha': include 'guides/masha.inc.php'; break;
    }
}


if($blog || $id == 'blog'){
    include 'blog/index.php';
}