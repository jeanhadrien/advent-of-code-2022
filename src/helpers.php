<?php

function readLinesInInputFileAndCleanBasedOnRegex($path, $regex)
{
    $lines = file($path);
    $array = [];
    foreach ($lines as $line) {
        if ($regex) {
            $line = preg_replace($regex, '', $line);
        }
        $array[] = $line;
    }
    return $array;
}


?>