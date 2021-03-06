<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit47426021f0d1aaa5d01c90d3e9a68262
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit47426021f0d1aaa5d01c90d3e9a68262::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit47426021f0d1aaa5d01c90d3e9a68262::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit47426021f0d1aaa5d01c90d3e9a68262::$classMap;

        }, null, ClassLoader::class);
    }
}
