<?php

namespace App\Http\Middleware;

use Socialite;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * {@inheritdoc}
     */
    protected function authenticate($request, array $guards)
    {
        if (session()->missing('user')) {
            $this->unauthenticated($request, $guards);
        }
    }

    /**
    * {@inheritdoc}
    */
    protected function redirectTo($request)
    {
        return Socialite::driver('uacf')->redirect()->getTargetUrl();
    }
}
