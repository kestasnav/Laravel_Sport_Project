<?php

namespace App\Console\Commands;

use App\Models\Standing;
use App\Models\Team;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        info("Cron Job running at ". now());

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
    }
}
