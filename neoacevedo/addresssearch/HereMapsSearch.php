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
 * Widget para generar un cuadro de búsqueda de tipo autocomplete para la búsqueda de direcciones a través del servicio de Here Maps v7.
 *
 * Acepta las opciones comunes de todo campo de texto HTML5.
 *
 * La configuración del widget acepta los parámetros [[$name]], [[$apiKey]] y [[$limit]].
 *
 * El widget puede ser configurado de la siguiente manera en cualquier vista:
 *
 * ```php
 * echo HereMapsSearch::widget(["name" => "hm", 'limit' => 5, 'options' => ['id' => 'hm', 'class' => 'form-control', 'placeholder' => 'Escriba la dirección.']]);
 * ```
 *
 * @author Néstor Acevedo <clientes at neoacevedo.co>
 */
class HereMapsSearch extends \yii\base\Widget
{
    /** @var string Nombre del campo de texto */
    public $name;
    
    /**
     * @var string
     * Clave de API para los servicios de Google o Here Maps.
     */
    public $apiKey = "";

    /**
     * @var integer
     * Límite de resultados.
     */
    public $limit = 10;

    /**
     * @var array
     * Opciones HTML predefinidas para la etiqueta input (par nombre-valor).
     */
    public $options = [
        "id" => "",
    ];
    
    public function run()
    {
        return $this->render("heremaps", [
            "name" => $this->name,
            "limit" => $this->limit,
            "apiKey" => $this->apiKey,
            "options" => $this->options
        ]);
    }
}