<?php
/**
 * PathUtil - The Tale Framework
 *
 * @version 1.0
 * @stability Stable
 * @author Torben K�hn <tk@talesoft.io>
 *
 * This software is distributed under the MIT license.
 * A copy of the license has been distributed with this software.
 * If this is not the case, you can read the license text here:
 * http://licenses.talesoft.io/2015/MIT.txt
 *
 * Please do not remove this comment block. Thank you.
 */

namespace Tale\Util;


use Tale\Util;

/**
 * Static path utility class
 *
 * @package Tale\Util
 */
class PathUtil extends Util
{

    /**
     * Normalizes and joins two or more path strings so that you always get a valid path
     * without worrying about where the slashes have to be put
     *
     * @return string The normalized, joined path
     */
    public static function join()
    {

        $paths = func_get_args();
        if (!count($paths))
            throw new \InvalidArgumentException(
                "Failed to join paths: No paths given"
            );

        $ds = \DIRECTORY_SEPARATOR;
        $path = null;
        foreach ($paths as $subPath) {

            if (!$path) {

                $path = self::normalize($subPath);
                continue;
            }

            $path = $path.$ds.ltrim(self::normalize($subPath), $ds);
        }

        return $path;
    }

    /**
     * Normalizes a path so it can be safely joined with other paths
     *
     * "Normal" is defined as the following:
     *
     * If the OS directory separator is /, all \ are converted to / and vice versa
     * Trailing slashes are removed (/directory/ is normalized to /directory)
     * If theres "./" or ".\", it is removed
     *
     * @param string $path The path to normalize
     *
     * @return string The normalized path
     */
    public static function normalize($path)
    {

        $ds = \DIRECTORY_SEPARATOR;
        $path = str_replace($ds === '\\' ? '/' : '\\', $ds, $path);
        $path = rtrim($path, $ds);

        if (strncmp($path, ".$ds", 3) === 0)
            $path = substr($path, 2);

        return $path;
    }
}