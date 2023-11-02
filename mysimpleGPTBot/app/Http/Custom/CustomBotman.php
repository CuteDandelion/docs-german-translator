<?php

namespace App\Http\Custom;

use BotMan\BotMan\BotMan;

class CustomBotMan 
{

    protected $botman;

    public function __construct(BotMan $botman) {
        $this->botman = $botman;
    }

    public function replyWithDelay($message, $waitTime = 2, $additionalParameters = [])
    {
        // Add additional functionality here
        $this->botman->typesAndWaits($waitTime);
        $this->botman->reply($message, $additionalParameters);
    }

    public function reply($message, $additionalParameters = [])
    {
        // Add additional functionality here
        $this->botman->reply($message, $additionalParameters);
    }

    public function wait($waitTime = 2)
    {
        // Add additional functionality here
        $this->botman->typesAndWaits($waitTime);
        #$this->botman->reply($message, $additionalParameters);
    }

}
