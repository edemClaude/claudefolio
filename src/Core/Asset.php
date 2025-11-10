<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Classe de gestion des assets (CSS, JS, images)
 * 
 * Cette classe fournit des méthodes statiques pour générer les balises HTML
 * des fichiers CSS, JavaScript et images avec versioning automatique (cache busting).
 * 
 * @package App\Core
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class Asset
{
    /**
     * Chemin de base pour les assets
     * 
     * @var string
     */
    private static string $basePath = '';
    
    /**
     * Définit le chemin de base pour les assets
     * 
     * @param string $path Chemin de base (ex: '/edemclaude' ou '')
     * @return void
     */
    public static function setBasePath(string $path): void
    {
        self::$basePath = rtrim($path, '/');
    }
    
    /**
     * Génère les balises <link> pour les fichiers CSS avec versioning
     * 
     * @param string|array $files Un fichier ou un tableau de fichiers CSS
     * @return string Les balises HTML générées
     * 
     * @example
     * Asset::css('style.css');
     * Asset::css(['style.css', 'pages/home.css']);
     */
    public static function css(string|array $files): string
    {
        $files = (array) $files;
        $output = '';
        
        foreach ($files as $file) {
            $path = self::$basePath . '/assets/css/' . ltrim($file, '/');
            $version = file_exists($_SERVER['DOCUMENT_ROOT'] . $path) 
                ? '?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . $path)
                : '';
            $output .= '<link rel="stylesheet" href="' . $path . $version . '">' . PHP_EOL;
        }
        
        return $output;
    }
    
    /**
     * Génère les balises <script> pour les fichiers JavaScript avec versioning
     * 
     * @param string|array $files Un fichier ou un tableau de fichiers JS
     * @param bool $defer Si true, ajoute l'attribut defer aux scripts
     * @return string Les balises HTML générées
     * 
     * @example
     * Asset::js('app.js');
     * Asset::js(['app.js', 'animations.js'], false);
     */
    public static function js(string|array $files, bool $defer = true): string
    {
        $files = (array) $files;
        $output = '';
        
        foreach ($files as $file) {
            $path = self::$basePath . '/assets/js/' . ltrim($file, '/');
            $version = file_exists($_SERVER['DOCUMENT_ROOT'] . $path)
                ? '?v=' . filemtime($_SERVER['DOCUMENT_ROOT'] . $path)
                : '';
            $deferAttr = $defer ? ' defer' : '';
            $output .= '<script src="' . $path . $version . '"' . $deferAttr . '></script>' . PHP_EOL;
        }
        
        return $output;
    }
    
    /**
     * Retourne le chemin vers une image
     * 
     * @param string $file Nom du fichier image
     * @return string Le chemin complet vers l'image
     * 
     * @example
     * Asset::img('logo.png'); // Retourne '/assets/img/logo.png'
     */
    public static function img(string $file): string
    {
        return self::$basePath . '/assets/img/' . ltrim($file, '/');
    }
}
