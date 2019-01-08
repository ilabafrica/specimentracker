<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a16457cb3aecf1f2ee68286a4807673
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'ILabAfrica\\SpecimenTracker\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ILabAfrica\\SpecimenTracker\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a16457cb3aecf1f2ee68286a4807673::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a16457cb3aecf1f2ee68286a4807673::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}