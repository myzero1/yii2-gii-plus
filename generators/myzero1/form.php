<?php
foreach (Yii::$app->getModules() as $key => $mModule) {
    if (is_array($mModule)) {
        if (trim($mModule['class'], '\\') == 'myzero1\yii2giiplus\Module') {
            $moduleId = $key;
        }
    } else {
        if (trim($mModule::className(), '\\') == 'myzero1\yii2giiplus\Module') {
            $moduleId = $mModule->id;
        }
    }
}
$sUrl = Yii::$app->getUrlManager()->createUrl([$moduleId]);

$this->registerJs(
    "window.location.href='".$sUrl."'; ",
    \yii\web\View::POS_HEAD,
    'myzer1-go-home'
);