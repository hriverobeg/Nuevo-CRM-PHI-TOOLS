<?php

namespace App\Traits;

trait RedirectTrait {
  public function redirectIndex($page) {
    return redirect()->route("$page.index");
  }
}