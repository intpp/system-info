<?php
namespace intpp\system\os;

use intpp\system\InformationInterface;

/**
 * Class Common
 *
 * @package intpp\system\os
 * @author intpp<intpplus@gmail.com>
 */
class Common implements InformationInterface
{
    /**
     * @inheritdoc
     */
    public static function getName()
    {
        return php_uname('s');
    }

    /**
     * @inheritdoc
     */
    public static function getVersion()
    {
        return php_uname('v');
    }

    public static function getHostname()
    {
        return php_uname('n');
    }


    public static function getArchitecture()
    {
        return php_uname('m');
    }

    /**
     * Returns information about system uptime time.
     *
     * @param bool $formatted Show as formatted text. Default FALSE
     * @param string $format
     *
     * @return string|int
     */
    public static function getUptime($formatted = false, $format = '%a days, %h hours, %i minutes and %s seconds')
    {
        return 0;
    }
}