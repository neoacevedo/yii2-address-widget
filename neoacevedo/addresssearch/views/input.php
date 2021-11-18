<?php

use neoacevedo\addresssearch\InputAsset;

/** @var \yii\web\View $this  */
/** @var array $options */
/** @var string $url */
/** @var string $apiKey */

$js = '
let address = document.getElementById({$options["id"]});
let dirContainer = document.getElementById("direcciones");
';

$this->registerJs($js, yii\web\View::POS_END);

InputAsset::register($this);
?>

<input type="search" class="form-control" autocomplete="off" <?= implode(" ", $options) ?> />
<div id="direcciones"></div>