<?php

namespace App\Http\Controllers;

use BotMan\BotMan\Messages\Incoming\Answer;

class BotmanController extends Controller
{
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            if ($message == 'hi') {
                $this->askName($botman);
            }else{
                $botman->reply("write 'hi' for testing...");
            }

        });

        $botman->listen();
    }

    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {

            $name = $answer->getText();

            $this->say('Nice to meet you '.$name);
        });
    }
}
