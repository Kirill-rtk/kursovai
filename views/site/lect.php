<?php



use yii\helpers\Html;

$this->title = 'lect';
$this->params['breadcrumbs'][] = $this->title;

?>

 
	<?= $model->prepod_name.'<br>'; ?>
	<?= $model->lecture.'<br>'; ?>
	<?= $model->file.'<br>'; ?>
	<?= $model->image.'<br>'; ?>

	<?php echo ('<img src =' .'uploads/' . $model->image .'>'); ?>
 
