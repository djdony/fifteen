<?php

namespace App\Services;

use App\Game;

class GameService
{

    protected function board() {
        $board[0] = [1, 2, 3, 4];
        $board[1] = [5, 6, 7, 8];
        $board[2] = [9, 10, 11, 12];
        $board[3] = [13, 14, 15, 0];

        return $board;
    }

    public function newGame($userID, $gameString = null) {
        //random fields if no string passed
        if ($gameString == null){
            $gameString = $this->gameToString($this->board());
        }

        return $this->makeGame($userID, $gameString);

    }

    public function makeGame($userId, $gameString) {
        $game = new Game();
        $game->user_id = $userId;
        $game->startgame = now();
        $game->gamestring = $gameString;
        $game->save();

        return $game;
    }

    protected function gameToString($game) {
        $string = "";
        foreach($game as $value){
            $string .= implode(",", $value).",";
        }
        $string = substr($string, 0, -1);

        return $string;
    }

    public function checkGameOwner($userID, $gameID){
        $game = Game::find($gameID);
        if($game->user_id === $userID){
            return true;
        }

        return false;
    }
}
