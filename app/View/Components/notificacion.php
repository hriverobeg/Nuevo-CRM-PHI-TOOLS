<?php

namespace App\View\Components;

use App\Models\Notificacion as ModelsNotificacion;
use Auth;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class notificacion extends Component
{

    public $notificaciones;
    public $noLeidos;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $auth = Auth::user();

        $this->notificaciones = ModelsNotificacion::where('admin_id', $auth->id)
            ->whereNull('leido_at')
            ->orderByDesc('id')
            ->limit(5)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.notificacion');
    }
}
