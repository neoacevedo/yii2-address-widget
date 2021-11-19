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
 * Widget para generar un cuadro de búsqueda de tipo autocomplete para la búsqueda de direcciones a través de Google Places Autocomplete.
 *
 * Acepta las opciones comunes de todo campo de texto HTML5.
 *
  * La configuración del widget acepta los parámetros [[$name]] y [[$apiKey]].
 *
 * El widget puede ser configurado de la siguiente manera en cualquier vista:
 *
 * ```php
 * echo GooglePlacesSearch::widget(["name" => "places", 'apiKey' => 'YOUR_API_KEY', 'options' => ['id' => 'places', 'class' => 'form-control', 'placeholder' => 'Escriba la dirección.']]);
 * ```
 *
 * @author Néstor Acevedo <clientes at neoacevedo.co>
 */
class GooglePlacesSearch extends \yii\base\Widget
{
    /** @var string Nombre del campo de texto */
    public $name;
    
    /**
     * @var string
     * Clave de API para los servicios de Google o Here Maps.
     */
    public $apiKey = "";

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
        return $this->render("places", [
            'name' => $this->name,
            "apiKey" => $this->apiKey,
            "options" => array_merge($this->options, $this->defaultOptions)
        ]);
    }
}