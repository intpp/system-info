<?php
namespace intpp\system;

/**
 * Class Server
 *
 * @package intpp\system
 * @author intpp<intpplus@gmail.com>
 */
class Server
{
    private function __construct() {}

    private function __clone() {}

    /**
     * @return InformationInterface|\intpp\system\os\Common
     */
    public static function getInfo()
    {
        $systemName = strtolower(php_uname('s'));

        if(strpos($systemName, 'windows') !== false) {
            return __NAMESPACE__ . '\os\Windows';
        } elseif(strpos($systemName, 'linux') !== false) {
            return __NAMESPACE__ . '\os\Linux';
        } elseif(strpos($systemName, 'darwin') !== false) {
            return __NAMESPACE__ . '\os\Macintosh';
        } elseif(strpos($systemName, 'bsd') !== false) {
            return __NAMESPACE__ . '\os\BSD';
        }

        return __NAMESPACE__ . '\os\Common';
    }
}