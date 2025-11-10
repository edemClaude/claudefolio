<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Classe de gestion des variables d'environnement
 * 
 * Permet de charger et accéder aux variables d'environnement
 * depuis un fichier .env
 * 
 * @package App\Core
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class Env
{
    /**
     * Tableau des variables d'environnement chargées
     * 
     * @var array<string, string>
     */
    private static array $variables = [];

    /**
     * Charge les variables d'environnement depuis un fichier .env
     * 
     * Lit le fichier ligne par ligne et définit les variables dans $_ENV,
     * putenv() et un tableau statique interne.
     * Les lignes commençant par # sont considérées comme des commentaires.
     * 
     * @param string $path Chemin complet vers le fichier .env
     * @return void
     */
    public static function load(string $path): void
    {
        if (!file_exists($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        foreach ($lines as $line) {
            if (str_starts_with(trim($line), '#')) {
                continue;
            }

            if (str_contains($line, '=')) {
                [$key, $value] = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value, " \t\n\r\0\x0B\"'");
                
                self::$variables[$key] = $value;
                $_ENV[$key] = $value;
                putenv("$key=$value");
            }
        }
    }

    /**
     * Récupère la valeur d'une variable d'environnement
     * 
     * Cherche la variable dans cet ordre :
     * 1. Tableau statique interne
     * 2. $_ENV
     * 3. getenv()
     * 4. Valeur par défaut si fournie
     * 
     * @param string $key Nom de la variable d'environnement
     * @param mixed $default Valeur par défaut si la variable n'existe pas
     * @return mixed La valeur de la variable ou la valeur par défaut
     * 
     * @example
     * Env::get('APP_DEBUG', false);
     * Env::get('DB_HOST', 'localhost');
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return self::$variables[$key] ?? $_ENV[$key] ?? getenv($key) ?: $default;
    }
}
