<?php
namespace intpp\system\os;

/**
 * Class Windows
 *
 * @package intpp\system\os
 * @author intpp<intpplus@gmail.com>
 */
class Windows extends Common
{

    public static function getUptime($formatted = false, $format = '%a days, %h hours, %i minutes and %s seconds')
    {
        $startTime = filemtime('C:\pagefile.sys');

        if($startTime === false) {
            return 0;
        }

        return $formatted ? (new \DateTime())->diff(new \DateTime('@' . $startTime))->format($format) : (time() - $startTime);
    }
}