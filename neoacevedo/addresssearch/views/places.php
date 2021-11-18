<?php

use neoacevedo\addresssearch\GooglePlacesAsset;
use yii\helpers\Html;

/** @var \yii\web\View $this  */
/** @var string $name */
/** @var array $options */
/** @var string $apiKey */

$js = <<<JS
let placesAddress = document.getElementById('{$options["id"]}');
let placesContainer = document.getElementById("direcciones");
let key = "$apiKey";
// Inciamos la función autosuggest al cargar la página y le pasamos el elemento "address"
placesautosuggest(placesAddress);
JS;

$this->registerJs($js, yii\web\View::POS_END);

GooglePlacesAsset::register($this);
?>

<?= Html::input("search", $name, null, $options) ?>
<div id="direcciones"></div>