<?php

namespace App\Http\Controllers;

use App\Models\Standing;
use App\Models\Team;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class StandingController extends Controller
{

    public function index()
    {
        $east = Team::where('conference', '=', 'east')->orderBy('percent', 'desc')->get();
        $west = Team::where('conference', '=', 'west')->orderBy('percent', 'desc')->get();
        return view('teams.standings', compact('east', 'west'));
    }

    public function standings()
    {

        $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');

        json_encode($data);

        $is_reg_season = false;
        foreach ($data['leagueSchedule']['gameDates'] as $games) {
            foreach ($games['games'] as $game) {
                if (!$is_reg_season) {
                    $game_type_int = (int)substr($game['gameId'], 2, 1);
                    if ($game_type_int === 2) {
                        $is_reg_season = true;
                    }
                }
                if ($is_reg_season) {

                    $standings = new Standing();

                    $standings->gameID = $game['gameId'];
                    $standings->gameDate = $game['gameDateEst'];
                    $standings->homeTeam = $game['homeTeam']['teamName'];
                    $standings->awayTeam = $game['awayTeam']['teamName'];
                    $standings->homeScore = $game['homeTeam']['score'];
                    $standings->awayScore = $game['awayTeam']['score'];
                    foreach ($game['pointsLeaders'] as $player) {
                        $standings->player = substr($player['firstName'], 0, 1) . '. ' . $player['lastName'];
                        $standings->playerScore = $player['points'];
                    }
                    $standings->save();

                    $teamHome = Team::find($game['homeTeam']['teamId']);
                    $teamAway = Team::find($game['awayTeam']['teamId']);


                    if ($game['homeTeam']['score'] > $game['awayTeam']['score']) {
                        $teamHome->wins++;
                        $teamAway->losses++;

                    } else if ($game['homeTeam']['score'] < $game['awayTeam']['score']) {
                        $teamHome->losses++;
                        $teamAway->wins++;
                    }
                    $teamHome->percent = $teamHome->wins / ($teamHome->losses + $teamHome->wins);
                    $teamAway->percent = $teamAway->wins / ($teamAway->losses + $teamAway->wins);

                    $teamHome->save();
                    $teamAway->save();
                }
            }

        }
        return redirect()->route('posts.index');
    }

    public function standingsUpdate() {
        $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');

        json_encode($data);

        $yesterday = date('Y-m-d',strtotime("yesterday")) . "T00:00:00Z";

        $is_reg_season = false;
        foreach ($data['leagueSchedule']['gameDates'] as $games) {
            foreach ($games['games'] as $game) {
                if (!$is_reg_season) {
                    $game_type_int = (int)substr($game['gameId'], 2, 1);
                    if ($game_type_int === 2) {
                        $is_reg_season = true;
                    }
                }
                if ($is_reg_season && $game['gameDateEst']==$yesterday) {


                    $standings = Standing::find($game['gameId']);


                    $standings->gameID = $game['gameId'];
                    $standings->gameDate = $game['gameDateEst'];
                    $standings->homeTeam = $game['homeTeam']['teamName'];
                    $standings->awayTeam = $game['awayTeam']['teamName'];
                    $standings->homeScore = $game['homeTeam']['score'];
                    $standings->awayScore = $game['awayTeam']['score'];
                    foreach ($game['pointsLeaders'] as $player) {
                        $standings->player = substr($player['firstName'], 0, 1) . '. ' . $player['lastName'];
                        $standings->playerScore = $player['points'];
                    }
                    $standings->save();

                    $teamHome = Team::find($game['homeTeam']['teamId']);
                    $teamAway = Team::find($game['awayTeam']['teamId']);


                    if ($game['homeTeam']['score'] > $game['awayTeam']['score']) {
                        $teamHome->wins++;
                        $teamAway->losses++;

                    } else if ($game['homeTeam']['score'] < $game['awayTeam']['score']) {
                        $teamHome->losses++;
                        $teamAway->wins++;
                    }
                    $teamHome->percent = $teamHome->wins / ($teamHome->losses + $teamHome->wins);
                    $teamAway->percent = $teamAway->wins / ($teamAway->losses + $teamAway->wins);

                    $teamHome->save();
                    $teamAway->save();
                }
            }

        }
        return redirect()->route('posts.index');
    }

    public function results() {
        $results = Standing::orderBy('gameDate','DESC')->get();
        $teams = Team::all();
        $yesterday = date('Y-m-d',strtotime("yesterday")) . "T00:00:00Z";
        $tomorrow =   date('Y-m-d',strtotime("+1 day")) . "T00:00:00Z";

        return view('teams.results', compact('results','teams','yesterday','tomorrow',));
    }

        public function schedule(Request $request) {
            $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');
            $teams = Team::all();
            $tomorrow =   date('Y-m-d',strtotime("today")) . "T00:00:00Z";
            $filter_team = $request->team;
            return view('teams.schedule', compact('data','teams','tomorrow','filter_team'));
        }

        public function teamSchedule( Request $request) {
            $data = Http::get('https://cdn.nba.com/static/json/staticData/scheduleLeagueV2_9.json');
            $teams = Team::all();
            $tomorrow =   date('Y-m-d',strtotime("+1 day")) . "T00:00:00Z";
            $filter_team = $request->team;

            return view('teams.schedule', compact('data','filter_team','teams','filter_team','tomorrow'));
        }

    public function oneTeam($team) {
        $homeresults = Standing::where('homeTeam',$team)->orderBy('gameDate','DESC')->get();
        $awayresults = Standing::where('awayTeam',$team)->orderBy('gameDate','DESC')->get();
        $teams = Team::all();

        return view('teams.oneteam', compact('homeresults','awayresults','teams'));
    }


}
