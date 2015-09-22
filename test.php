<?php

use Tale\Util\ArrayUtil,
    Tale\Util\StringUtil,
    Tale\Util\PathUtil;

include 'vendor/autoload.php';


$array = [
    'name' => 'someApp',
    'path' => '/some/path',
    'paths' => [
        'a' => '{{path}}/a',
        'b' => '{{path}}/b'
    ],
    'feature' => [
        'path' => '{{paths.a}}/feature',
        'name' => '{{name}}.Feature'
    ]
];

var_dump($array);
ArrayUtil::interpolate($array);
var_dump($array);


$singulars = ['user', 'user_group', 'user_group_field', 'user_group_status'];
var_dump(
    $singulars,
    array_map([StringUtil::class, 'pluralize'], $singulars),
    array_map([StringUtil::class, 'camelize'], $singulars),
    array_map([StringUtil::class, 'variablize'], $singulars),
    array_map([StringUtil::class, 'canonicalize'], $singulars)
);



foreach (range(0, 10) as $i) {

    list($pl, $pr, $sl, $sr) = array_map(function() {

        return mt_rand(0,1) ? '/' : '';
    }, array_fill(0, 4, null));
    $parentPath = $pl.'parent/path'.$pr;
    $subPath = $sl.'sub/path'.$sr;

    var_dump($parentPath, $subPath, PathUtil::join($parentPath, $subPath));
}