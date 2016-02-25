<?
    include_once 'get_url.php';

    if(!$id){
        $title = "Private City Tours in USA, Russia and Europe with Friendly Local Guides";
        $meta = "Private tours to USA, Russia and Europe. Book now and have fun!";
        $keywords = "Private tours, Moscow, Saint Petersburg, New York, San Francisco, Lisbon, Milan, Los Angeles, Washington, Chicago, Paris, Friendly Local Guides";
    }


    if(!$tours && !$guides){
        switch($id){
            case 'tours':
                $title = "Moscow tours, private city tours in Moscow - Friendly Local Guides Tours";
                $meta = "Private tours to Moscow starting from $87: Red Square & Kremlin tours, 1, 2, 3 day tours, Layover tours, Photo and Bike tours of Moscow.";
                break;
            case 'guides':
                $title = "Moscow guides - Friendly Local Guides";
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
            case 'sitemap':
                $title = "Sitemap - Friendly Local Guides";
                $meta = "";
                $keywords = "";
                break;
        }
    }

    if($id == 'guides' && $city == 'saint-petersburg' && !$tours){
        $title = "St Petersburg private guides - Friendly Local Guides";
        $meta = "Our Guides in Saint Petersburg are friendly, fun and flexible and will show you city through the eyes of locals";
    }

    if($id == 'tours' && $city == 'saint-petersburg' && !$guides){
        $title = "St. Petersburg private tours, city guided tours in Saint Petersburg (Russia) - Friendly Local Guides";
        $meta = "St. Petersburg private tours with Friendly Local Guides. Memorable city tours with private guides. We charge only $20 for every additional traveller.";
    }

    if($id == 'tours' && $city == 'san-francisco' && !$guides){
        $title = "San Francisco tours, private city tours in San Francisco  - Friendly Local Guides";
        $meta = "Enjoy San Francisco tours with Friendly Local Guides. Walking, driving, biking or night tours creating for your most interesting city visiting.";
        $keywords = "San Francisco tours, private city tours in San Francisco, Friendly Local Guides";
    }


    if($id == 'tours' && $city == 'new-york' && !$guides){
        $title = "New York tours, private city tours in NYC - Friendly Local Guides";
        $meta = "Take our New York tours and visit must sees places in NYC. 1, 2 or 3 days tour, personal packages and other fun!";
        $keywords = "New York tours, private city tours in NYC, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'lisbon' && !$guides){
        $title = "Lisbon tours, private city tours in Lisbon - Friendly Local Guides";
        $meta = "Book Lisbon tours and have fun with Friendly Local Guides. Must see packages and attractions in Lisbon, Portugal.";
        $keywords = "Lisbon sightseeing, Lisbon tours, Lisbon private city tours, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'milan' && !$guides){
        $title = "Milan tours, private city tours in Milan - Friendly Local Guides";
        $meta = "Book Milan tours and have fun with Friendly Local Guides. Must see packages and attractions in Milan, Italy.";
        $keywords = "Milan tours, private city tours in Milan, Book Milan tours, must see packages, attractions, Italy, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'los-angeles' && !$guides){
        $title = "Los Angeles tours, private tour packages in LA, Hollywood - Friendly Local Guides";
        $meta = "Book Los Angeles tours and have fun with Friendly Local Guides. Must see packages and attractions in  LA, Hollywood.";
        $keywords = "Los Angeles tours, private tour packages in LA, Hollywood, must see attractions, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'washington' && !$guides){
        $title = "Washington tours, private city tours in Washington DC - Friendly Local Guides";
        $meta = "Washington DC private tours and must see attraction. Visit must see places with Friendly Local Guides.";
        $keywords = "Washington tours, private city tours in Washington DC, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'chicago' && !$guides){
        $title = "Chicago tours, private city tours in Chicago - Friendly Local Guides";
        $meta = "Chicago city tours, sightseeing, activities and packages. Book online private tours to Chicago and have fun!";
        $keywords = "Tour chicago, Chicago attractions, chicago museums, chicago tours, chicago bike tours, chicago sightseeing, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'paris' && !$guides){
        $title = "Paris tours, private city tours in Paris, France - Friendly Local Guides";
        $meta = "Paris tours with flexible itinerary, fun and friendly guides. Visit must sees Paris attractions without boring lectures.";
        $keywords = "Paris tours, private city tours in Paris, France, Friendly Local Guides";
    }

    if($id == 'tours' && $tours){
        switch($tours){
            case 'free-tour':
                $title = "Moscow Free Walking Tour: Red Square, GUM, St Basil's Cathedral, Alexander Garden, Bolshoi Theater - FLG";
                $meta = "A free 2-hour sightseeing walking tour in Moscow! This tour valid when booking any other tour.";
                break;
            case 'kremlin-tour-moscow':
                $title = "Kremlin tour in Moscow - Friendly Local Guides";
                $meta = "Book a 5-hour Kremlin tour and admire lovely St. Basil's Cathedral at Red Square, explore Tsar Bell & Tsar Cannon, visit the Armory.";
                break;
            case 'red-square-and-city-tour-moscow':
                $title = "Red Square Tour - all the main highlights of Moscow with Friendly Local Guides";
                $meta = "Enjoy Red Square tour. You will see St Basil's Cathedral, Christ the Savior Cathedral, Kremlin walls, downtown of Moscow.";
                break;
            case 'going-out-in-moscow':
                $title = "Moscow off the beaten path tours: must do and off the beaten path in one day - FLG";
                $meta = "Enjoy Off the beaten path tour of Moscow with your local guide and friend with Friendly Local Guides.";
                break;
            case 'izmailovo-kremlin-tour':
                $title = "Izmailovo Tour: Flea Market and Kremlin in Moscow - Friendly Local Guides";
                $meta = "Book Izmailovo tour for only $87 and immerse yourself in the unique culture of Russia + Great value souvenirs, Tsar’s palace & Russian vodka.";
                break;
            case 'top-20-must-see-in-moscow':
                $title = "Moscow Must-See's Tour - Friendly Local Guides";
                $meta = "20 must see of Moscow in 1 day You can add or drop places from the itinerary and we'll customize this private tour for you";
                break;
            case '2-days-in-moscow':
                $title = "2 day tour in Moscow: Moscow Attractions and Russian Life - Friendly Local Guides";
                $meta = "Discover Moscow in 2 days with Friendly Local Guides. Enjoy amazing Moscow sights, Moscow metro, Moscow streets, Russian people and the local Russian life. ";
                break;
            case '3-days-in-moscow':
                $title = "3 day tour in Moscow - Friendly Local Guides Tours";
                $meta = "Book this Moscow in 3 days tour and take pride in covering all of Moscow: from ancient Kremlin, Kitay Gorod and Zamoskvorechye to Moscow metro and off the beaten path of Moscow.";
                break;
            case 'moscow-at-night':
                $title = "Moscow at Night Tour - Friendly Local Guides";
                $meta = "Book Moscow at Night tour and immerse yourself into Moscow nightlife. Stroll around historical old town, enjoy stunning views and finish it all with a cold drink in a local bar.";
                break;
            case 'layover-tour-moscow':
                $title = "Layover tour of Moscow with flexible timing - Friendly Local Guides";
                $meta = "Enjoy this exciting layover tour and see both must see and off the beaten path of Moscow, try authentic Russian food.";
                break;
            case 'soviet-tour-russia':
                $title = "Soviet Tour in Moscow: communist relics  & Cold War Museum - Friendly Local Guides";
                $meta = "Get this special feeling of the Soviet times, learn about political leaders of Russia, visit Soviet places in Moscow.";
                break;
            case 'bus-tour-in-moscow':
                $title = "Moscow bus tour - Friendly Local Guides";
                $meta = "Moscow bus tour with a great number of fascinating and historical places.";
                break;
            case 'photo-tour-of-moscow':
                $title = "Moscow Photo Tour full of stunning views and iconic spots - Friendly Local Guides";
                $meta = "At Moscow Photo otur you can discover scenic spots of Moscow, explore off the beaten path of Moscow, get 20 professionally edited photos of yourself.";
                break;
            case 'bike-tour-in-moscow':
                $title = "Bike tour in Moscow through the most scenic places - Friendly Local Guides";
                $meta = "Book your private bike tour now and enjoy the icons of Moscow in style, test your nerve, driving on crazy Russian roads, expert commentary and lifetime shots as you travel around the city.";
                break;
            case 'top-20-must-see-in-saint-petersburg':
                $title = "St. Petersburg must see tour - Friendly Local Guides";
                $meta = "20 legendary places of Saint Petersburg on our private must see tour. You can add or drop places from the itinerary and we'll customize it for you.";
                break;
            case 'boat-tour-moscow':
                $title = "Moscow River Cruise & Boat Trip with Friendly Local Guides";
                $meta = "On our river boat tour you will see all the gems of historical and cultural center of Moscow in short time and without traffic jams or tiresome walking.";
                break;
            case 'ultimate-tour-of-moscow-with-traditional-cuisines':
                $title = "Ultimate tour in Moscow: 3 or 4 day - Friendly Local Guides";
                $meta = "This 7 Realms Ultimate tour of Moscow can be 3-Day tour, with 7 hours each day, or 4-Day tour, with 5 hours each day.";
                break;
            case 'food-tour-moscow-st-petersburg':
                $title = "Food tour in Moscow, Russian Gastronomy & Culinary - Moscow Tours with FLG";
                $meta = "Try delicious meals on Moscow Food Tour: Russian pelmeni, Ukranian borsch, Traditional Russian pancakes, Georgian Khachapuri and more.";
                break;
            case 'golden-ring-tour':
                $title = "Golden Ring Tour of Sergiev Posad - Moscow & Saint Petersburg Tours with Friendly Local Guides";
                $meta = "Golden Ring Tour: visit the most beautiful town of Russia – Sergiev Posad, one of the “Golden Ring” cities with Friendly Local Guides.";
                break;
            case 'jewish-tour-moscow':
                $title = "Jewish Heritage Tour in Moscow, Russia - Friendly Local Guides. Tours of Moscow";
                $meta = "Jewish Moscow tour will give you an idea about Jewish Heritage and take you into all main sites of Jewish community in Russia.";
                break;
            case 'metro-tour-moscow':
                $title = "Moscow Metro Tour with Friendly Local Guides";
                $meta = "Book Moscow Metro tour and visit top must-see stations of Moscow subway and Museum of Metro.";
                break;
            case 'moscow-private-tour':
                $title = "Tretyakov Gallery Tour - Moscow Tours with Friendly Local Guides";
                $meta = "On Tretyakov Gallery Tour you will see paintings in Tretyakov Gallery, visit cathedrals in Zamoskvorechye, see local street art and have the best coffee in the city.";
                break;
            //SPB TOURS
            case '2-day-tour-of-saint-petersburg':
                $title = "St. Petersburg in 2 days tour - Friendly Local Guides";
                $meta = "St. Petersburg on 2 day tours, enjoy visiting most artistic and stunning places in Saint Petersburg and Peterhof.";
                break;
            case '3-day-tour-of-saint-petersburg':
                $title = "St. Petersburg in 3 days tour - Friendly Local Guides";
                $meta = "3 day private tour of Saint Petersburg. Combine must-see and off the beaten path: river cruise, world-known cathedrals and much more!";
                break;
            case 'boat-trip-tour':
                $title = "River cruises and shore tours in St. Petersburg - Friendly Local Guides";
                $meta = "7 best river cruises and shore tours in St. Petersburg along the Neva and the city’s picturesque canalways.";
                break;
            case 'st-petersburg-walking-tour':
                $title = "St Petersburg Walking Tour - Friendly Local Guides";
                $meta = "St. Petersburg walking tour of all main highlights: Nevsky Prospect, St Isaac’s Cathedral, the Hermitage, Kazan Cathedral, Eliseev Emporium, Palace Square and more!";
                break;
            case 'peter-and-paul-tour':
                $title = "Peter & Paul Fortress Tour in St. Petersburg - Friendly Local Guides";
                $meta = "Peter and Paul Fortress Tour of the Strelka of Vasilievsky Island. Visit the oldest building in Saint Petersburg. ";
                break;
            case 'peterhof-tour':
                $title = "Peterhof & Grand Palace Tour - Friendly Local Guides";
                $meta = "Amazing tour to Peterhof: Monplaisir Palace, fountains, park and gardens, Peterhof Hermitage";
                break;
            case 'st-petersburg-and-moscow-tours':
                $title = "Moscow & St Petersburg tour - Friendly Local Guides";
                $meta = "Moscow and Petersburg tour in 2 days, 7 hours each day. Visit world-famous Russian museums, cathedrals & palaces.";
                break;
            case 'st-petersburg-private-tour':
                $title = "5-hour City Tour of Saint Petersburg - Friendly Local Guides";
                $meta = "Great overview and orientation of the city on our 5-hour private tour of Saint Petersburg.";
                break;
            case 'food-tour-st-petersburg':
                $title = "Food tour in St. Petersburg - Friendly Local Guides";
                $meta = "On our food tour in St. Petersburg you’ll try Russian pancakes, Soviet-style lunch, borsch and many other delicious Russian foods as well as traditional hospitality, cozy and amazingly beautiful interior. All food is included!";
                break;
            //SAN FRANCISCO TOURS
            case 'san-francisco-tour':
                $title = "San Francisco driving tour - Friendly Local Guides";
                $meta = "3-hour driving tour in San Francisco. Take advantage of San Francisco's steep hills, enjoy the breeze and panoramic views.";
                break;
            case 'san-francisco-city-tour':
                $title = "One day in San Francisco: all must sees of the city - Friendly Local Guides";
                $meta = "San Francisco one day tour. Choose your own: 3, 5 or 7 hour tour with Friendly Local Guides.";
                break;
            case '2-days-in-san-francisco':
                $title = "2 days in San Francisco: all tourist attractions in SF - Friendly Local Guides";
                $meta = "On this 2-day tour of San Francisco you`ll visit Golden Gate Park and Muir Woods, Golden Gate Bridge and Fisherman’s Wharf, Alcatraz and North Beach. ";
                break;
            case '3-days-in-san-francisco':
                $title = "3 days in San Francisco: best restaurants and fun things to do - Friendly Local Guides";
                $meta = "3-day tour in San Francisco. Iconic symbols of San Francisco await you!";
                break;
            case 'san-francisco-walking-tours':
                $title = "San Francisco walking tours - Friendly Local Guides";
                $meta = "Private walking tour to San Francisco: 5, 7 or even 10-hour duration with your local guide.";
                break;
            case 'san-francisco-bike-tours':
                $title = "San Francisco bike tours - Friendly Local Guides";
                $meta = "Best bike tours in San Francisco. See places of SF you might not see on your own with Friendly Local Guides.";
                break;
            case 'san-francisco-night-tours':
                $title = "San Francisco night tour, private SF tours - Friendly Local Guides";
                $meta = "Enjoy San Francisco night tour with Friendly Local Guides. Tour description, photos and reviews.";
                $keywords = "San Francisco night tours, private city night tours in San Francisco, Friendly Local Guides";
                break;

            case 'new-york-tour':
                $title = "1 day tour in New York City - Private tours with Friendly Local Guides";
                $meta = "Visit TOP 10 places in New York in 1 day with Friendly Local Guides: Central Park, The Metropolitan Museum of Art, Rockefeller Center, Grand Central Terminal, Times Square, Broadway, 9/11 Memorial, Brooklyn Bridge, One World Observatory - World Trade Center, Statue of Liberty and Ellis Island.";
                $keywords = "1 day tour in New York, private New York tours, Friendly Local Guides, Central Park, The Metropolitan Museum of Art, Rockefeller Center, Grand Central Terminal, Times Square, Broadway, 9/11 Memorial, Brooklyn Bridge, One World Observatory - World Trade Center, Statue of Liberty and Ellis Island";
                break;

            case 'lisbon-tour':
                $title = "1 day tour in Lisbon -  private city tours with Friendly Local Guides";
                $meta = "Visit TOP 10 places in Lisbon in 1 day with Friendly Local Guides: Commercial Square / Victory Arch, Rossio Square, Restauradores Square and Liberdade Avenue, Carmo Square, Chiado, Bairro Alto, The Mouraria, Lisbon's Castle neighbourhood, Lisbon Cathedral, The Alfama.";
                $keywords = "1 day tour in Lisbon, Lisbon private city tours, Commercial Square / Victory Arch, Rossio Square, Restauradores Square and Liberdade Avenue, Carmo Square, Chiado, Bairro Alto, The Mouraria, Lisbon's Castle neighbourhood, Lisbon Cathedral, The Alfama, Friendly Local Guides";
                break;

            case 'milan-tour':
                $title = "1 day tour in Milan - Private Milan Tours with Friendly Local Guides";
                $meta = "Visit TOP 10 places in Milan in 1 day with Friendly Local Guides: Duomo Cathedral, Galleria Vittorio Emanuele II, La Scala Theatre Opera House, Brera palace, Sforza Castle, Sempione Park, Arch of Piece, Santa Maria delle Grazie, San Maurizio Church, Saint Ambrogio Basilica.";
                $keywords = "1 day tour in Milan, private Milan tours, Duomo Cathedral, Galleria Vittorio Emanuele II, La Scala Theatre Opera House, Brera palace, Sforza Castle, Sempione Park, Arch of Piece, Santa Maria delle Grazie, San Maurizio Church, Saint Ambrogio Basilica, Friendly Local Guides";
                break;

            case 'los-angeles-tour':
                $title = "1 day tour in Los Angeles and 10 Top Things to Do - Friendly Local Guides";
                $meta = "Visit TOP 10 places in Los Angeles in 1 day with Friendly Local Guides: Staples, Walt Disney Concert Hall, Microsoft Theater, LA Live, Bradbury Building, Grand Park, Museum of Contemporary Art, Hollywood boulevard, Walk of Fame, Grauman’s Chinese and Dolby Theaters.";
                $keywords = "1 day tour in Los Angeles, 10 Top Things to Do in LA, Hollywood, Staples, Walt Disney Concert Hall, Microsoft Theater, LA Live, Bradbury Building, Grand Park, Museum of Contemporary Art, Hollywood boulevard, Walk of Fame, Grauman’s Chinese and Dolby Theaters, Friendly Local Guides";
                break;

            case 'washington-tour':
                $title = "1 day tour in Washington DC - Private tours with Friendly Local Guides";
                $meta = "Visit TOP 10 places in Washington DC in 1 day with Friendly Local Guides: Washington National Cathedral, Georgetown, The John F. Kennedy Center for the Performing Arts, National World War II Memorial, National Mall, Lincoln Memorial, The Tidal Basin, The Washington Monument, The White House, United States Botanical Garden, Library of Congress, US Capitol and other must sees.";
                $keywords = "1 day tour in Washington DC, private tours, Friendly Local Guides, Washington National Cathedral, Georgetown, The John F. Kennedy Center for the Performing Arts, National World War II Memorial, National Mall, Lincoln Memorial, The Tidal Basin, The Washington Monument, The White House, United States Botanical Garden, Library of Congress, US Capitol";
                break;

            case 'chicago-tour':
                $title = "1 day tour in Chicago city: itinerary and must see attractions - Friendly Local Guides";
                $meta = "Visit TOP 10 places in Chicago in 1 day with Friendly Local Guides: Navy Pier, Chicago Shakespeare Theater, Lake Point Tower, John Hancock Center, Marina City, Aon Center, Millennium Park, The Art Institute of Chicago, Willis Tower, Museum Campus.";
                $keywords = "1 day tour in Chicago, Chicago itinerary, Chicago must see attractions, Friendly Local Guides, Navy Pier, Chicago Shakespeare Theater, Lake Point Tower, John Hancock Center, Marina City, Aon Center, Millennium Park, The Art Institute of Chicago, Willis Tower, Museum Campus";
                break;

            case '2-days-in-paris':
                $title = "2 Days tour in Paris - Private tours with Friendly Local Guides";
                $meta = "Visit TOP 20 places in Paris in 2 days: Louvre, Jardin des Tuileries, Eiffel tower, Palais Garnier, River Seine, Pont Alexandre III, Place des Vosges, Walking around Le Marais, ile St Louis, ile de la Cité, Notre Dame and others must sees.";
                $keywords = "2 Days tour in Paris, private tours, Friendly Local Guides, Louvre, Jardin des Tuileries, Eiffel tower, Palais Garnier, River Seine, Pont Alexandre III, Place des Vosges, Walking around Le Marais, ile St Louis, ile de la Cité, Notre Dame";
                break;


        }
    }

    if($id == 'guides' && $guides){
        switch($guides){
            case 'alina':
                $title = "Guide Alina - Moscow Private Tours with Friendly Local Guides";
                $meta = "Alina is your friendly local guide in Moscow.";
                break;
            case 'vera':
                $title = "Guide Vera - Private Moscow Tours with Friendly Local Guides";
                $meta = "Vera is your friendly local guide in Moscow.";
                break;
            case 'karina':
                $title = "Guide Karina - Private Moscow Tours with Friendly Local Guides";
                $meta = "Karina is your friendly local guide in Moscow.";
                break;
            case 'angelina':
                $title = "Guide Angelina - Private Moscow Tours with Friendly Local Guides";
                $meta = "Angelina is your friendly local guide in Moscow.";
                break;
            case 'anna':
                $title = "Guide Anna - Private Moscow Tours with Friendly Local Guides";
                $meta = "Anna is your friendly local guide in Moscow.";
                break;
            case 'dasha':
                $title = "Guide Dasha - Moscow Private Tours with Friendly Local Guides";
                $meta = "Dasha is your friendly local guide in Moscow.";
                break;
            case 'inna':
                $title = "Guide Inna - Moscow Private Tours with Friendly Local Guides";
                $meta = "Inna is your friendly local guide in Moscow.";
                break;
            case 'anya':
                $title = "Guide Anya - Moscow Private Tours with Friendly Local Guides";
                $meta = "Anya is your friendly local guide in Moscow.";
                break;
            case 'katya':
                $title = "Guide Katia - Moscow Private Tours with Friendly Local Guides";
                $meta = "Katia is your friendly local guide in Moscow.";
                break;
            case 'valery':
                $title = "Guide Valery - Moscow Private Tours with Friendly Local Guides";
                $meta = "Valery is your friendly local guide in St. Petersburg.";
                break;
        }
    }