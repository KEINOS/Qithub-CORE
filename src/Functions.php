<?php
namespace Qithub;

/* ---------------------------------------------------------------------- [C] */

function compareVersion($version1, $operator, $version2)
{
    $operator = strtolower($operator);

    $_fv = intval ( trim ( str_replace ( '.', '', $version1 ) ) );
    $_sv = intval ( trim ( str_replace ( '.', '', $version2 ) ) );
    
    if (strlen ( $_fv ) > strlen ( $_sv )) {
        $_sv = str_pad ( $_sv, strlen ( $_fv ), 0 );
    }
    
    if (strlen ( $_fv ) < strlen ( $_sv )) {
        $_fv = str_pad ( $_fv, strlen ( $_sv ), 0 );
    }

    return version_compare( (string) $version1, (string) $version2, $operator);
}

/* ---------------------------------------------------------------------- [D] */

function dir_exists($path_dir)
{
    return is_dir((string) $path_dir);
}

/* ---------------------------------------------------------------------- [E] */

/** @ref https://qiita.com/mpyw/items/6bd99ff62571c02feaa1 */
function e($message, &$previous = null)
{
    return new Exception($message, 0, $previous);
}

function exception_to_array(Exception $e)
{
    do {
        $errors[] = $e->getMessage();
    } while ($e = $e->getPrevious());

    return array_reverse($errors);
}

/* ---------------------------------------------------------------------- [I] */

function isPhar()
{
    return strlen(\Phar::running()) > 0 ? true : false;
}
