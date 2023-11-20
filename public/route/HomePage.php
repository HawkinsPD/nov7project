<?php


//<a href="/save">Save Images</a> <br>
//<a href="/getImages">Get Images</a>

class HomePage implements RouteInterface
{
    public function route(): string
    {
        return <<<HTML
    <a href="/save">Save Images</a> <br>
    <a href="/getImages">Get Images</a>
HTML;

    }
}