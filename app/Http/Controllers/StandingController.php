<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StandingController extends Controller
{
//    public function standings()
//    {
//
//        $data= Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');
//
//        foreach ($data['leagueSchedule']['gameDates'] as $games) {
//            foreach ($games['games'] as $game) {
//                $input = [
//
//                        'gameDate' => $game['gameDateTimeEst'],
//
//                        'homeTeam' =>   $game['homeTeam']['teamName'],
//
//                        'awayTeam' =>   $game['awayTeam']['teamName'],
//
//                        'homeScore' =>   $game['homeTeam']['score'],
//
//                        'awayScore' =>    $game['awayTeam']['score'],
//
//                        'player' => $game['pointsLeaders'],
//
//                ];
//
//            }
//        }
//      $standings =  Standing::create($input);
//
//        $response = json_decode($data->getBody()->getContents());
//         // dd($standings);
//
//    }

    public function standings()
    {

        $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');

        json_encode($data);

        foreach ($data['leagueSchedule']['gameDates'] as $games) {
            foreach ($games['games'] as $game) {

                $standings = new Standing();

              //  $standings->gameDate = date("Y-m-d H:i:s", strtotime($game['gameDateTimeEst']." +12 hours"));
                $standings->gameDate = $game['gameDateEst'];
                $standings->homeTeam =   $game['homeTeam']['teamName'];
                $standings->awayTeam =   $game['awayTeam']['teamName'];
                $standings->homeScore =  $game['homeTeam']['score'];
                $standings->awayScore =    $game['awayTeam']['score'];
                foreach ($game['pointsLeaders'] as $player) {
                    $standings->player =  $player['firstName'] . $player['lastName'];
                    $standings->playerScore = $player['points'];
                }
                $standings->save();

            }
        }
    }
}
