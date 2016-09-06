<?php

class Converter
{
    public static function getAsciiValue(string $str) : string
    {
        return ord($str);
    }

    public static function stringToBinary(string $str) : string
    {
        $strArray = str_split($str);

        $binaryCode = '';
        foreach ($strArray as $character)
        {
            $binaryCode .= sprintf("%s ", decbin(ord($character)));
        }

        return rtrim($binaryCode);
    }

    public static function binaryToString(string $str) : string
    {
        $strArray = explode(" ", $str);

        $string = '';
        foreach ($strArray as $binary)
        {
            $string .= chr(bindec($binary));
        }

        return $string;
    }
}

$string = 'Hello there [324], are you the boss or what ?';
$stringToBinary = Converter::stringToBinary($string);
$binaryToString = Converter::binaryToString($stringToBinary);

$string = 'a' ^ 'b' ^ 'c';

var_dump(Converter::stringToBinary($string));