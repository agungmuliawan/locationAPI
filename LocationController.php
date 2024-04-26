<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LocationController extends Controller
{
    //
    function index()
    {
        $provinsi = $this->getData('provinsi.json');
        return view('api', compact('provinsi'));
    }
    function getKabupaten($id)
    {
        $kabupaten = $this->getData("kabupaten/{$id}.json");
        dd($kabupaten);
        return response()->json($kabupaten);

        //  die();
    }
    function getKecamatan($id)
    {
        $kecamatan = $this->getData("kecamatan/{$id}.json");
        // dd($kecamatan);
        return response()->json($kecamatan);
    }
    // function getKelurahan($id)
    // {
    //     $kelurahan = $this->getData("kelurahan/{$id}.json");
    //     return response()->json($kelurahan);
    // }
    private function getData($endpoint)
    {
        $response = Http::get("https://ibnux.github.io/data-indonesia/{$endpoint}");
        return $response->json();
    }
}
