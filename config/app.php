<?php
declare(strict_types=1);

use App\Core\Env;

return [
    'name' => Env::get('APP_NAME', 'Portfolio'),
    'env' => Env::get('APP_ENV', 'production'),
    'debug' => Env::get('APP_DEBUG', 'false') === 'true',
    'url' => Env::get('APP_URL', 'http://localhost'),
    'contact_email' => Env::get('CONTACT_EMAIL', 'edemclaudek@gmail.com'),
];
