<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://www.day.lt/");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $response = curl_exec($ch);

        if ($response === false) {
            $response = curl_error($ch);
        }
        curl_close($ch);
        preg_match_all('/(<a[^>]*href="vardai\/([^>]+)")(\>(.*?)\<)/', $response, $matches);

        return view('names', [
            'matches' => $matches[4]
            ]);
    }
}
