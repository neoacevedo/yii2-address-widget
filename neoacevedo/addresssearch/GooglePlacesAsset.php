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

use yii\web\AssetBundle;

class GooglePlacesAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . "/assets";
    public $js = ['js/places.js'];
    public $css = ['css/addresssearch.css'];

    /**
     * {@inheritdoc}
    */
    public function init()
    {
        parent::init();
    }
}