<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use Spatie\ArrayToXml\ArrayToXml;

class WebPageController extends Controller
{
	private $url, $param;

    //
    public function index()
    {
    	$context = [
    		'title' => 'Arca::Backend | Test::Backend',
    		'favico' => 'https://www.arcacorp.com/img/arca_logo_small.png',
    		'canonical' => 'https://www.arcacorp.com/',
    		'meta_desc' => 'PT Arca International - Arca International Corporation',
    		'meta_key' => 'PT Arca International - Arca International Corporation',
    		'meta_author' => 'Arca::Backend | Test::Backend',
    		'og_url' => 'https://www.arcacorp.com/',
    		'og_type' => 'website',
    		'og_site_name' => 'Arca::Backend | Test::Backend',
    		'og_title' => 'Arca::Backend | Test::Backend',
    		'og_desc' => 'PT Arca International - Arca International Corporation',
    		'og_image' => 'https://www.arcacorp.com/img/arca_logo.png',
    		'og_image_width' => '600',
    		'og_image_height' => '590'
    	];
    	return view('webpage.home.index', $context);
    }

    // public function setContent($url, $param)
    // {
    // 	$this->url = $url;
    // 	$this->param = $param;
    // }

    // public function getContent($index, $id)
    // {
    // 	// echo $url;
    // 	$data = curl_init();
    // 	curl_setopt($data, CURLOPT_URL, $this->url);
    // 	curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
    // 	$result = curl_exec($data);
    // 	curl_close($data);

    // 	$first_step = explode(',', $result);
    // 	$get_header = $first_step[48];
    // 	$header = explode(" ", $get_header);

    // 	var_dump($header);

    // }
}
