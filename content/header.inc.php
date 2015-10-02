<?
    include_once 'get_url.php';

    $title = "Moscow & Saint Petersburg Tours - Guided City Tours with Friendly Local Guides";
    $meta = "Private tours of Moscow & Saint Petersburg with friendly guides: Kremlin, Red Square, Hermitage, Russian history & culture, must visit places and sightseeing routes. Discover through the eyes of locals.";


    if(!$tours && !$guides){
        switch($id){
            case 'tours':
                $title = 'Moscow tours, private city tours in Moscow with private guides - Friendly Local Guides';
                $meta = "Friendly Local Guides offers Moscow private tours starting from 87$: Red Square & Kremlin tours, 1, 2, 3 day tours, Layover tours, Photo and Bike tours of Moscow.";
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

    if($id == 'guides' && $city == 'saint-petersburg' && !$tours){
        $title = "St Petersburg private guides - Friendly Local Guides";
        $meta = "Friendly Local Guides in Saint Petersburg are friendly, fun and flexible and will show you St Petersburg through the eyes of locals";
    }

    if($id == 'tours' && $city == 'saint-petersburg' && !$guides){
        $title = "St Petersburg private tours, city guided tours in Saint Petersburg (Russia) & Peterhof, walking tours with private guides - Friendly Local Guides";
        $meta = "Explore St Petersburg and Peterhof with Friendly Local Guides. Memorable city tours with private guides. We charge only $20 for every additional traveller.";
    }

    if($id == 'tours' && $city == 'san-francisco' && !$guides){
        $title = "San Francisco private tours, city guided tours in San Francisco (US), walking tours with private guides - Friendly Local Guides";
        $meta = "Explore San Francisco with Friendly Local Guides. Memorable city tours with private guides. We charge only $20 for every additional traveller.";
    }

    if($id == 'tours' && $tours){
        switch($tours){
            case 'free-tour':
                $title = "Moscow Free Walking Tour: Red Square, GUM, St Basil's Cathedral, Alexander Garden, Bolshoi Theater - Friendly Local Guides";
                $meta = "A free 2-hour sightseeing walking tour in Moscow! Roam through the heart of Moscow and see all must do places with Friendly Local Guides.";
                break;
            case 'kremlin-tour-moscow':
                $title = "Kremlin & Red square tour in Moscow - Friendly Local Guides";
                $meta = "Book a 5-hour Kremlin tour with us and admire lovely St. Basil's Cathedral at Red Square, explore Tsar Bell & Tsar Cannon, visit the Armory.";
                break;
            case 'red-square-and-city-tour-moscow':
                $title = "Moscow city & Red Square tour - all the main highlights of Moscow with Friendly Local Guides";
                $meta = "See Red Square, St Basil's Cathedral, Christ the Savior Cathedral, Kremlin walls, downtown of Moscow.";
                break;
            case 'going-out-in-moscow':
                $title = "Off the beaten path tours in Moscow: must do and off the beaten path in one day!";
                $meta = "Enjoy Off the beaten path tour of Moscow with your local guide and friend.";
                break;
            case 'izmailovo-kremlin-tour':
                $title = "Izmailovo Flea Market and Kremlin in Izmailovo - Friendly Local Guides";
                $meta = "Book this tour for only  $87 and immerse yourself in the unique culture of Russia + Great value souvenirs, Tsar’s palace & Russian vodka.";
                break;
            case 'top-20-must-see-in-moscow':
                $title = "Moscow Must-See's Moscow tour: Red Square, Kremlin, Kolomenskoe, Novodevichye and more!  - Friendly Local Guides";
                $meta = "20 must see of Moscow in 1 day tour. You can add or drop places from the itinerary and we'll customize this private tour for you";
                break;
            case '2-days-in-moscow':
                $title = "Moscow in 2 days: Moscow Sights and Russian Life - Friendly Local Guides";
                $meta = "Enjoy amazing Moscow sights, Moscow metro, Moscow streets, Russian people and the local Russian life. Discover and experience historical landmarks as well as off the beaten path of Moscow.";
                break;
            case '3-days-in-moscow':
                $title = "3-day tour of Moscow: All Must see in Moscow - Friendly Local Guides";
                $meta = "Book this ultimate Moscow tour and take pride in covering all of Moscow: from ancient Kremlin, Kitay Gorod and Zamoskvorechye to Moscow metro and of the beaten track of Moscow.";
                break;
            case 'moscow-at-night':
                $title = "Moscow by Night Tour - Friendly Local Guides";
                $meta = "Immerse yourself into Moscow nightlife, stroll around historical old town, enjoy stunning views and finish it all with a cold drink in a local bar.";
                break;
            case 'layover-tour-moscow':
                $title = "Moscow layover tour with flexible timing and friendly guide - Friendly Local Guides";
                $meta = "Enjoy this exciting layover tour and see both must do and off the beaten path of Moscow, try authentic Russian food";
                break;
            case 'soviet-tour-russia':
                $title = "Soviet Russia Tour & Cold War: Communist Times and Soviet reality - Friendly Local Guides";
                $meta = "Get this special feeling of the Soviet times, learn about political leaders of Russia, visit Soviet places in Moscow.";
                break;
            case 'bus-tour-in-moscow':
                $title = "Moscow bus tour - Friendly Local Guides";
                $meta = "A great number of fascinating and historical places on this Moscow bus tour .";
                break;
            case 'photo-tour-of-moscow':
                $title = "Moscow Photo Tour full of stunning views and iconic spots - Friendly Local Guides";
                $meta = "Discover scenic spots of Moscow, explore off the beaten path of Moscow, get 20 professionally edited photos of yourself.";
                break;
            case 'bike-tour-in-moscow':
                $title = "Moscow bike tour through the most scenic places - Friendly Local Guides";
                $meta = "Book your private bike tour now and enjoy the icons of Moscow in style, test your nerve, driving on crazy Russian roads, expert commentary and lifetime shots as you travel around the city.";
                break;
            case 'top-20-must-see-in-saint-petersburg':
                $title = "Must see places and landmarks of St Petersburg: Nevsky Prospect, Kazan Cathedral, Hermitage and more! - Friendly Local Guides";
                $meta = "20 legendary places of Saint Petersburg on our private must see tour. You can add or drop places from the itinerary and we'll customize it for you.";
                break;
            case 'boat-tour-moscow':
                $title = "Moscow River Cruise & Boat Trip - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "See all the gems of historical and cultural center of Moscow in short time and without traffic jams or tiresome walking on our river boat tour.";
                break;
            case 'ultimate-tour-of-moscow-with-traditional-cuisines':
                $title = "Ultimate tour: 3 or 4 day to Moscow - Friendly Local Guides";
                $meta = "This 7 Realms Ultimate tour of Moscow can be 3-Day tour, with 7 hours each day, or 4-Day tour, with 5 hours each day.";
                break;
            case 'food-tour-moscow-st-petersburg':
                $title = "Food tour in Moscow, Russian Gastronomy & Culinary -  Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "Try Russian pelmeni, Ukranian borsch, Traditional Russian pancakes, Georgian Khachapuri and other delicious meals on Moscow Food Tour.";
                break;
            case 'golden-ring-tour':
                $title = "Golden Ring Tour of Sergiev posad - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "Visit the most beautiful town of Russia – Sergiev Posad, one of the “Golden Ring” cities with Friendly Local Guides.";
                break;
            case 'jewish-tour-moscow':
                $title = "Jewish Heritage Tour in Moscow, Russia - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "Jewish Moscow tour will give you an idea about Jewish Heritage and take you into all main sites of Jewish community in Russia.";
                break;
            case 'metro-tour-moscow':
                $title = "Moscow Metro Tour - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "Visit top must-see stations of Moscow subway and explore Museum of Moscow Metro on our fun tour.";
                break;
            case 'moscow-private-tour':
                $title = "Tretyakov Gallery & Zamoskvorechye Tour - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "On Tretyakov Gallery & Zamoskvorechye Tour you will see paintings in Tretyakov Gallery, visit cathedrals in Zamoskvorechye,  see local street art and have the best coffee in  the city.";
                break;
            //SPB TOURS
            case '2-day-tour-of-saint-petersburg':
                $title = "2 Days in Saint Petersburg & Peterhof - Friendly Local Guides";
                $meta = "St Petersburg and Peterhof on 2 day tours, enjoy visiting most artistic and stunning cities of Russia.";
                break;
            case '3-day-tour-of-saint-petersburg':
                $title = "3 Days in Saint Petersburg - Friendly Local Guides";
                $meta = "3 day private tour of Saint Petersburg. Combine must-see and off the beaten path: river cruise, world-known cathedrals and much more!";
                break;
            case 'boat-trip-tour':
                $title = "River Boat Tour - Friendly Local Guides";
                $meta = "7 best river boat St Petersburg’s tours along the Neva river and the city’s picturesque canalways.";
                break;
            case 'st-petersburg-walking-tour':
                $title = "St Petersburg Walking Tour with a Friendly Guide";
                $meta = "Walking tour of all main highlights of Saint Petersburg: Nevsky Prospect, St Isaac’s Cathedral, the Hermitage, Kazan Cathedral, Eliseev Emporium, Palace Square and more!";
                break;
            case 'peter-and-paul-tour':
                $title = "Peter & Paul Fortress & Strelka on Basil Island (Petrograd side) - Friendly Local Guides";
                $meta = "Visit the oldest building Peter and Paul Fortress on the Strelka of Vasilievsky Island on our breathtaking and spectacular tour of Saint Petersburg.";
                break;
            case 'peterhof-tour':
                $title = "Peterhof & Grand Palace Tour - Friendly Local Guides";
                $meta = "Amazing tour to Peterhof: Palace, fountains, park and garden";
                break;
            case 'st-petersburg-and-moscow-tours':
                $title = "Moscow & St Petersburg tour, visit  Russia - Tours to Russia from Friendly Local Guides";
                $meta = "We designed this private Moscow and Petersburg tour with you in mind offering you different number of days in each city and various itineraries covering all main sights.";
                break;
            case 'st-petersburg-private-tour':
                $title = "Saint Petersburg Private Tour - Friendly Local Guides";
                $meta = "Great overview and orientation of the city on our 5-hour private tour of Saint Petersburg.";
                break;
            case 'food-tour-st-petersburg':
                $title = "Food tour in St Petersburg - Friendly Local Guides";
                $meta = "On our Russian Food Tour you’ll try Russian pancakes, Soviet-style lunch, borsch and many other delicious Russian foods as well traditional hospitality, cozy and amazingly beautiful interior. All food is included!";
                break;
            //SAN FRANCISCO TOURS
            case 'san-francisco-tour':
                $title = "3-Hour Driving Tour in San Francisco - Friendly Local Guides";
                $meta = "San Francisco - Friendly Local Guides";
                break;
            case 'san-francisco-city-tour':
                $title = "5-Hour Tour in San Francisco - Friendly Local Guides";
                $meta = "San Francisco - Friendly Local Guides";
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