<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'look';
$this->params['breadcrumbs'][] = $this->title;

?>

 
 
<? foreach ($model as $key => $value) : ?>
	<a href="<?= Yii::$app->urlManager->createUrl(['site/lect', 'id' =>$value->id ]) ?>" class="big-button"><?= $value->prepod_name.'<br>'; ?></a>

<? endforeach; ?>




