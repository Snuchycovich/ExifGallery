<?php

namespace Aen\Utils\Autoloader;

/**
 * Class Autoloder permet de charger les different classes du projet.
 */
class Autoloader
{
    /**
     * Méthode qui permet de enregistre la function pour l'autoload
     * 
     * @return [empty]
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    /**
     * Méthode qui permet de definir le chemin pour acceder
     * aux clases
     * 
     * @param [string] $className chemin de la clas
     * 
     * @return [string]
     */
    public static function autoload($className)
    {
        $namespace = explode('\\', $className);
        $vendor = array_shift($namespace);
        $path = implode('/', $namespace);
        $fullPath = ECL_DIR . $path . ".php";
        if (is_file($fullPath)) {
            include $fullPath;
        }
        return;
    }
}
