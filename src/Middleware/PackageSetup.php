<?php


namespace AivstarBlog\Middleware;

use Closure;
use AivstarBlog\Models\BinshopsConfiguration;

class PackageSetup
{
    public function handle($request, Closure $next)
    {
        $initial_setup = BinshopsConfiguration::get('INITIAL_SETUP');
        if (!$initial_setup){
            return redirect( route('binshopsblog.admin.setup') );
        }

        return $next($request);
    }
}
