<?php

namespace App\Http\Controllers;

use App\TCategoria;
use App\TDestino;
use App\TPaquete;
use App\TPaqueteDestino;
use App\TTestimonio;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        SEOMeta::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/');
        SEOMeta::addKeyword(['peru travel packages', 'travel packages to peru', 'Go To Peru', 'machu picchu travel', 'peru vacations', 'peru vacation packages', 'machu picchu deals', 'peru travel offers', 'machu picchu travel offers', 'Machu Picchu packages', 'customize peru travel packages', 'tour packages to machu picchu']);

        OpenGraph::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        OpenGraph::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        OpenGraph::setUrl('https://gotoperu.com/');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');


        $paquetes = TPaquete::with('precio_paquetes')->get();
        $paquetes_r = TPaquete::with('precio_paquetes')->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
//        dd($paquete_destinos);
        return view('page.home',['paquetes'=>$paquetes, 'paquete_destinos'=>$paquete_destinos, 'paquetes_r'=>$paquetes_r]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function packages()
    {
        SEOMeta::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/packages');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        OpenGraph::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        OpenGraph::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        OpenGraph::setUrl('https://gotoperu.com/packages');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        $paquetes = TPaquete::with('precio_paquetes')->get();
        $paquetes_r = TPaquete::with('precio_paquetes')->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        return view('page.packages',['paquetes'=>$paquetes, 'paquete_destinos'=>$paquete_destinos, 'paquetes_r'=>$paquetes_r]);
    }

    public function packages_durations($duration)
    {
        $paquetes = TPaquete::with('precio_paquetes')->where('duracion', $duration)->get();
        $paquetes_r = TPaquete::with('precio_paquetes')->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();


        SEOMeta::setTitle('Travel Packages '.$duration.' days - Peru Travel Packages | Machu Picchu Tour Packages');
        SEOMeta::setDescription('Travel Packages '.$duration.' days. Discover Peru with Gotoperu Tour & Travel Packages. We offer amazing deals on Machu Picchu Vacation Packages.  Give us call @ (202) 996-3000 for more info.');
        SEOMeta::setCanonical('https://gotoperu.com/packages');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        OpenGraph::setDescription('Travel Packages '.$duration.' days. Discover Peru with Gotoperu Tour & Travel Packages. We offer amazing deals on Machu Picchu Vacation Packages.  Give us call @ (202) 996-3000 for more info.');
        OpenGraph::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        OpenGraph::setUrl('https://gotoperu.com/packages');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Packages '.$duration.' days - Peru Travel Packages | Machu Picchu Tour Packages');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');



        return view('page.packages-durations',['paquetes'=>$paquetes, 'paquete_destinos'=>$paquete_destinos, 'paquetes_r'=>$paquetes_r, 'duration'=>$duration]);
    }


    public function packages_list()
    {

        SEOMeta::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/packages');
        SEOMeta::addKeyword(['Machu Picchu Tour Packages', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        OpenGraph::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        OpenGraph::setTitle('Machu Picchu Tour Packages | Machu Picchu Vacation Packages | Machu Picchu Deals | Peru Honeymoon Travel Packages');
        OpenGraph::setUrl('https://gotoperu.com/packages');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Packages to Peru | Peru Vacations | Machu Picchu Travel');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');


        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get();
        $categoria = TCategoria::get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();


        return view('page.packages-list', ['paquete'=>$paquete, 'paquete_destinos'=>$paquete_destinos, 'categoria'=>$categoria]);

//        $paquetes = TPaquete::with('precio_paquetes')->get();
//        $paquetes_r = TPaquete::with('precio_paquetes')->get();
//        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
//        return view('page.packages-list',['paquetes'=>$paquetes, 'paquete_destinos'=>$paquete_destinos, 'paquetes_r'=>$paquetes_r]);
    }

    public function itinerary($titulo, $days)
    {
        $title = str_replace('-', ' ', strtoupper($titulo));
//        dd($title);
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->where('estado', 0)->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        $paquete_iti = TPaquete::with('itinerario','paquetes_destinos', 'precio_paquetes')->where('titulo', $title)->get();

//        foreach ($paquete_iti as $paq_i) {
//
//            SEOMeta::setTitle($paq_i->s_title);
//            SEOMeta::setDescription($paq_i->s_description);
////            SEOMeta::setCanonical('https://gotoperu.com/packages');
//            SEOMeta::addKeyword([$paq_i->s_keyword]);
//
//            OpenGraph::setDescription($paq_i->s_description);
//            OpenGraph::setTitle($paq_i->s_titile);
////            OpenGraph::setUrl('http://new-goto.nu/packages/inca-trail-to-machu-picchu/4-days-tours');
//            OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
//            OpenGraph::setSiteName('goto-peru');
//            OpenGraph::addProperty('type', 'website');
//
//            \Twitter::setType('summary');
//            \Twitter::setTitle($paq_i->s_twtitle);
//            \Twitter::setSite($paq_i->s_twsite);
//            \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');
//        }

        SEOMeta::setTitle('Travel Packages: '.ucwords(strtolower($title)).' | GotoPeru');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/packages');
//        SEOMeta::addKeyword(['Best Peru Trip Packages', 'Peru Machu Picchu Tours']);

        OpenGraph::setDescription('Our team has many years of experience in travel organization and our main goal is providing an unforgettable experience.');
        OpenGraph::setTitle('Travel Packages: '.ucwords(strtolower($title)).' | GotoPeru');
        OpenGraph::setUrl('https://gotoperu.com/packages');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto peru');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Packages: '.ucwords(strtolower($title)).' | GotoPeru');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        return view('page.itinerary', ['title'=>$title, 'paquete_iti'=>$paquete_iti, 'paquete_destinos'=>$paquete_destinos, 'paquete'=>$paquete]);

    }

    public function destinations()
    {
        SEOMeta::setTitle('South America Travel Destinations | Customized Travel Packages');
        SEOMeta::setDescription('Discover beautiful places to visit in south america tours with gotoperu. Experience best places in south america - peru, bolivia, ecuador, brasil.');
        SEOMeta::setCanonical('https://gotoperu.com/destinations');
        SEOMeta::addKeyword(['Customized travel Packages', 'South America Travel', 'South America Travel Destinations', 'Peru Travel Packages']);

        OpenGraph::setDescription('Discover beautiful places to visit in south america tours with gotoperu. Experience best places in south america - peru, bolivia, ecuador, brasil.');
        OpenGraph::setTitle('South America Travel Destinations | Customized Travel Packages');
        OpenGraph::setUrl('https://gotoperu.com/destinations');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('South America Travel Destinations | Customized Travel Packages');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        return view('page.destinations');
    }

    public function destinations_country($title)
    {
        $pais = explode('-', $title);
        $pais = $pais[0];
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get();
        $categoria = TCategoria::get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        $paquetes_de = TPaqueteDestino::with(['destinos'=>function($query) use ($pais) { $query->where('pais', $pais);}])->get();
        $destinos = TDestino::get();
        $destinos_p = TDestino::where('pais', $pais)->get();


        SEOMeta::setTitle(''.ucwords($pais).' Travel Destinations | Customized '.ucwords($pais).' Travel Packages');
        SEOMeta::setDescription('Discover beautiful places to visit in '.ucwords($pais).' with GotoPeru..');
        SEOMeta::setCanonical('https://gotoperu.com/destinations/'.$pais.'-travel');
        SEOMeta::addKeyword([''.ucwords($pais).' travel Packages', 'South America Travel', 'South America Travel Destinations']);

        OpenGraph::setDescription('Discover beautiful places to visit in '.ucwords($pais).' with GotoPeru..');
        OpenGraph::setTitle(''.ucwords($pais).' Travel Destinations | Customized '.ucwords($pais).' Travel Packages');
        OpenGraph::setUrl('https://gotoperu.com/destinations/'.$pais.'-travel');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle(''.ucwords($pais).' Travel Destinations | Customized '.ucwords($pais).' Travel Packages');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');


        return view('page.destinations-country', ['paquete'=>$paquete, 'paquetes_de'=>$paquetes_de, 'categoria'=>$categoria, 'destinos'=>$destinos, 'destinos_p'=>$destinos_p, 'pais'=>$pais, 'paquete_destinos'=>$paquete_destinos]);

//        return view('page.destinations-country');
    }

    public function destinations_country_show($title, $city)
    {
        $pais = explode('-travel', $title);
        $pais = $pais[0];
        $ciudad = explode('-tours', $city);
        $ciudad = $ciudad[0];
        $ciudad = str_replace('-', ' ', $ciudad);
        $destinations = str_replace('-', ' ', ucwords(strtolower($title)));
        $paquete = TPaquete::with('paquetes_destinos', 'precio_paquetes')->get();
        $categoria = TCategoria::get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        $destinos = TDestino::get();
        $destinos_p = TDestino::where('pais', $pais)->get();

        $paquetes_de = TPaqueteDestino::with(['destinos'=>function($query) use ($ciudad) { $query->where('nombre', $ciudad);}])->get();



        SEOMeta::setTitle(''.ucwords($ciudad).' Tours | '.ucwords($ciudad).' Travel Offers | Cheap '.ucwords($ciudad).' Deals');
        SEOMeta::setDescription('Plan your vacations in '.ucwords($ciudad).' with our affordable tour packages and enjoy the astounding structures, stunning beaches, lush landscapes and much more!');
        SEOMeta::setCanonical('https://gotoperu.com/destinations/'.$pais.'-travel/'.$city.'');
        SEOMeta::addKeyword([''.ucwords($ciudad).' Tours', ''.ucwords($ciudad).' Travel Offers', 'Cheap '.ucwords($ciudad).' Deals']);

        OpenGraph::setDescription('Plan your vacations in '.ucwords($ciudad).' with our affordable tour packages and enjoy the astounding structures, stunning beaches, lush landscapes and much more!');
        OpenGraph::setTitle(''.ucwords($ciudad).' Tours | '.ucwords($ciudad).' Travel Offers | Cheap '.ucwords($ciudad).' Deals');
        OpenGraph::setUrl(['url'=>'https://gotoperu.com/destinations/'.$pais.'-travel/'.$city.'']);
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle(''.ucwords($ciudad).' Tours | '.ucwords($ciudad).' Travel Offers | Cheap '.ucwords($ciudad).' Deals');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');



        return view('page.destinations-country-show', ['paquete'=>$paquete, 'paquete_destinos'=>$paquete_destinos, 'categoria'=>$categoria, 'destinos'=>$destinos, 'destinos_p'=>$destinos_p, 'pais'=>$pais, 'paquetes_de'=>$paquetes_de, 'ciudad'=>$ciudad]);
    }

    public function about()
    {

        SEOMeta::setTitle('About Us | GotoPeru');
        SEOMeta::setDescription('Our team has many years of experience in travel organization and our main goal is providing an unforgettable experience.');
        SEOMeta::setCanonical('https://gotoperu.com/about-us');
//        SEOMeta::addKeyword(['Best Peru Trip Packages', 'Peru Machu Picchu Tours']);

        OpenGraph::setDescription('Our team has many years of experience in travel organization and our main goal is providing an unforgettable experience.');
        OpenGraph::setTitle('About Us | GotoPeru');
        OpenGraph::setUrl('https://gotoperu.com/about-us');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto peru');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        \Twitter::setType('summary');
        \Twitter::setTitle('About Us | GotoPeru');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        return view('page.about');
    }

    public function getting()
    {
        SEOMeta::setTitle('Getting To Peru | GotoPeru');
        SEOMeta::setDescription('Call our destination specialist today @ (202) 996-3000 & Book a tour in South America. Our specialist will provide you best knowledge about various air travel packages to Peru.');
        SEOMeta::setCanonical('https://gotoperu.com/getting-to-peru');
//        SEOMeta::addKeyword(['Best Peru Trip Packages', 'Peru Machu Picchu Tours']);

        OpenGraph::setDescription('Call our destination specialist today @ (202) 996-3000 & Book a tour in South America. Our specialist will provide you best knowledge about various air travel packages to Peru.');
        OpenGraph::setTitle('Getting To Peru | GotoPeru');
        OpenGraph::setUrl('https://gotoperu.com/getting-to-peru');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto peru');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        \Twitter::setType('summary');
        \Twitter::setTitle('Getting To Peru | GotoPeru');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        return view('page.getting');
    }

    public function testimonials()
    {
        SEOMeta::setTitle('Goto Peru Reviews & Testimonials | Goto Peru');
        SEOMeta::setDescription('If you are looking for a travel agency located in Peru, read our travelers testimonials and find out why they loved travelling with GOTOPERU!');
        SEOMeta::setCanonical('https://gotoperu.com/testimonials');
//        SEOMeta::addKeyword(['Best Peru Trip Packages', 'Peru Machu Picchu Tours']);

        OpenGraph::setDescription('If you are looking for a travel agency located in Peru, read our travelers testimonials and find out why they loved travelling with GOTOPERU!');
        OpenGraph::setTitle('Goto Peru Reviews & Testimonials | Goto Peru');
        OpenGraph::setUrl('https://gotoperu.com/testimonials');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto peru');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        \Twitter::setType('summary');
        \Twitter::setTitle('Goto Peru Reviews & Testimonials | Goto Peru');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

//        $users = DB::table('users')->paginate(15);
        $testimonials = TTestimonio::paginate(5);
//        $testimonials->withPath('custom/url');
//        return view('user.index', ['users' => $users]);
        return view('page.testimonials', ['testimonials' => $testimonials]);
    }

    public function faq()
    {
        SEOMeta::setTitle('Frequently Asked Questions | GoTo Peru');
        SEOMeta::setDescription('Call our destination specialist today @ (202) 996-3000 & Book a tour in South America. Our specialist will provide you best knowledge about various air travel packages to Peru.');
        SEOMeta::setCanonical('https://gotoperu.com/faq');
//        SEOMeta::addKeyword(['Best Peru Trip Packages', 'Peru Machu Picchu Tours']);

        OpenGraph::setDescription('Call our destination specialist today @ (202) 996-3000 & Book a tour in South America. Our specialist will provide you best knowledge about various air travel packages to Peru.');
        OpenGraph::setTitle('Frequently Asked Questions | GoTo Peru');
        OpenGraph::setUrl('https://gotoperu.com/faq');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto peru');
        OpenGraph::addProperty('type', 'website');
        OpenGraph::addProperty('locale', 'en_US');

        \Twitter::setType('summary');
        \Twitter::setTitle('Frequently Asked Questions | GoTo Peru');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

        return view('page.faq');
    }

    public function agents()
    {
        return view('page.agents');
    }

    public function deals()
    {
        SEOMeta::setTitle('Travel Deals Peru | Machu Picchu Vacation Packages | Machu Picchu Deals');
        SEOMeta::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        SEOMeta::setCanonical('https://gotoperu.com/packages');
        SEOMeta::addKeyword(['Travel Deals Peru', 'Machu Picchu Packages', 'Machu Picchu Vacation Packages', 'Machu Picchu Deals', 'Peru Honeymoon Travel Packages']);

        OpenGraph::setDescription('Want to travel to Peru? GoToPeru offers a variety travel packages all over Peru. Call one of our offices today to start planning your Machu Picchu trip!');
        OpenGraph::setTitle('Travel Deals Peru | Machu Picchu Vacation Packages | Machu Picchu Deals');
        OpenGraph::setUrl('https://gotoperu.com/packages');
        OpenGraph::addImages(['url'=>'https://gotoperu.com/images/banners/cusco.jpg']);
        OpenGraph::setSiteName('goto-peru');
        OpenGraph::addProperty('type', 'website');

        \Twitter::setType('summary');
        \Twitter::setTitle('Travel Deals Peru | Machu Picchu Vacation Packages | Machu Picchu Deals');
        \Twitter::setSite('@GOTOPERUCOM');
        \Twitter::addImage('https://gotoperu.com/images/banners/cusco.jpg');

//        $paquetes = TPaquete::with('precio_paquetes')->where('descuento', 1)->get();
        $paquetes = TPaquete::with('precio_paquetes')->orwhere('descuento', 1)->orwhere('descuento', 2)->orwhere('descuento', 3)->get();
        $paquetes_r = TPaquete::with('precio_paquetes')->get();
        $paquete_destinos = TPaqueteDestino::with('destinos')->get();
        return view('page.travel-deals',['paquetes'=>$paquetes, 'paquete_destinos'=>$paquete_destinos, 'paquetes_r'=>$paquetes_r]);
//        return view('page.travel-deals');
    }

    public function inquire()
    {
        $from = 'info@gotoperu.com';
        $from2 = 'paul@gotoperu.com';

        $accommodation = $_POST['txt_accommodation'];
        $number = $_POST['txt_number'];

        $date = $_POST['txt_date'];
        $tel = $_POST['txt_tel'];
        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $package = $_POST['txt_package'];

        $comment = $_POST['txt_comment'];


        try {
            Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'notifications.page.admin-form-inquire'], [
                'accommodation' => $accommodation,
                'number' => $number,

                'date' => $date,
                'tel' => $tel,
                'name' => $name,
                'email' => $email,
                'package' => $package,
                'comment' => $comment
            ], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('GOTOPERU')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


//            Mail::send(['html' => 'notifications.page.admin-form-inquire'], [
//                'accommodation' => $accommodation,
//                'number' => $number,
//
//                'date' => $date,
//                'tel' => $tel,
//                'name' => $name,
//                'email' => $email,
//                'package' => $package,
//                'comment' => $comment
//            ], function ($messaje) use ($from2) {
//                $messaje->to($from2, 'GotoPeru')
//                    ->subject('GOTOPERU')
//                    /*->attach('ruta')*/
//                    ->from('hidalgochpnce@gmail.com', 'GotoPeru');
//            });


            return 'Thank you.';

        }
        catch (Exception $e){
            return $e;
        }

//        return view('page.itinerary', ['paquete'=>$paquete, 'paquete_destinos'=>$paquete_destinos]);
    }

    public function contact()
    {
        $from = 'info@gotoperu.com';
        $from2 = 'catanopaul@gmail.com';

        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $phone = $_POST['txt_phone'];
        $comment = $_POST['txt_comentario'];


        try {
            Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'notifications.page.admin-from-contact'], [
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'comment' => $comment
            ], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru ES')
                    ->subject('GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


//            Mail::send(['html' => 'notifications.page.admin-from-contact'], [
//                'name' => $name,
//                'email' => $email,
//                'comment' => $comment
////                'comment' => $comment
//            ], function ($messaje) use ($from2) {
//                $messaje->to($from2, 'GotoPeru ES')
//                    ->subject('GotoPeru ES')
//                    /*->attach('ruta')*/
//                    ->from('info@gotoperu.com', 'GotoPeru ES');
//            });


            return 'Thank you.';

        }
        catch (Exception $e){
            return $e;
        }

//        return view('page.itinerary', ['paquete'=>$paquete, 'paquete_destinos'=>$paquete_destinos]);
    }

    public function design()
    {
        $from = 'info@gotoperu.com';
        $from2 = 'paul@gotoperu.com';

        $destinations = $_POST['txt_destinations'];

        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $country = $_POST['txt_country'];
        $date = $_POST['txt_date'];
        $number = $_POST['txt_number'];
        $duration = $_POST['txt_duration'];
        $comment = $_POST['txt_comment'];


        try {
            Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $name], function ($messaje) use ($email, $name) {
                $messaje->to($email, $name)
                    ->subject('GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


            Mail::send(['html' => 'notifications.page.admin-form-design'], [
                'destinations' => $destinations,
                'name' => $name,
                'email' => $email,
                'country' => $country,
                'date' => $date,
                'number' => $number,
                'duration' => $duration,
                'comment' => $comment
            ], function ($messaje) use ($from) {
                $messaje->to($from, 'GotoPeru')
                    ->subject('GotoPeru')
                    /*->attach('ruta')*/
                    ->from('info@gotoperu.com', 'GotoPeru');
            });


//            Mail::send(['html' => 'notifications.page.admin-form-design'], [
//                'destinations' => $destinations,
//                'other' => $other,
//                'duration' => $duration,
//                'number' => $number,
//                'date' => $date,
//                'name' => $name,
//                'email' => $email,
//                'tel' => $tel
////                'comment' => $comment
//            ], function ($messaje) use ($from2) {
//                $messaje->to($from2, 'Andes Viagens')
//                    ->subject('AndesViagens')
//                    /*->attach('ruta')*/
//                    ->from('diana@andesviagens.com', 'andesviagens.com');
//            });


            return 'Thank you.';

        }
        catch (Exception $e){
            return $e;
        }

//        return view('page.itinerary', ['paquete'=>$paquete, 'paquete_destinos'=>$paquete_destinos]);
    }

    public function pagenotfound()
    {
        SEOMeta::setTitle('404');
        return view('errors.503');
    }
}
