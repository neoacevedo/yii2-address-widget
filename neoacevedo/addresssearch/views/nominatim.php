<?php

use neoacevedo\addresssearch\NominatimAsset;
use yii\helpers\Html;

/** @var \yii\web\View $this  */
/** @var string $name */
/** @var array $options */
/** @var string $apiKey */
/** @var int $limit */

$js = <<<JS
let nominatimAddress = document.getElementById('{$options["id"]}');
let nominatimContainer = document.getElementById("nominatim-direcciones");
let nominatimlimit = $limit;
// Inciamos la función autosuggest al cargar la página y le pasamos el elemento "address"
nominatimautosuggest(nominatimAddress);
JS;

$this->registerJs($js, yii\web\View::POS_END);

NominatimAsset::register($this);
?>

<?= Html::input("search", $name, null, $options) ?>
<div id="nominatim-direcciones"></div>