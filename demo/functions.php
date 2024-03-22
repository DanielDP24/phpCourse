<?php
//die and dump server superglobal
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

//RETURN TRUE OR FALSE IF uri is exact same as $variable http://localhost:8888/about <-- request_uri
function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}
