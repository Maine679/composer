<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd070fa84383bdeb4859849b7141277e7
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'A' => 
        array (
            'Aura\\SqlQuery\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'Aura\\SqlQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sqlquery/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd070fa84383bdeb4859849b7141277e7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd070fa84383bdeb4859849b7141277e7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd070fa84383bdeb4859849b7141277e7::$classMap;

        }, null, ClassLoader::class);
    }
}
