<?php

namespace Helper;

class ColorTools {

    static public function getRandomColor()
    {
        $red = rand(0,255);
        $green = rand(0,255);
        $blue = rand(0,255);

        return "rgb($red, $green, $blue)";
    }
}