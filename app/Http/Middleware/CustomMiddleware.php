<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $protectedRoutes =[
        //     'cv.index',
        //     'cv.store',
        //     'cv.create',
        //     'cv.show',
        //     'cv.update',
        //     'cv.destroy',
        //     'cv.edit',

        //     'education.index',
        //     'education.store',
        //     'education.create',
        //     'education.show',
        //     'education.update',
        //     'education.destroy',
        //     'education.edit',

        //     'experience.index',
        //     'experience.store',
        //     'experience.create',
        //     'experience.show',
        //     'experience.update',
        //     'experience.destroy',
        //     'experience.edit',

        //     'portfolio.index',
        //     'portfolio.store',
        //     'portfolio.create',
        //     'portfolio.show',
        //     'portfolio.update',
        //     'portfolio.destroy',
        //     'portfolio.edit',

        //     'my-profile.index',
        //     'my-profile.store',
        //     'my-profile.create',
        //     'my-profile.show',
        //     'my-profile.update',
        //     'my-profile.destroy',
        //     'my-profile.edit',

        //     'skill.index',
        //     'skill.store',
        //     'skill.create',
        //     'skill.show',
        //     'skill.update',
        //     'skill.destroy',
        //     'skill.edit',

        //     'social-media.index',
        //     'social-media.store',
        //     'social-media.create',
        //     'social-media.show',
        //     'social-media.update',
        //     'social-media.destroy',
        //     'social-media.edit',


        // ];

        // Check if the request is AJAX
        if (!$request->ajax()) {
            // Check if the request doesn't have the HTTP_REFERER header
            if (!$request->header('referer')) {
                // Redirect the user to the homepage
                return redirect('/welcome');
            }
        }

        return $next($request);
    }
}
