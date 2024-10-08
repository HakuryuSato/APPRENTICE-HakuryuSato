<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a30ab444fb187d078c3347c5967a1ad
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyVendor\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyVendor\\' => 
        array (
            0 => __DIR__ . '/../..' . '/html',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7a30ab444fb187d078c3347c5967a1ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7a30ab444fb187d078c3347c5967a1ad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7a30ab444fb187d078c3347c5967a1ad::$classMap;

        }, null, ClassLoader::class);
    }
}
