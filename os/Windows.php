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
        $startTime = false;
        $data = shell_exec('net statistics server');
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            if (preg_match('/\d{1,2}\:\d{2}\:\d{2}/i', $line)) {
                $startTime = strtotime(trim(preg_replace('/[^\d\:\. ]+/i', '', $line)));
                break;
            }
        }

        if ($startTime === false) {
            return 0;
        }

        return $formatted ? (new \DateTime())->diff(new \DateTime('@' . $startTime))->format($format) : (time() - $startTime);
    }
}