<?php
namespace intpp\system\os;

/**
 * Class Linux
 *
 * @package intpp\system\os
 * @author intpp<intpplus@gmail.com>
 */
class Linux extends Common
{
    public static function getName()
    {
        $name = '';
        $data = trim(shell_exec('lsb_release -ds'));
        if (preg_match('/[a-z]+/i', $data, $matches)) {
            $name = $matches[0];
        }

        return !empty($name) ? $name : parent::getName();
    }

    public static function getVersion()
    {
        $version = '';
        $data = trim(shell_exec('lsb_release -ds'));
        if (preg_match('/\d+(\.\d+)+/i', $data, $matches)) {
            $version = $matches[0];
        }

        return !empty($version) ? $version : parent::getVersion();
    }

    public static function getUptime($formatted = false, $format = '%a days, %h hours, %i minutes and %s seconds')
    {
        $uptimeInfo = @file_get_contents('/proc/uptime');

        if ($uptimeInfo === false) {
            return 0;
        }

        list($uptime, $idleTime) = explode(' ', $uptimeInfo);
        $startTime = time() - $uptime;

        return $formatted ? (new \DateTime())->diff(new \DateTime('@' . $startTime))->format($format) : (time() - $startTime);
    }
}