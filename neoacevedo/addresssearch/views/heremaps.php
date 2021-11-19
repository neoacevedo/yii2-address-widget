<?php

use neoacevedo\addresssearch\HereMapsAsset;
use yii\helpers\Html;

/** @var \yii\web\View $this  */
/** @var string $name */
/** @var array $options */
/** @var string $apiKey */
/** @var int $limit */

$js = <<<JS
let hmAddress = document.getElementById('{$options["id"]}');
let hmContainer = document.getElementById("hmdirecciones");
let hmlimit = $limit;
let hmApiKey = '$apiKey';
// Inciamos la función autosuggest al cargar la página y le pasamos el elemento "address"
hmautosuggest(hmAddress);
JS;

$this->registerJs($js, yii\web\View::POS_END);

HereMapsAsset::register($this);
?>

<?= Html::input("search", $name, null, $options) ?>
<div id="hmdirecciones"></div>