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
 * Widget para generar un cuadro de búsqueda de tipo autocomplete para la búsqueda de direcciones a través del servicio Nominatim de Open Street Map.
 *
 * Acepta las opciones comunes de todo campo de texto HTML5 en el parámetro `options`.
 *
 * La configuración del widget acepta los parámetros [[$name]] y [[$limit]].
 *
 * El widget puede ser configurado de la siguiente manera en cualquier vista:
 *
 * ```php
 * echo NominatimSearch::widget(["name" => "nominatim", 'limit' => 5, 'options' => ['id' => 'nominatim', 'class' => 'form-control', 'placeholder' => 'Escriba la dirección.']]);
 * ```
 *
 * @author Néstor Acevedo <clientes at neoacevedo.co>
 */
class NominatimSearch extends \yii\base\Widget
{
    /** @var string Nombre del cuadro de búsqueda */
    public $name;

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
    public $options = [];

    private $defaultOptions = [
        "type" => "search",
        "autocomplete" => "off",
    ];

    public function run()
    {
        return $this->render("nominatim", [
            "name" => $this->name,
            "limit" => $this->limit,
            "options" => array_merge($this->options, $this->defaultOptions)
        ]);
    }
}