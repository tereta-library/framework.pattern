<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcdb96f9c2b03523c9b023951e1a74f5d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tereta\\FrameworkPattern\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tereta\\FrameworkPattern\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcdb96f9c2b03523c9b023951e1a74f5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcdb96f9c2b03523c9b023951e1a74f5d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcdb96f9c2b03523c9b023951e1a74f5d::$classMap;

        }, null, ClassLoader::class);
    }
}
