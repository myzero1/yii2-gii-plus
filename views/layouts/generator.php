<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \myzero1\yii2giiplus\Generator[] */
/* @var $activeGenerator \myzero1\yii2giiplus\Generator */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$activeGenerator = Yii::$app->controller->generator;
?>
<?php $this->beginContent('@myzero1/yii2giiplus/views/layouts/main.php'); ?>
<div class="row">
    <div class="col-md-3 col-sm-4">
        <div class="list-group">
            <?php
            foreach ($generators as $id => $generator) {
                $label = '<i class="glyphicon glyphicon-chevron-right"></i>' . Html::encode($generator->getName());
                echo Html::a($label, ['default/view', 'id' => $id], [
                    'class' => $generator === $activeGenerator ? 'list-group-item active' : 'list-group-item',
                ]);
            }
            ?>
        </div>
    </div>
    <div class="col-md-9 col-sm-8">
        <?= $content ?>
    </div>
</div>
<?php $this->endContent(); ?>
