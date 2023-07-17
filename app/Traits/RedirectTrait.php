<?php

namespace App\Traits;

trait RedirectTrait {
  public function redirectIndex($page) {
    return redirect()->route("$page.index");
  }

  protected function redirectDirty($model, $route, $page = 'index') {
    return redirect()
        ->route("{$route}.{$page}", [$model])
        ->withErrors(['Necesitas actualizar un campo.'])
        ->withInput();
    }
}
