<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd5b9cfb2b6cd0fea49b8450d4f2b393f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd5b9cfb2b6cd0fea49b8450d4f2b393f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd5b9cfb2b6cd0fea49b8450d4f2b393f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd5b9cfb2b6cd0fea49b8450d4f2b393f::$classMap;

        }, null, ClassLoader::class);
    }
}
