<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $generators \myzero1\yii2giiplus\Generator[] */
/* @var $content string */

$generators = Yii::$app->controller->module->generators;
$this->title = 'Welcome to Gii plug';
?>
<div class="default-index">
    <div class="page-header">
        <h1>Welcome to Gii plug <small>added theming generateor by myzero1.</small></h1>
    </div>

    <p class="lead">Start the fun with the following code generators:</p>

    <div class="row">
        <?php foreach ($generators as $id => $generator): ?>
        <div class="generator col-lg-4">
            <h3><?= Html::encode($generator->getName()) ?></h3>
            <p><?= $generator->getDescription() ?></p>
            <?php if ($id === 'gii') { ?>
                <p><?= Html::a('Start &raquo;', ['/gii'], ['class' => 'btn btn-default']) ?></p>
            <?php } else { ?>
                <p><?= Html::a('Start &raquo;', ['default/view', 'id' => $id], ['class' => 'btn btn-default']) ?></p>
            <?php } ?>
        </div>
        <?php endforeach; ?>
    </div>

    <p><a class="btn btn-success" href="https://github.com/myzero1/yii2-tools">Get More useful Tools</a></p>

</div>
