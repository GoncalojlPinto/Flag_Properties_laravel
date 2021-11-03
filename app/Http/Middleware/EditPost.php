<?php

namespace App\Http\Middleware;

use App\Models\Property;
use Closure;
use Illuminate\Http\Request;

class EditPost
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
            $property = Property::all();
            $agent = $property->agent_id;
            dd($agent);
            $user = auth()->user()->id;
            if ($user == $agent) {

                return $next($request);
            }
            return abort(403, "You don't have permission to edit this Property");
        }

    }
