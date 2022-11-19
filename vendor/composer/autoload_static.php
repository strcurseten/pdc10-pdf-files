<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteea59051ceaa68bd018c5415a68a8820
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Fpdf\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Fpdf\\' => 
        array (
            0 => __DIR__ . '/..' . '/fpdf/fpdf/src/Fpdf',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteea59051ceaa68bd018c5415a68a8820::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteea59051ceaa68bd018c5415a68a8820::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteea59051ceaa68bd018c5415a68a8820::$classMap;

        }, null, ClassLoader::class);
    }
}
