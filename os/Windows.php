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
        if (!file_exists('C:\pagefile.sys')) {
            return false;
        }

        $startTime = filemtime('C:\pagefile.sys');

        return $formatted ? (new \DateTime())->diff(new \DateTime('@' . $startTime))->format($format) : (time() - $startTime);
    }
}