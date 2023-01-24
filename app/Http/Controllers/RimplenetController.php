<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RimplenetController extends Controller
{
    public $url = 'https://test1.kubectl.bluudigital.com/wp-json/rimplenet/v1';

    public function __construct()
    {
        // Http::post($this->url.'/authorize', []);
    }

    public function create()
    {
        $resp = Http::post($this->url.'/authorize', []);
        dump($resp->body());

    }
}
