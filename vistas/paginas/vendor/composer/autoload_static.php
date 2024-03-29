<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8354cbf84630b665fe3339caa953f43
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Pc01\\WcApi\\' => 11,
        ),
        'A' => 
        array (
            'Automattic\\WooCommerce\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Pc01\\WcApi\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Automattic\\WooCommerce\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/woocommerce/src/WooCommerce',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8354cbf84630b665fe3339caa953f43::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8354cbf84630b665fe3339caa953f43::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8354cbf84630b665fe3339caa953f43::$classMap;

        }, null, ClassLoader::class);
    }
}
