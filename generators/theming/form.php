<?php
/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\module\Generator */

?>
<div class="module-form">
<?php
    echo $form->field($generator, 'ns');
    echo $form->field($generator, 'themingID')->dropDownList([
	    1 => 'adminlte',
	]);
?>
</div>
