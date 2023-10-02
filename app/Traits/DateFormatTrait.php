<?php

namespace App\Traits;

trait DateFormatTrait {
  protected $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

  protected function getFechaFormat($fecha) {
    $mes = $this->meses[($fecha->format('n')) - 1];
    return $fecha->format('d') . ' de ' . $mes . ' del ' . $fecha->format('Y');
  }

  protected function getFechaHoraFormat($fecha) {
    $mes = $this->meses[($fecha->format('n')) - 1];
    return $fecha->format('d') . ' de ' . $mes . ' del ' . $fecha->format('Y') . " " . $fecha->format('h:i a');
  }

}
