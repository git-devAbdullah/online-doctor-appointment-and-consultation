<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class PatientAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('patient.login');
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('patient')->check()) {
            return $this->auth->shouldUse('patient');
        }
        $this->unauthenticated($request, ['patient']);
    }

}
