<?php
// app/Helper/GlobalFunction.php
//................................
if (!function_exists('format_phone_number')) {
    function format_phone_number($phoneNumber, $country = null)
    {
        if (!$phoneNumber || (!is_string($phoneNumber) && !is_integer($phoneNumber))) {
            return null;
        }

        $countryCodes = config('country.codes');
        $defaultCountry = 'VN';

        //Remove any parentheses and the numbers they contain:
        $phoneNumber = preg_replace('/\([0-9]+?\)/', '', $phoneNumber);

        //Strip spaces and non-numeric characters:
        $phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

        //Strip out leading zeros:
        $phoneNumber = ltrim($phoneNumber, '84');

        if (!$phoneNumber) {
            return $phoneNumber;
        }

        //Look up the country dialling code for this number:
        if ($country && array_key_exists($country, $countryCodes)) {
            $pfx = $countryCodes[$country];
        } else {
            $pfx = $countryCodes[$defaultCountry];
        }

        //Check if the number doesn't already start with the correct dialling code:
        if (!preg_match('/^' . $pfx . '/', $phoneNumber)) {
            $phoneNumber = $pfx . $phoneNumber;
        }

        return $phoneNumber;
    }
}
