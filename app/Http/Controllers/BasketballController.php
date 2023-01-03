<?php

namespace App\Http\Controllers;

use App\Models\Basketball;
use App\Models\Fixture;
use App\Models\Post;
use DateTime;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BasketballController extends Controller
{
    private $results = array();
    private $results2 = array();
    private $antraste = array();

//    public function scraper()
//    {
//        $client = new Client();
//        $url = 'https://www.worldometers.info/coronavirus/';
//        $page = $client->request('GET', $url);
//
//        /*echo "<pre>";
//        print_r($page);*/
//
//        // echo $page->filter('.maincounter-number')->text();
//
//        $page->filter('#maincounter-wrap')->each(function ($item) {
//            $this->results[$item->filter('h1')->text()] = $item->filter('.maincounter-number')->text();
//        });
//
//        $data = $this->results;
//
//        return view('scraper', compact('data'));
//    }

    public function scraper()
    {
        $client = new Client();
        $url = 'https://www.basketnews.lt/lygos/59-nacionaline-krepsinio-asociacija/lenteles.html';
        $page = $client->request('GET', $url);

//        echo "<pre>";
//        print_r($page);

        // echo $page->filter('.divTable')->text();

//        foreach($xpath->query('//table')->item(0)->getElementsByTagName('tr') as $rows) {
//            $cells = $rows->getElementsByTagName('td');
//
//            // Do stuff with the data
//            echo $cells->item(0)->textContent;
//            echo $cells->item(1)->textContent;
//            echo $cells->item(2)->textContent;

//        $table = $page->filter('.divTable')->filter('.tbody')->each(function ($tr) {
//            return $tr->filter('.trow')->each(function ($td) {
//                $td->filter('a')->each(function ($a) {
//                    return $a->attr('href');
//                });
//            });
//        });

//        $table = $page->filter('stats_01')->filter('thead')->each(function ($tr, $i) {
//            return $tr->filter('tr')->each(function ($th, $i) {
//                return $th->filter('th');
//            });
//        });

        $page->filter('.stats_01_title')->each(function ($item) {
            $this->antraste[$item->filter('strong')->text()] = $item->filter('strong')->text();
        });

        $antrastes = $this->antraste;


        $page->filter('.stats_01')->each(function ($item) {
            $this->results[$item->filter('.title')->text()] = $item->filter('th')->text();
        });

        $data = $this->results;

        $page->filter('.stats_01')->each(function ($item) {
            $this->results2[$item->filter('.body_row')->text()] = $item->filter('td')->text();
        });

        $data2 = $this->results2;
       // print_r($data);

//        $page->filter('.stats_01')->each(function ($node) {
//            print_r( $node->html()."\n");
//        });

        return view('scraper', compact('antrastes','data','data2'));
    }

//    public function scraper() {
//
//        $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');
//        date_default_timezone_set('America/New_York');
//        $todays_date = date('Y-m-d') . "T00:00:00Z";
////        foreach ($data['leagueSchedule']['gameDates'] as $games) {
////            foreach ($games['games'] as $game) {
////                if ($todays_date === $game['gameDateEst']) {
////                    $date_time = DateTime::createFromFormat('Y-m-d H:i:s', str_replace(["T", "Z"], [" ", ""], $game['gameDateTimeEst']));
////                    $date_formatted = $date_time->format('g:ia D jS M Y');
////                    $home_team = $game['homeTeam']['teamName'];
////                    $away_team = $game['awayTeam']['teamName'];
////
//                    return view('posts.index', compact('data','todays_date'));
//////    }
////                }
////            }
////        }
//
//
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all()->where('category_id', '==',1);

        return view('basketball.index',['posts'=>$posts]);
    }

    public function fixtures(){

        $fixtures=Fixture::all();

        return view('basketball.nba',['fixtures'=>$fixtures]);
    }

    public function euroleague()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',1)->get()]);
    }
    public function lkl()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',2)->get()]);
    }
    public function nba()
    {
        return view('basketball.index',['posts'=>Post::where('subcategory_id',3)->get()]);
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
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function show(Basketball $basketball)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function edit(Basketball $basketball)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basketball $basketball)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Basketball  $basketball
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basketball $basketball)
    {
        //
    }
}
