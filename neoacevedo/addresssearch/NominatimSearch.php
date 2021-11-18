<?php

/*
 * Copyright (C) 2021 Néstor Acevedo <clientes at neoacevedo.co>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace neoacevedo\addresssearch;

/**
 * Widget para generar un cuadro de búsqueda de tipo autocomplete para la búsqueda de direcciones.
 *
 * Este generará un cuadro de búsqueda que mostrará una lista de sugerencia de direcciones, similar al
 * cuadro de búsqueda de direcciones de Google Maps. Los servicios que actualmente soporta son:
 * * Nominatim (Open Street Map)
 * * Google Places Autocomplete
 * * Here Maps
 *
 * Acepta las opciones comunes de todo campo de texto HTML5.
 *
 */
class NominatimSearch extends \yii\base\Widget
{

    /**
     * @var integer
     * Límite de resultados.
     */
    public $limit = 10;

    /**
     * @var array
     * Opciones HTML predefinidas para la etiqueta input (par nombre-valor).
     * El atritubo `autocomplete` estará marcado como `off` ya que la idea es que solo sean las sugerencias del servicio.
     */
    public $options = [
        "id" => "",
    ];
    
    public function run()
    {
        return $this->render("input", [
            "limit" => $this->limit,
            "options" => $this->options
        ]);
    }
}