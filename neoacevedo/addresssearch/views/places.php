<?php

use neoacevedo\addresssearch\GooglePlacesAsset;
use yii\helpers\Html;

/** @var \yii\web\View $this  */
/** @var string $name */
/** @var array $options */
/** @var string $apiKey */

$js = <<<JS
let placesAddress = document.getElementById('{$options["id"]}');
let placesContainer = document.getElementById("places-direcciones");
//let key = "$apiKey";

var autocomplete = new google.maps.places.Autocomplete(placesAddress);
JS;

$this->registerJsFile("https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=$apiKey", [yii\web\View::POS_END]);
$this->registerJs($js, yii\web\View::POS_END);

GooglePlacesAsset::register($this);
?>

<?= Html::input("search", $name, null, $options) ?>
<div id="places-direcciones"></div>