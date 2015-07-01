<?php
/* @var $this NewsCategoryController */
/* @var $model NewsCategory */

$this->breadcrumbs=array(
	'News Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NewsCategory', 'url'=>array('index')),
	array('label'=>'Create NewsCategory', 'url'=>array('create')),
	array('label'=>'View NewsCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NewsCategory', 'url'=>array('admin')),
);
?>

<h1>Update NewsCategory <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>