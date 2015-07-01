<?php
/* @var $this NewsCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'News Categories',
);

$this->menu=array(
	array('label'=>'Create NewsCategory', 'url'=>array('create')),
	array('label'=>'Manage NewsCategory', 'url'=>array('admin')),
);
?>

<h1>News Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
