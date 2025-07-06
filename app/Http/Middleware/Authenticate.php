<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    // File: app/Http/Middleware/Authenticate.php

    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            if ($request->is('admin/*') || $request->is('admin')) {
                return route('admin.login');
            }

            // Ganti 'login.form' menjadi 'login' agar sesuai dengan nama route yang baru
            return route('login');
        }
        return null;
    }
}
