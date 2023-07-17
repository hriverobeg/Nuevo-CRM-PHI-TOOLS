<?php

namespace App\Traits;

use Auth;

trait AuthTrait {
    protected function redirectClientPage($page = '/dashboard-admin') {
        $auth = Auth::user();
        if (!$auth->isAdmin) {
            redirect($page);
        }
    }

    protected function redirectAdminPage($page = '/dashboard-cliente') {
        $auth = Auth::user();

        if (!$auth->isAdmin) {
            redirect($page);
        }
    }
}
