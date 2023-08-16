<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Goutte\Client;

class vistasController extends Controller
{
    public function mostrarScrapping($id){

        $propertyId = $id;

        $client = new Client();

        $url = 'https://www.airbnb.com/rooms/' . $propertyId;

        $crawler = $client->request('GET', $url);

        $images = $crawler->filter('picture img')->each(function ($node) {
            return $node->attr('src');
        });

        return view('imagenes', compact('images'));

    }
}
