<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8c25391a65650fda06a88252b0584d48
{
    public static $prefixLengthsPsr4 = array (
        'A' =>
        array (
            'Ashkan\\AshkanFormBuilder\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ashkan\\AshkanFormBuilder\\' =>
        array (
            0 => __DIR__ . '/../..',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/vendor' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8c25391a65650fda06a88252b0584d48::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8c25391a65650fda06a88252b0584d48::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8c25391a65650fda06a88252b0584d48::$classMap;

        }, null, ClassLoader::class);
    }
}
