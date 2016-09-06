<?php

/**
 * Class FixedXOR
 *
 * Performs XOR operations on two hexadecimal strings.
 *
 * @author Caprar Andrei
 */
class FixedXOR
{
    /**
     * Converts two hexadecimal strings into normal strings using XOR operation.
     * Converts normal string into hexadecimal.
     *
     * @param string $first
     * @param string $second
     * @return string
     */
    protected function convert(string $first, string $second): string
    {
        // Convert hex to binary.
        $first = hex2bin($first);
        $second = hex2bin($second);

        // Declare empty string.
        $output = '';

        // Throw error if strings are not equal.
        $limit = min(strlen($first), strlen($second));

        // Converts binary character to ascii.
        // Converts ascii to character.
        // Performs XOR operation on two characters.
        for ($i = 0; $i < $limit; $i++) {
            $output .= chr(ord($first[$i]) ^ ord($second [$i]));
        }

        // Returns hexadecimal value of string.
        return bin2hex($output);
    }

    /**
     * Outputs actual and expected string.
     *
     * @param string $inputOne
     * @param string $inputTwo
     * @param string $expected
     * @return bool
     */
    function output(string $inputOne, string $inputTwo, string $expected) : bool
    {
        print sprintf("Actual string: %s\n", $this->convert($inputOne, $inputTwo));
        print sprintf("Expected string: %s\n", $expected);

        return $this->convert($inputOne, $inputTwo) === $expected;
    }
}

 Execute test
$xor = new FixedXOR();

$inputOne = '1c0111001f010100061a024b53535009181c';
$inputTwo = '686974207468652062756c6c277320657965';
$expected = '746865206b696420646f6e277420706c6179';

$xor->output($inputOne, $inputTwo, $expected);