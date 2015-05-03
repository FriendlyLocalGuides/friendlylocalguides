<?
    include_once 'get_url.php';

    $title = "Moscow Tours - Guided City Tours of Moscow with Friendly Local Guides";
    $meta = "Private tours of Moscow with friendly guides: Kremlin, Red Square, Russian history & culture, must visit places and sightseeing routes. Discover Moscow through the eyes of locals.";

    if(!$tours && !$guides){
        switch($id){
            case 'tours':
                $title = 'Tours: Moscow tours | Friendly Local Guides';
                $meta = "Friendly Local Guides offers Moscow flexible tours starting from 87$, Red Square & Kremlin tours, 1, 2, 3 day tours, Airport Pickup, Photo and Bike tours";
                break;
            case 'guides':
                $title = "Guides | Friendly Local Guides";
                $meta = "Friendly Local Guides are the most friendly and open people in Moscow. They are excited to meet you and show you Russian local life as it is. They smile, take photos with you and treat you as their friend.";
                break;
            case 'reviews':
                $title = "Reviews";
                $meta = "Friendly Local Guides is an excellent companion. She's extremely fun, flexible and versatile and knows Moscow like the back of her hand.";
                break;
            case 'about':
                $title = "About | Friendly Local Guides";
                $meta = "We are young, energetic ladies and we are your friends in Moscow. Friendly, Fun and Flexible!.. this is about us.";
                break;
            case 'contact':
                $title = "Contact | Friendly Local Guides";
                $meta = "Get in touch with us. We'd love to hear from you! Feel free to ask us any questions on our Facebook and Google+ pages";
                break;
        }
    }

    if($id == 'tours' && $tours){
        switch($tours){
            case 'free-tour':
                $title = "Moscow Free Walking Tour: Red Square, Alexander Garden, Christ the Savior Cathedral - Friendly Local Guides";
                $meta = "A free 2-hour sightseeing walking tour in Moscow! Roam through the heart of Moscow with Friendly Local Guides.";
                break;
            case 'kremlin-tour-moscow':
                $title = "Moscow Red Square and Kremlin Tour | Friendly Local Guides";
                $meta = "Book a 5-hour Kremlin tour with us and admire lovely St. Basil's Cathedral at Red Square, explore Tsar Bell & Cannon, visit the Armory.";
                break;
            case 'red-square-and-city-tour-moscow':
                $title = "Red Square and the City | Friendly Local Guides";
                $meta = "Explore Red Square, grand Christ the Savior Cathedral, marvel at the stunning views of the Kremlin, learn about Russian culture.";
                break;
            case 'going-out-in-moscow':
                $title = "Going Out in Moscow | Friendly Local Guides";
                $meta = "Indulge in an authentic Russian experience, meet locals in their most fun environment, + excellent range of cafes, restaurants, bars, clubs.";
                break;
            case 'izmailovo-kremlin-tour':
                $title = "Izmailovo Flea Market and Kremlin in Izmailovo | Friendly Local Guides";
                $meta = "Book this tour for only 87$ and immerse yourself in the unique culture of Russia + Great value souvenirs, Tsar’s palace & Russian vodka.";
                break;
            case 'top-20-must-see-in-moscow':
                $title = "10 Hours in Moscow with a Friendly | Friendly Local Guides";
                $meta = "Discover 15 Must-Dos Of Moscow In 1 Day, including Red Square, the Kremlin, Tsaritsino, Victory Park and other top things to do in Moscow.";
                break;
            case '2-days-in-moscow':
                $title = "2 days in Moscow with a Friendly Guide | Friendly Local Guides";
                $meta = "Get to know the giant Moscow, Russian history and culture, old and modern, touristy and off the beaten path, including Cold War museum.";
                break;
            case '3-days-in-moscow':
                $title = "3 Days in Moscow with a Friendly Guide | Friendly Local Guides";
                $meta = "Book this massive tour and take pride in covering all of Moscow: ancient Russian art galleries, deepest metro station, highest point, oldest building, shortest street and more!";
                break;
            case 'moscow-at-night':
                $title = "Moscow at Night | Friendly Local Guides";
                $meta = "Immerse yourself in Moscow’s nightlife, stroll on historical old town, enjoy stunning views, finish it all with a cold drink in a bar or a club.";
                break;
            case 'layover-tour-moscow':
                $title = "Airport Pickup + Orientation Tour | Friendly Local Guides";
                $meta = "Find out all you need to know in Moscow about getting around, where to go and what to do in Moscow on this tour. Save time, money and energy with your guide.";
                break;
            case 'russia-in-cold-war':
                $title = "Russia in WWII and Cold War | Friendly Local Guides";
                $meta = "Explore powerful, very Russian park and memorial, join a guided Bunker-42, Cold War Museum tour and get this special feeling of the war times.";
                break;
            case 'soviet-russia-tour':
                $title = "Communist Russia. Cold War period. | Friendly Local Guides";
                $meta = "Get this special feeling of the Soviet times, learn about political leaders of Russia, climb down Bunker-42, Cold War Museum.";
                break;
            case 'photo-tour-of-moscow':
                $title = "Photo Tour of Moscow’s Greatest Spots | Friendly Local Guides";
                $meta = "Discover scenic spots of Moscow, explore off the beaten path of Moscow, get 20 professionally edited photos of yourself.";
                break;
            case 'bike-tour-in-moscow':
                $title = "Bike Tour through the Best of Moscow | Friendly Local Guides";
                $meta = "Enjoy the icons of Moscow in style, test your nerve, driving on crazy Russian roads, expert commentary as you travel around the city.";
                break;
        }
    }

    if($id == 'guides' && $guides){
        switch($guides){
            case 'alina':
                $title = "Alina | Friendly Local Guides";
                $meta = "Just like my very first tour, our website, tours, advice, and recommendations are designed with you in mind.";
                break;
            case 'monika':
                $title = "Monika | Friendly Local Guides";
                $meta = "I love meeting people! I love to party. The smell of spring makes me dream. Chatting is my second profession.";
                break;
            case 'sasha':
                $title = "Sasha | Friendly Local Guides";
                $meta = "I'll try anything at least once. I always hoped I would be reborn an (aerial) dancer, or Ariel (the mermaid). But to be honest, I'd rather not be reborn. :)";
                break;
        }
    }