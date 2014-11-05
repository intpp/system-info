<?php
namespace intpp\system;

/**
 * Interface InformationInterface
 *
 * @package intpp\system
 * @author intpp<intpplus@gmail.com>
 */
interface InformationInterface
{
    /**
     * @return string
     */
    public static function getName();

    /**
     * @return string
     */
    public static function getVersion();

    /**
     * @return string
     */
    public static function getHostname();

    /**
     * @return string
     */
    public static function getArchitecture();

    /**
     * Returns information about system uptime time.
     *
     * @param bool $formatted Show as formatted text. Default FALSE
     * @param string $format
     *
     * @return string|int
     */
    public static function getUptime($formatted = false, $format = '%a days, %h hours, %i minutes and %s seconds');
}