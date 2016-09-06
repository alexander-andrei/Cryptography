<?php

/**
 * Class HexToBase64
 *
 * Converts hexadecimal string to normal string.
 * Converts normal string into base64.
 *
 * @author Caprar Andrei
 */
class HexToBase64
{
    /**
     * Converts hex to string.
     *
     * @param string $hex
     * @return string
     */
    private function convert(string $hex) : string
    {
        // Declare empty string.
        $string = '';

        // Split hex by 2 characters and convert
        // Them into characters (ex: 49 = I).
        foreach(str_split($hex, 2) as $pair){
            $string .= chr(hexdec($pair));
        }

        // Return base64 string.
        return base64_encode($string);
    }

    /**
     * Outputs actual and expected string.
     *
     * @param string $base64
     * @param string $expected
     * @return bool
     */
    public function output(string $base64, string $expected) : bool
    {
        print sprintf("Actual string: %s\n", $this->convert($base64));
        print sprintf("Expected string: %s\n", $expected);

        return $this->convert($base64) === $expected;
    }
}

// Execute test
$base64 = new HexToBase64();

$string = '49276d206b696c6c696e6720796f757220627261696e206c696b65206120706f69736f6e6f7573206d757368726f6f6d';
$expected = 'SSdtIGtpbGxpbmcgeW91ciBicmFpbiBsaWtlIGEgcG9pc29ub3VzIG11c2hyb29t';

$base64->output($string, $expected);