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
                $title = "Moscow tours, private city tours in Moscow, Russia - Friendly Local Guides";
                $meta = "Private tours to Moscow starting from $87: 1, 2, 3 days packs, Red Square & Kremlin, Layover, Photo and Bike tours of Moscow. Book online!";
                $keywords = "moscow private tours, private moscow guides, russia, Friendly Local Guides";
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
            case 'main':
                $title = "Main Page | Friendly Local Guides";
                $meta = "";
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
        $title = "Private City Tours in Saint Petersburg, Russia - Friendly Local Guides";
        $meta = "Book St. Petersburg private tours from 117$ with Friendly Local Guides. 1, 2 or 3 days packs, River, Peterhof, Food and Night tours.";
        $keywords = "saint petersburg tours, private saint petersburg guides, russia, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'san-francisco' && !$guides){
        $title = "San Francisco tours, private city tours in San Francisco  - Friendly Local Guides";
        $meta = "Enjoy San Francisco tours with Friendly Local Guides. Walking, driving, biking or night tours creating for your most interesting city visiting.";
        $keywords = "San Francisco tours, private city tours in San Francisco, Friendly Local Guides";
    }


    if($id == 'tours' && $city == 'new-york' && !$guides){
        $title = "Private New York tours in NYC - Friendly Local Guides";
        $meta = "Take our New York City tours. 1, 2 or 3 days tour, customized tour and lots of fun";
        $keywords = "New York tours, private city tours in NYC, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'lisbon' && !$guides){
        $title = "Private Lisbon tours - Friendly Local Guides";
        $meta = "Book Lisbon tours and have fun with Friendly Local Guides. Must see packages and attractions in Lisbon, Portugal.";
        $keywords = "Lisbon sightseeing, Lisbon tours, Lisbon private city tours, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'milan' && !$guides){
        $title = "Milan tours, private city tours in Milan - Friendly Local Guides";
        $meta = "Check out and book online our custom tours in Milan, Italy. Have your most memorable travel experience with Friendly Local Guides.";
        $keywords = "Milan tours, private city tours in Milan, Book Milan tours, attractions, Italy, Friendly Local Guides";
    }

    if($id == 'tours' && $city == 'los-angeles' && !$guides){
        $title = "Private and custom Los Angeles tours - Friendly Local Guides";
        $meta = "Book Los Angeles tours and have fun with Friendly Local Guides. Must see packages and attractions in Los Angeles";
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
        $title = "Private Guided Tours in Paris, France - Friendly Local Guides";
        $meta = "Paris tours with flexible itinerary, fun and friendly guides. Visit must sees Paris attractions without boring lectures.";
        $keywords = "Paris tours, private city tours in Paris, France, Friendly Local Guides";
    }

    if($id == 'tours' && $tours){
        switch($tours){
            case 'free-tour':
                $title = "Moscow Free Walking Tour: Red Square, GUM, Bolshoi Theater etc - FLG";
                $meta = "A free 2-hour sightseeing walking tour in Moscow! This tour valid when booking any other tour.";
                $keywords = "moscow walking tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'kremlin-tour-moscow':
                $title = "Moscow Kremlin tour in Russia - Friendly Local Guides";
                $meta = "Book a 5-hour Kremlin tour and admire lovely St. Basil's Cathedral at Red Square, explore Tsar Bell & Tsar Cannon, visit the Armory.";
                $keywords = "moscow kremlin tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'red-square-and-city-tour-moscow':
                $title = "Red Square Tour in Moscow City, Russia - Friendly Local Guides";
                $meta = "Enjoy Red Square & Moscow City Tour. You will see St Basil's Cathedral, Christ the Savior Cathedral, Kremlin walls, downtown of Moscow.";
                $keywords = "red square tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'going-out-in-moscow':
                $title = "Moscow off the beaten path tour - Moscow Tours with FLG";
                $meta = "Enjoy Off the beaten path tour of Moscow with your local guide and friend with Friendly Local Guides.";
                $keywords = "moscow off the beaten track tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'izmailovo-kremlin-tour':
                $title = "Izmailovo Tour: Flea Market and Kremlin in Moscow - Friendly Local Guides";
                $meta = "Book Izmailovo tour for only $87 and immerse yourself in the unique culture of Russia + Great value souvenirs, Tsar’s palace & Russian vodka.";
                $keywords = "izmailovo kremlin tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'top-20-must-see-in-moscow':
                $title = "Moscow Must-See's Tour - Friendly Local Guides";
                $meta = "20 must see of Moscow in 1 day You can add or drop places from the itinerary and we'll customize this private tour for you";
                $keywords = "top 20 must see moscow, private tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case '2-days-in-moscow':
                $title = "2 days in Moscow: Russian Life and Moscow Attractions tour - Friendly Local Guides";
                $meta = "Discover Moscow in 2 days with Friendly Local Guides. Enjoy amazing Moscow sights, Moscow metro, Moscow streets, Russian people and the local Russian life. ";
                $keywords = "2 days moscow private tours, private moscow guides, russia, Friendly Local Guides";
                break;
            case '3-days-in-moscow':
                $title = "3 days Tour in Moscow - Friendly Local Guides Tours";
                $meta = "Book this Moscow in 3 days tour and take pride in covering all of Moscow: from ancient Kremlin, Kitay Gorod and Zamoskvorechye to Moscow metro and off the beaten path of Moscow.";
                $keywords = "3 days moscow private tours, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'moscow-at-night':
                $title = "Moscow Night Tour - Friendly Local Guides";
                $meta = "Book Moscow at Night tour and immerse yourself into Moscow nightlife. Stroll around historical old town, enjoy stunning views and finish it all with a cold drink in a local bar.";
                $keywords = "moscow night tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'layover-tour-moscow':
                $title = "Layover tour in Moscow., Russia - Friendly Local Guides";
                $meta = "Enjoy this exciting layover tour and see both must see and off the beaten path of Moscow, try authentic Russian food.";
                $keywords = "moscow layover tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'soviet-tour-russia':
                $title = "Soviet Tour in Moscow: communist relics  & Cold War Museum - Friendly Local Guides";
                $meta = "Get this special feeling of the Soviet times, learn about political leaders of Russia, visit Soviet places in Moscow.";
                $keywords = "soviet tour moscow, communist, cold war, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'bus-tour-in-moscow':
                $title = "City Sightseeing Moscow with private guide - Friendly Local Guides";
                $meta = "Moscow bus tour with a great number of fascinating and historical places and enjoy.";
                $keywords = "moscow tour bus, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'photo-tour-of-moscow':
                $title = "Moscow Photo Tour full of stunning views and iconic spots - Friendly Local Guides";
                $meta = "At Moscow Photo tour you can discover scenic spots of Moscow, explore off the beaten path of Moscow, get 20 professionally edited photos of yourself.";
                $keywords = "moscow photo tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'bike-tour-in-moscow':
                $title = "Bike tour in Moscow through the most scenic places - Friendly Local Guides";
                $meta = "Book your private bike tour now and enjoy the icons of Moscow in style, test your nerve, driving on crazy Russian roads, expert commentary and lifetime shots as you travel around the city.";
                $keywords = "bike tour in moscow, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'top-20-must-see-in-saint-petersburg':
                $title = "1-Day Tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "1-Day tour including 20 legendary places of Saint Petersburg. You can add or drop places from the itinerary and we'll customize it for you.";
                $keywords = "1 day saint petersburg tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'boat-tour-moscow':
                $title = "Moscow River Cruise Tour with Friendly Local Guides";
                $meta = "On our river boat tour you will dicover all must sees in center of Moscow (Russia) without traffic jams or tiresome walking.";
                $keywords = "river cruise moscow, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'ultimate-tour-of-moscow-with-traditional-cuisines':
                $title = "Ultimate tour in Moscow: 3 or 4 day - Friendly Local Guides";
                $meta = "This 7 Realms Ultimate tour of Moscow can be 3-Day tour, with 7 hours each day, or 4-Day tour, with 5 hours each day.";
                $keywords = "ultimate moscow private tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'food-tour-moscow-st-petersburg':
                $title = "Food tour in Moscow, Russian Gastronomy & Culinary - Moscow Tours with FLG";
                $meta = "Try delicious meals on Moscow Food Tour: Russian pelmeni, Ukranian borsch, Traditional Russian pancakes, Georgian Khachapuri and more.";
                $keywords = "moscow food tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'golden-ring-tour':
                $title = "Sergiev Posad Tour from Moscow, Russia with Friendly Local Guides";
                $meta = "Golden Ring Tour: visit the most beautiful town of Russia – Sergiev Posad, one of the “Golden Ring” cities with Friendly Local Guides.";
                $keywords = "sergiev posad tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'jewish-tour-moscow':
                $title = "Jewish Tour in Moscow, Russia - Friendly Local Guides. Tours of Moscow";
                $meta = "Jewish Moscow tour will give you an idea about Jewish Heritage and take you into all main sites of Jewish community in Russia.";
                $keywords = "jewish moscow tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'metro-tour-moscow':
                $title = "Moscow Metro Tour with Friendly Local Guides";
                $meta = "Book Moscow Metro tour and visit top must-see stations of Moscow subway and Museum of Metro.";
                $keywords = "moscow metro tour, private moscow guides, russia, Friendly Local Guides";
                break;
            case 'moscow-private-tour':
                $title = "Tretyakov Gallery Tour - Moscow Tours with Friendly Local Guides";
                $meta = "On Tretyakov Gallery Tour you will see paintings in Tretyakov Gallery, visit cathedrals in Zamoskvorechye, see local street art and have the best coffee in the city.";
                $keywords = "moscow private tour, private moscow guides, russia, Friendly Local Guides";
                break;
            //SPB TOURS
            case '2-day-tour-of-saint-petersburg':
                $title = "2-day tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "St. Petersburg in 2 days, enjoy visiting most artistic and stunning must-see places in Saint Petersburg and Peterhof.";
                $keywords = "2 days saint petersburg tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case '3-day-tour-of-saint-petersburg':
                $title = "3 days in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "Book 3 day private tour of St. Petersburg. Combine must-see and off the beaten path: river cruise, world-known cathedrals and much more!";
                $keywords = "3 days saint petersburg tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'boat-trip-tour':
                $title = "Drawbridge Night Boat Tours on Neva river in St. Petersburg, Russia  - Friendly Local Guides";
                $meta = "Pick your best boat tour in St. Petersburg along the Neva and the city’s picturesque canalways.";
                $keywords = "saint petersburg boat tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'st-petersburg-walking-tour':
                $title = "Walking Tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "St. Petersburg walking tour of all main highlights: Nevsky Prospect, St Isaac’s Cathedral, the Hermitage, Kazan Cathedral, Eliseev Emporium, Palace Square and more!";
                $keywords = "saint petersburg walking tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'peter-and-paul-tour':
                $title = "Peter & Paul Fortress Tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "Peter and Paul Fortress, Strelka of Vasilievsky Island and Petrograd Side. Best pack of highlights to explore in St. Petersburg";
                $keywords = "saint petersburg peter and paul fortress tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'peterhof-tour':
                $title = "Peterhof Tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "Amazing tour to Peterhof, Monplaisir Palace, Peterhof Hermitage, beautifull fountains, parks and gardens.";
                $keywords = "saint petersburg peterhof tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            case 'st-petersburg-and-moscow-tours':
                $title = "Tour to Moscow and St. Petersburg in Russia - Friendly Local Guides";
                $meta = "Moscow and St. Petersburg tour in 2 days, 7 hours each day. Visit world-famous Russian museums, cathedrals & palaces.";
                $keywords = "saint petersburg and moscow tour, private, russia, Friendly Local Guides";
                break;
            case 'st-petersburg-private-tour':
                $title = "5-hour City Tour of Saint Petersburg - Friendly Local Guides";
                $meta = "saint petersburg private tour, russia, Friendly Local Guides";
                $keywords = "saint petersburg private tour, russia, Friendly Local Guides";
                break;
            case 'food-tour-st-petersburg':
                $title = "Food Tour in St. Petersburg, Russia - Friendly Local Guides";
                $meta = "On our food tour in St. Petersburg you’ll try Russian pancakes, Soviet-style lunch, borsch and many other delicious Russian foods as well as traditional hospitality, cozy and amazingly beautiful interior. All food is included!";
                $keywords = "saint petersburg food tour, private saint petersburg guides, russia, Friendly Local Guides";
                break;
            //SAN FRANCISCO TOURS
            case 'san-francisco-tour':
                $title = "San Francisco driving tour - Friendly Local Guides";
                $meta = "3-hour driving tour in San Francisco. Take advantage of San Francisco's steep hills, enjoy the breeze and panoramic views.";
                $keywords = "private driving tour in san francisco, Friendly Local Guides";
                break;
            case 'san-francisco-city-tour':
                $title = "One day in San Francisco: all must sees of the city - Friendly Local Guides";
                $meta = "San Francisco one day tour. Choose your own: 3, 5 or 7 hour tour with Friendly Local Guides.";
                $keywords = "1 day private city tour in san francisco, Friendly Local Guides";
                break;
            case '2-days-in-san-francisco':
                $title = "2 days in San Francisco: all tourist attractions in SF - Friendly Local Guides";
                $meta = "On this 2-day tour of San Francisco you`ll visit Golden Gate Park and Muir Woods, Golden Gate Bridge and Fisherman’s Wharf, Alcatraz and North Beach. ";
                $keywords = "2 day private city tour in san francisco, Friendly Local Guides";
                break;
            case '3-days-in-san-francisco':
                $title = "3 days in San Francisco: best restaurants and fun things to do - Friendly Local Guides";
                $meta = "3-day tour in San Francisco. Iconic symbols of San Francisco await you!";
                $keywords = "3 day private city tour in san francisco, Friendly Local Guides";
                break;
            case 'san-francisco-walking-tours':
                $title = "San Francisco walking tours - Friendly Local Guides";
                $meta = "Private walking tour to San Francisco: 5, 7 or even 10-hour duration with your local guide.";
                $keywords = "private walking city tour in san francisco, Friendly Local Guides";
                break;
            case 'san-francisco-bike-tours':
                $title = "San Francisco bike tours - Friendly Local Guides";
                $meta = "Best bike tours in San Francisco. See places of SF you might not see on your own with Friendly Local Guides.";
                $keywords = "private bike tour in san francisco, Friendly Local Guides";
                break;
            case 'san-francisco-night-tour':
                $title = "San Francisco night tour, private SF tours - Friendly Local Guides";
                $meta = "Enjoy San Francisco night tour with Friendly Local Guides. Tour description, photos and reviews.";
                $keywords = "San Francisco night tours, private city night tours in San Francisco, Friendly Local Guides";
                break;

            case 'new-york-tour':
                $title = "1-Day New York City tour - Private tours with Friendly Local Guides";
                $meta = "Visit TOP 10 places in one day New York City tour: Central Park, The Metropolitan Museum of Art, Rockefeller Center, Grand Central Terminal, Times Square, Broadway and more.";
                $keywords = "1 day tour in New York, private New York tours, Friendly Local Guides";
                break;

            case '2-days-in-new-york':
                $title = "2-Day Tour in New York City - Friendly Local Guides";
                $meta = "Get ready for adventure time in New York City on this two-day tour in New York. Nearly 30 New York attractions: Empire State Building, Labyrinth streets, Downtown, Uptown and more!";
                $keywords = "2 days tour in New York City, private New York tours, Friendly Local Guides";
                break;

            case '3-days-in-new-york':
                $title = "3-Day Tour in New York City - Friendly Local Guides";
                $meta = "Take this three-day tour in New York City and explore over 40 attractions in NYC. Tour Itinerary, reviews and online booking.";
                $keywords = "3 days tour in New York, private New York tours, Friendly Local Guides";
                break;

            case 'food-tour-nyc':
                $title = "Walking Food Tour in New York City - Friendly Local Guides";
                $meta = "Taste best dishes on this food tour in New York City around the quaint East Village, Greenwich Village and otherfamous places. ";
                $keywords = "food tour in New York City, walking, private New York tours, Friendly Local Guides";
                break;

            case 'new-york-city-night-tour':
                $title = "New York City Night Tour - Friendly Local Guides";
                $meta = "Enjoy private night tour in New York City with our Friendly Local Guides. The tour can be customized to meet your preferences.";
                $keywords = "night tour in New York City, walking, nightlife, private New York tours, Friendly Local Guides";
                break;
            
            case 'new-york-city-tour':
                $title = "Private 5 Hour New York City Tour - Friendly Local Guides";
                $meta = "Best New York City private and custom 5-hour tour. Book now and visit 7 must-see NYC attractions.";
                $keywords = "private new york city tour, Friendly Local Guides";
                break;

            case 'lisbon-tour':
                $title = "1-Day in Lisbon, Potugal - Friendly Local Guides";
                $meta = "Visit TOP 10 places in Lisbon in 1 day with Friendly Local Guides: Commercial Square / Victory Arch, Rossio Square, Restauradores Square and Liberdade Avenue, Carmo Square, Chiado, Bairro Alto, The Mouraria, Lisbon's Castle neighbourhood, Lisbon Cathedral, The Alfama.";
                $keywords = "1 day tour in Lisbon, Lisbon private city tours, Commercial Square / Victory Arch, Rossio Square, Restauradores Square and Liberdade Avenue, Carmo Square, Chiado, Bairro Alto, The Mouraria, Lisbon's Castle neighbourhood, Lisbon Cathedral, The Alfama, Friendly Local Guides";
                break;

            case 'lisbon-city-tour':
                $title = "Lisbon City Tour, Potugal - Friendly Local Guides";
                $meta = "This Lisbon City tour is ideal for first time visitors. In this walking tour you can enjoy the most famous views of Portugal in the world.";
                $keywords = "Lisbon private city tours, visit, Portugal, Friendly Local Guides";
                break;break;

            case 'lisbon-photo-tour':
                $title = "Lisbon Photo Tour, Potugal - Friendly Local Guides";
                $meta = "At Lisbon Photography Tour you can visit most scenic views in city: the tallest building, the longest bridge, the one of the most ancient city areas and oldest church.";
                $keywords = "photo tour in Lisbon, Portugal, Lisbon private city tours, Friendly Local Guides";
                break;

            case '2-days-in-lisbon':
                $title = "2 Days Tour in Lisbon, Portugal - Friendly Local Guides";
                $meta = "Friendly Local Guides offers take you to the two days tour in Lisbon. See the most-famous icons of Lisbon and visit off the beaten path attractions.";
                $keywords = "2 days tour in Lisbon, Portugal, Lisbon private city tours, Friendly Local Guides";
                break;

            case '3-days-in-lisbon':
                $title = "3 Days Tour in Lisbon, Portugal - Friendly Local Guides";
                $meta = "Book your three days tour in Lisbon, Portugal with your friendly local guide. 3 days, 5 hours each day and 20 must-see Lisbon attractions.";
                $keywords = "3 days tour in Lisbon, Portugal, Lisbon private city tours, Friendly Local Guides";
                break;

            case 'lisbon-ny-night':
                $title = "Lisbon Night Walking Tour - Friendly Local Guides";
                $meta = "Discover local Portuguese nightlife on private Lisbon night tour. Get amazed with wonderful illumination of historical monuments which you'll never forget.";
                $keywords = "night tour in Lisbon, walking Lisbon private city tours, Friendly Local Guides";
                break;

            case 'lisbon-food-tour':
                $title = "Food Tasting Tour in Lisbon, Portugal - Friendly Local Guides";
                $meta = "Get unique gastronomic experience tasting traditional Portuguese cuisine in our private walking food tour in Lisbon. Check reviews and photos from this tour. ";
                $keywords = "food tour in Lisbon, eating, walking, tasting, Lisbon private city tours, Friendly Local Guides";
                break;

            case 'milan-tour':
                $title = "1 Day Tour in Milan, Italy - Friendly Local Guides";
                $meta = "Visit TOP 10 places in one-day tour in Milan: Duomo Cathedral, Galleria Vittorio Emanuele II, La Scala Theatre Opera House and more. Check the itinerary, reviews and photos.";
                $keywords = "1 day tour in Milan, private Milan tour, Italy, Friendly Local Guides";
                break;

            case 'milan-food-tour':
                $title = "Milan Food Walking Tour, Italy - Friendly Local Guides";
                $meta = "Tasty pizza, pasta, risotto on walking food tour of Milan. Italian breakfast, lunch, or dinner in the very best Milan cafes & restaurants. ";
                $keywords = "milan food walking tour, best private city tours in milan, italy, Friendly Local Guides";
                break;

            case 'milan-night-tour':
                $title = "Milan Night Tour, Italy - Friendly Local Guides";
                $meta = "Book guided Milan night tour, discover best attractions in capital of Italy. Check photos and reviews from Milan By Night tour.";
                $keywords = "milan night tour, best private city tours in milan, italy, Friendly Local Guides";
                break;

            case 'milan-city-tour':
                $title = "Milan private city tour, Italy - Friendly Local Guides";
                $meta = "Best private city tour in Milan, Italy: Navigli district, Porta Ticinese, San Lorenzo Columns, Duomo Square, Galleria and more. Book now and explore best tourist attractions in Milan.";
                $keywords = "best private city tours in milan, italy, Friendly Local Guides";
                break;

            case 'milan-photo-walking-tour':
                $title = "Walking tour in Milan, Italy - Friendly Local Guides";
                $meta = "Book private Milan walking tour and explore the city with friendly local guide. Visit Piazza Affari, Accademia Brera, Giardino Botanico Brera, Gae Aulenti Square and Alval Alto Square​.";
                $keywords = "walking city tour milan, italy, private, guided, Friendly Local Guides";
                break;

            case '2-days-in-milan':
                $title = "2-Day Tour in Milan, Italy - Friendly Local Guides";
                $meta = "Explore attractions, check the best points for shopping, see famous masterpieces of art in two-day Milan tour. Reviews, photos and online booking.";
                $keywords = "milan 2 days tour, best private city tours in milan, italy, Friendly Local Guides";
                break;

            case '3-days-in-milan':
                $title = "3-Day tour in Milan, Italy - Friendly Local Guides";
                $meta = "Enjoy private and customized three-day tour in Milan with your friendly local guide. Book now and explore must-see attractions and off the beaten path  of Milan.";
                $keywords = "3 days tour in Milan, Italy, private, customized, Friendly Local Guides";
                break;

            case 'los-angeles-tour':
                $title = "1 day tour in Los Angeles and 10 Top Things to Do - Friendly Local Guides";
                $meta = "Visit TOP 10 places in Los Angeles in 1 day with Friendly Local Guides: Staples, Walt Disney Concert Hall, Microsoft Theater, LA Live, Bradbury Building, Grand Park, Museum of Contemporary Art, Hollywood boulevard, Walk of Fame, Grauman’s Chinese and Dolby Theaters.";
                $keywords = "1 day tour in Los Angeles, 10 Top Things to Do in LA, Hollywood, Staples, Walt Disney Concert Hall, Microsoft Theater, LA Live, Bradbury Building, Grand Park, Museum of Contemporary Art, Hollywood boulevard, Walk of Fame, Grauman’s Chinese and Dolby Theaters, Friendly Local Guides";
                break;

            case 'los-angeles-city-tour':
                $title = "Private Los Angeles City Tour - Friendly Local Guides";
                $meta = "Join us on this Los Angeles city tour and discover TOP10 attractions of city. Easy online booking and flexible tour itinerary to suit your preferences.";
                $keywords = "best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case 'los-angeles-one-day-tour':
                $title = "1-Day Tour in Los Angeles, CA - Friendly Local Guides";
                $meta = "Visit best 14 places in Los Angeles in 1 day private tour with Friendly Local Guides. Itinerary plan, photos and reviews.";
                $keywords = "1 day tour los angeles, best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case '2-days-in-los-angeles':
                $title = "2-Day Tour in Los Angeles, CA - Friendly Local Guides";
                $meta = "Book 2 days in LA tour and enjoy top 25 things to do in LA, including Hollywood, Downtown LA, and off the beaten path of LA in between. Reviews and photos.";
                $keywords = "2 days tour in los angeles, best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case '3-days-in-los-angeles':
                $title = "3-Day Tour in Los Angeles, CA - Friendly Local Guides";
                $meta = "Visit over 30 must-see attractions during 3-day tour in Los Angeles. Santa Monica Pier, Rodeo Drive, Hollywood Walk of Fame and more! ";
                $keywords = "3 days los angeles tour, best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case 'hollywood-tour':
                $title = "Custom Hollywood tour, Los Angeles - Friendly Local Guides";
                $meta = "Private Hollywood tour (Los Angeles, CA) with all customized preferences. Itinerary of tour, reviews and photos.";
                $keywords = "hollywood los angeles tour, best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case 'los-angeles-driving-tour':
                $title = "Driving Tour of Los Angeles, CA - Friendly Local Guides";
                $meta = "Enjoy 3-hour private driving tour in Los Angeles and see the main highlights of city. Tour description, photos, reviews and online booking.";
                $keywords = "los angeles driving tour, best private city tours in los angeles, california, Friendly Local Guides";
                break;

            case 'los-angeles-night-tour':
                $title = "Night Tour in Los Angeles, CA - Friendly Local Guides";
                $meta = "Downtown Los Angeles night tour. Disсover best attractions in lights: Walt Disney Concert Hall, City Hall, Central Library, Hollywood Boulevard, Walk of Fame, Dolby Theater and more!";
                $keywords = "los angeles night tour, best private city tours in los angeles, california, Friendly Local Guides";
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

            case 'paris-city-tour':
                $title = "Private city tour in Paris, France - Friendly Local Guides";
                $meta = "Best private city tour in Paris, France: Trocadero, Eiffel Tower, Champs de Mars, Invalides, Grand Palais, Champs Elysées, Tuileries Park, Louvre, Ponts des Arts, Notre Dame, Park alongside Seine. Reviews, photos and online booking.";
                $keywords = "best private city tours in Paris, France, Friendly Local Guides";
                break;

            case 'one-day-in-paris':
                $title = "One Day in Paris Tour, France - Friendly Local Guides";
                $meta = "Best 1 day tour in Paris with flexible itinerary: Notre Dame, Ile de la Cité, Louvre, Tuileries, River Seine, Pont Alexandre III, Eiffel Tower, Champ de Mars, Champs Elysées, Arc de Triomphe and more! Reviews, photos and online booking.";
                $keywords = "one day in Paris tour, best private city tours in Paris, France, Friendly Local Guides";
                break;

            case '2-days-in-paris':
                $title = "2-Day Tour in Paris, France - Friendly Local Guides";
                $meta = "Visit TOP 20 places in Paris in 2 days: Louvre, Jardin des Tuileries, Eiffel tower, Palais Garnier, River Seine, Pont Alexandre III, Place des Vosges, Walking around Le Marais, ile St Louis, ile de la Cité, Notre Dame and others must sees.";
                $keywords = "2 Days tour in Paris, private tours, Friendly Local Guides, Louvre, Jardin des Tuileries, Eiffel tower, Palais Garnier, River Seine, Pont Alexandre III, Place des Vosges, Walking around Le Marais, ile St Louis, ile de la Cité, Notre Dame";
                break;

            case '3-days-in-paris':
                $title = "3 Days in Paris, France - Friendly Local Guides";
                $meta = "3-Day tour in Paris: flexible itinerary, must see attractions, reviews, photos and online booking.";
                $keywords = "three days in Paris tour, best private city tours in Paris, France, Friendly Local Guides";
                break;

            case 'paris-food-tour':
                $title = "Food and Wine Tour in Paris, France - Friendly Local Guides";
                $meta = "Enjoy food and sample wine on a private guided tour of Paris. Champs de Mars, St Germain des Pres, Le Procope, Ile St Louis, Marais, Stohrer Patisserie - all the best places for foodies in Paris!";
                $keywords = "paris food tours, best private city tours in Paris, France, Friendly Local Guides";
                break;

            case 'paris-night-tour':
                $title = "Paris Night Tour, France - Friendly Local Guides";
                $meta = "Admire night tour in Paris, France. Photos, reviews and tour itinerary: Place Vendome, Champs Elysees, Trocadero, Tour Eiffel, Champ de Mars, Seine embankments and St Germain des Pres.";
                $keywords = "night tour, private city tours in Paris, France, Place Vendome, Champs Elysees, Trocadero, Tour Eiffel, Champ de Mars, Seine embankments, St Germain des Pres, Friendly Local Guides";
                break;

            case 'montmartre-tour-in-paris':
                $title = "Montmartre Walking Tour in Paris, France - Friendly Local Guides";
                $meta = "Visit Place des Abbesses, Sacre Coeur, Moulin Rouge and more attractions during Montmartre guided tour in Paris. Photos, reviews and tour itinerary.";
                $keywords = "monmartre, private city tours in Paris, France, Friendly Local Guides";
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