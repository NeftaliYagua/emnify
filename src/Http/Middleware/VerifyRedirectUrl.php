<?php

namespace LaravelLatam\Emnify\Http\Middleware;

use Closure;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class VerifyRedirectUrl
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function handle($request, Closure $next)
    {
        $redirect = $request->get('redirect');

        $url = parse_url($redirect);

        if ($redirect && (! isset($url['host']) || $url['host'] !== $request->getHost())) {
            throw new AccessDeniedHttpException('Redirect host mismatch.');
        }

        return $next($request);
    }
}
