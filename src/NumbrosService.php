<?php


namespace Thomzee\Numbros;

use Thomzee\Numbros\Exceptions\NumbrosException;
use Thomzee\Numbros\Factory\NumbrosNumbers;
use Thomzee\Numbros\Factory\NumbrosRoman;

class NumbrosService
{
    /**
     * This function return number as number or roman
     * @param $type
     * @param $prefix
     * @param $unique
     * @param string $separator
     * @param bool $uppercase
     * @return string
     * @throws NumbrosException
     */
    public function generate($type, $prefix, $unique, $separator = '/', $uppercase = true)
    {
        switch ($type) {
            case 'roman' :
                $factory = new NumbrosRoman();
                break;
            case 'number' :
                $factory = new NumbrosNumbers();
                break;
            default :
                throw new NumbrosException("Type $type not found.");
        }

        $result = $prefix;
        $result .= $factory->generate($separator);
        $result .= $unique;
        if ($uppercase) {
            return strtoupper($result);
        }
        return strtolower($result);
    }
}
