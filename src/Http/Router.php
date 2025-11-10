<?php
declare(strict_types=1);

namespace App\Http;

/**
 * Routeur HTTP pour gérer les routes de l'application
 * 
 * Permet de définir des routes GET/POST et de dispatcher
 * les requêtes vers les contrôleurs appropriés.
 * 
 * @package App\Http
 * @author  Edem Claude KUMAZA
 * @version 1.0.0
 */
class Router
{
    /**
     * Tableau des routes enregistrées
     * 
     * @var array<int, array{method: string, path: string, handler: callable|array}>
     */
    private array $routes = [];

    /**
     * Enregistre une route GET
     * 
     * @param string $path Chemin de la route (ex: '/', '/about')
     * @param callable|array $handler Callback ou [Controller::class, 'method']
     * @return void
     * 
     * @example
     * $router->get('/', [HomeController::class, 'index']);
     */
    public function get(string $path, callable|array $handler): void
    {
        $this->addRoute('GET', $path, $handler);
    }

    /**
     * Enregistre une route POST
     * 
     * @param string $path Chemin de la route (ex: '/contact')
     * @param callable|array $handler Callback ou [Controller::class, 'method']
     * @return void
     * 
     * @example
     * $router->post('/contact', [ContactController::class, 'submit']);
     */
    public function post(string $path, callable|array $handler): void
    {
        $this->addRoute('POST', $path, $handler);
    }

    /**
     * Ajoute une route au tableau des routes
     * 
     * @param string $method Méthode HTTP (GET, POST, etc.)
     * @param string $path Chemin de la route
     * @param callable|array $handler Gestionnaire de la route
     * @return void
     */
    private function addRoute(string $method, string $path, callable|array $handler): void
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    /**
     * Dispatch la requête vers le bon gestionnaire
     * 
     * Parcourt les routes enregistrées et exécute le gestionnaire
     * correspondant à la méthode HTTP et l'URI demandée.
     * Retourne une erreur 404 si aucune route ne correspond.
     * 
     * @param string $method Méthode HTTP de la requête
     * @param string $uri URI de la requête
     * @return mixed Réponse du gestionnaire ou message d'erreur 404
     */
    public function dispatch(string $method, string $uri): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $this->matchPath($route['path'], $uri)) {
                $handler = $route['handler'];
                
                if (is_array($handler)) {
                    [$controller, $action] = $handler;
                    $controllerInstance = new $controller();
                    return $controllerInstance->$action();
                }
                
                return $handler();
            }
        }

        http_response_code(404);
        return '404 - Page Not Found';
    }

    /**
     * Vérifie si le chemin de la route correspond à l'URI
     * 
     * @param string $routePath Chemin de la route définie
     * @param string $uri URI de la requête
     * @return bool True si les chemins correspondent
     */
    private function matchPath(string $routePath, string $uri): bool
    {
        return $routePath === $uri;
    }
}
