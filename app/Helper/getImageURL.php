<?php
function getImageYoutube($link)
{
    if ($link != '') {
        $array = explode('=', $link);
        $id = $array[1];

        return 'http://img.youtube.com/vi/' . $id . '/0.jpg';
    }

    return asset('img/img_error.jpg');
}

function setURL($link)
{
    if ($link != '') {
        $array = explode('=', $link);
        $id = $array[1];

        if (count($array) > 2) {
            $string = explode('&', $array[1]);
            $id = $string[1];
        }

        return 'https://www.youtube.com/watch?v=' . $id;
    }

    return asset('img/img_error.jpg');
}
