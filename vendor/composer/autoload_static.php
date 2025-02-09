<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd720c7875d017b2ba841b4e2cffa0705
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Konekt\\PdfInvoice\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Konekt\\PdfInvoice\\' => 
        array (
            0 => __DIR__ . '/..' . '/konekt/pdf-invoice/src',
        ),
    );

    public static $classMap = array (
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd720c7875d017b2ba841b4e2cffa0705::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd720c7875d017b2ba841b4e2cffa0705::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd720c7875d017b2ba841b4e2cffa0705::$classMap;

        }, null, ClassLoader::class);
    }
}
