<?php
namespace intpp\system\os;

/**
 * Class BSD
 *
 * @package intpp\system\os
 * @author intpp<intpplus@gmail.com>
 */
class BSD extends Common
{
    public static function getName()
    {
        $data = trim(shell_exec('sw_vers -productName'));
        return !empty($data) ? $data : parent::getName();
    }

    public static function getVersion()
    {
        $data = trim(shell_exec('sw_vers -productVersion'));
        return !empty($data) ? $data : parent::getVersion();
    }

    public static function getUptime($formatted = false, $format = '%a days, %h hours, %i minutes and %s seconds')
    {
        $startTime = shell_exec("sysctl -n kern.boottime | awk '{print $4}' | sed 's/,//'");

        if($startTime === false) {
            return 0;
        }

        return $formatted ? (new \DateTime())->diff(new \DateTime('@' . $startTime))->format($format) : (time() - $startTime);
    }

}