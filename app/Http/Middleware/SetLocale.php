<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $supported = ['zh', 'ko', 'ja'];

    public function handle(Request $request, Closure $next): Response
    {
        $locale = session('locale', config('app.locale', 'zh'));

        if (!in_array($locale, $this->supported)) {
            $locale = 'zh';
        }

        app()->setLocale($locale);

        return $next($request);
    }
}
