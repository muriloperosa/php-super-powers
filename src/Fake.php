<?php

namespace MuriloPerosa\SuperPowers;

class Fake {

    /**
     * Returns fake phone number.
     *
     * @param string $format
     * @return string
     */
    public static function phoneNumber ($format = "%s-%s") : string
    {
        return sprintf($format, array_rand(Data::phonePrefixCodesWithCountry()), Random::numberSequence(7,9));
    }
}