<?php
/**
 * This is the template for generating a asset class within a theming.
 */

/* @var $this yii\web\AssetBundle */
/* @var $generator myzero1\yii2giiplus\generators\theming\Generator */

$namespace = $generator->ns . '\\' . $generator->getThemingName($generator->themingID) . '\assets';
$adminLte = '\\' . $namespace . '\common\AdminLte';
$html5shiv = '\\' . $namespace . '\common\Html5shiv';
$basePathAlias = '@' . str_replace('\\', '/', $generator->ns) . '/' . $generator->getThemingName($generator->themingID) . '/assets';

echo "<?php\n";
?>

namespace <?= $namespace ?>;

use yii\web\AssetBundle;

/**
 * Main asset for the `<?= $generator->getThemingName($generator->themingID) ?>` theming
 */

class ThemingAsset extends AssetBundle
{
    public $sourcePath = '<?= $basePathAlias ?>';
    //public $baseUrl = '@web';

    public $publishOptions = [
        'forceCopy' => YII_DEBUG,
    ];

    public $noCachePath = [
        'css/custom.css',
        'js/custom.js',
    ];

    public $css = [
        'css/custom.css',
        'css/AdminLTE-local-font.min.css',
    ];

    public $js = [
        'js/custom.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        '<?=$adminLte?>',
        '<?=$html5shiv?>'
    ];

    public $skin = 'skin-blue';

    public function init()
    {
        parent::init();

        if (YII_DEBUG) {
            $this->publishOptions['beforeCopy'] = function ($from, $to) {
                $sourcePath = \Yii::getAlias($this->sourcePath) . '/';
                $fromNew = str_replace($sourcePath, '', $from);

                if (in_array($fromNew, $this->noCachePath)) {
                    unlink($to);
                }

                return true;
            };
        }
    }
}
