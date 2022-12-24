<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BioWisatacontroller extends Controller
{
    public function __construct()
    {
        $this->Wisata = new Wisata();
    }

    public function index(){
        $BioWisata = $this->Wisata->allLokasi();
        return view('frontend.bio_wisata', ['BioWisata' => $BioWisata]);
    }
}
