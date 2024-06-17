<?php

namespace App\Http\Middleware;

use App\Models\Apartment;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;




class LastVisitedPage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

$response = $next($request);

$excludedRoutes = ['login', 'register', 'logout','/'];

if (Auth::check() && !in_array($request->path(), $excludedRoutes)) {
    $pages = json_decode($request->cookie('last_visited_pages', '[]'), true);

    $currentPage = [
        'url' => $request->fullUrl(),
        'title' => $this->getPageTitle($request) 
    ];
    $pages = array_filter($pages, function($page) use ($currentPage) {
        return $page['url'] !== $currentPage['url'];
    });
    array_unshift($pages, $currentPage);

    if (count($pages) > 1) {
        array_pop($pages);
    }

    Cookie::queue('last_visited_pages', json_encode($pages), 60 ); //
}

return $response;
}
protected function getPageTitle(Request $request)
    {
        if ($request->route()->getName() === 'show') {
            $productId = $request->route('id');
            $product = Apartment::find($productId);

            if ($product) {
                return $product;
            }
        }
        return $request->path();
    }
    }




