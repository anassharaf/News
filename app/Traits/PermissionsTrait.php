<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

trait PermissionsTrait
{
    private function permission($abilities)
    {
        $user = Auth::user();
        if (! Gate::any($abilities, $user)) {
            abort(403);
        }
    }
}
