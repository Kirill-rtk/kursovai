<?php 

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
 
$this->title = 'запись лекции';
$this->params['breadcrumbs'][] = $this->title;

?>

<?
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);

?> 


<?= $form->field($model, 'prepod_name')?>
<?= $form->field($model, 'lecture') ?>
<?= $form->field($model, 'file') ?>
<?= $form->field($model, 'image')->fileInput(['multiple' => true, 'accept' => 'image']) ?>







<button type="submit">запись</button>
<? ActiveForm::end(); ?>


