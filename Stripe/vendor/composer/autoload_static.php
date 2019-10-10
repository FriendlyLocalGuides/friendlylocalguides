<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit08c06a6ec73d65cae901497029fed12b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit08c06a6ec73d65cae901497029fed12b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit08c06a6ec73d65cae901497029fed12b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
