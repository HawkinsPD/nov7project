<?php

//function saveImg()
//{
//    return <<<HTML
//    <script type="text/javascript" src="functions.js"></script>
//
//    <form id="reset-me">
//        enter url: <input id="url-input" type="text" name="Currency">
//        <input onclick="saveImg(); resetForm('reset-me')" id="btn" type="button" value="save echo">
//    </form>
//
//HTML;
//}
//
//echo saveImg();

class SaveImg implements RouteInterface
{
    public function route(): string
    {
        return <<<HTML
    <script type="text/javascript" src="functions.js"></script>
    
    <form id="reset-me">
        enter url: <input id="url-input" type="text" name="Currency">
        <input onclick="saveImg(); resetForm('reset-me')" id="btn" type="button" value="save echo">
    </form>

HTML;
    }
}