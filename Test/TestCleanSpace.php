<?php

function cleanSpacing(string $value): string
{
    $cleanValue = str_replace(" ", "", $value);
    return $cleanValue;
}

$name = "Ibnu Ubaedi";
echo $newName = str_replace(" ", "", $name);
