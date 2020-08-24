<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\GameService;

class GameController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function createNewGame(GameService $game, Request $request) {
        $gameString = $request->get('gamestring');
        //current userID
        $userID = Auth::id();
        //make game
        $newGame = $game->newGame($userID, $gameString);

        return response($newGame, 200);

    }
}
