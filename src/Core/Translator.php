<?php
declare(strict_types=1);

namespace App\Core;

/**
 * Gestion très simple des traductions (FR/EN)
 */
class Translator
{
    /**
     * Langue courante (ex: 'fr', 'en')
     */
    private static string $locale = 'fr';

    /**
     * Tableau de traductions
     *
     * @var array<string, array<string,string>>
     */
    private static array $translations = [];

    /**
     * Indique si les traductions ont déjà été chargées
     */
    private static bool $loaded = false;

    public static function setLocale(string $locale): void
    {
        $locale = strtolower($locale);
        self::$locale = in_array($locale, ['fr', 'en'], true) ? $locale : 'fr';
    }

    public static function getLocale(): string
    {
        return self::$locale;
    }

    public static function trans(string $key, ?string $fallback = null): string
    {
        if (!self::$loaded) {
            self::loadTranslations();
        }

        $locale = self::$locale;
        if (isset(self::$translations[$locale][$key])) {
            return self::$translations[$locale][$key];
        }

        // fallback sur fr
        if ($locale !== 'fr' && isset(self::$translations['fr'][$key])) {
            return self::$translations['fr'][$key];
        }

        return $fallback ?? $key;
    }

    /**
     * Charge les traductions depuis le fichier de configuration
     */
    private static function loadTranslations(): void
    {
        $configPath = dirname(__DIR__, 2) . '/config/translations.php';

        if (file_exists($configPath)) {
            $data = require $configPath;
            if (is_array($data)) {
                self::$translations = $data;
            }
        }

        self::$loaded = true;
    }
}
