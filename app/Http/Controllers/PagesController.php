<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

class PagesController extends Controller
{
    /**
     * Catches method call and checks for matching view.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return \Illuminate\View\View|null
     */
    public function __call($method, $parameters = null)
    {
        $name = Str::snake($method, '-');
        $view = 'pages/'.$name;

        if (view()->exists($view)) {
            return view($view);
        }

        return abort(404);
    }
}
