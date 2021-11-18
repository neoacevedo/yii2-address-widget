<?php

use neoacevedo\addresssearch\NominatimAsset;

/** @var \yii\web\View $this  */
/** @var array $options */
/** @var string $url */
/** @var string $apiKey */

$js = '
let address = document.getElementById({$options["id"]});
let dirContainer = document.getElementById("direcciones");
';

$this->registerJs($js, yii\web\View::POS_END);

NominatimAsset::register($this);
?>

<input type="search" autocomplete="off" <?= implode(" ", $options) ?> />
<div id="direcciones"></div>