<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\gii\generators\theming;

use yii\gii\CodeFile;
use yii\helpers\Html;
use Yii;
use yii\helpers\StringHelper;

/**
 * This generator will generate the skeleton code needed by a module.
 *
 * @property string $controllerNamespace The controller namespace of the module. This property is read-only.
 * @property boolean $modulePath The directory that contains the module class. This property is read-only.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Generator extends \yii\gii\Generator
{
    const THEMING_ADMINLTE = 1;

    public $ns;
    public $themingID = THEMING_ADMINLTE;


    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Theming Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator helps you to generate the skeleton code needed by a Yii theming.';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['themingID', 'ns'], 'filter', 'filter' => 'trim'],
            [['themingID', 'ns'], 'required'],
            [['ns'], 'filter', 'filter' => function($value) { return trim($value, '\\'); }],
            [['ns'], 'match', 'pattern' => '/^[\w\\\\]*$/', 'message' => 'Only word characters and backslashes are allowed.'],
            ['themingID', 'in', 'range' => [1]],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'themingID' => 'Theming ID',
            'ns' => 'Theming namespace',
        ];
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [
            'themingID' => 'This refers to the ID of the module, e.g., <code>admin</code>.',
            'ns' => 'This is the fully qualified class name of the module, e.g., <code>app\modules\admin\Module</code>.',
        ];
    }

    /**
     * @inheritdoc
     */
    public function successMessage()
    {
        if (Yii::$app->hasModule($this->themingID)) {
            $link = Html::a('try it now', Yii::$app->getUrlManager()->createUrl($this->themingID), ['target' => '_blank']);

            return "The module has been generated successfully. You may $link.";
        }

        $output = <<<EOD
<p>The module has been generated successfully.</p>
<p>To access the module, you need to add this to your application configuration:</p>
EOD;
        $code = <<<EOD
<?php
    ......
    'modules' => [
        '{$this->themingID}' => [
            'class' => '{$this->ns}',
        ],
    ],
    ......
EOD;

        return $output . '<pre>' . highlight_string($code, true) . '</pre>';
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return [
            // 'AdminLte.php',
            // 'FontAwesome.php',
            // 'Html5shiv.php',
            // 'JquerySlimScroll.php',
            // 'AdminLteThemingAsset.php',
        ];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $themingPath = $this->getThemingPath();
        $files[] = new CodeFile(
            $themingPath . '/assets/ThemingAsset.php',
            $this->render("adminlte/assets/ThemingAsset.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/assets/common/AdminLte.php',
            $this->render("adminlte/assets/common/AdminLte.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/assets/common/FontAwesome.php',
            $this->render("adminlte/assets/common/FontAwesome.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/assets/common/Html5shiv.php',
            $this->render("adminlte/assets/common/Html5shiv.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/assets/common/JquerySlimScroll.php',
            $this->render("adminlte/assets/common/JquerySlimScroll.php")
        );

        $files[] = new CodeFile(
            $themingPath . '/assets/js/custom.js',
            $this->render("adminlte/assets/js/custom.js")
        );
        $files[] = new CodeFile(
            $themingPath . '/assets/css/custom.css',
            $this->render("adminlte/assets/css/custom.css")
        );

        $files[] = new CodeFile(
            $themingPath . '/views/layouts/blank.php',
            $this->render("adminlte/views/layouts/blank.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/views/layouts/default.php',
            $this->render("adminlte/views/layouts/default.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/views/layouts/guest.php',
            $this->render("adminlte/views/layouts/guest.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/views/layouts/head.php',
            $this->render("adminlte/views/layouts/head.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/views/layouts/main.php',
            $this->render("adminlte/views/layouts/main.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/views/layouts/sidebar-menu.php',
            $this->render("adminlte/views/layouts/sidebar-menu.php")
        );

        $files[] = new CodeFile(
            $themingPath . '/widgets/Menu.php',
            $this->render("adminlte/widgets/Menu.php")
        );
        $files[] = new CodeFile(
            $themingPath . '/widgets/Alert.php',
            $this->render("adminlte/widgets/Alert.php")
        );

        return $files;
    }

    /**
     * Validates [[ns]] to make sure it is a fully qualified class name.
     */
    public function validatens()
    {
        if (strpos($this->ns, '\\') === false || Yii::getAlias('@' . str_replace('\\', '/', $this->ns), false) === false) {
            $this->addError('ns', 'Module class must be properly namespaced.');
        }
        if (empty($this->ns) || substr_compare($this->ns, '\\', -1, 1) === 0) {
            $this->addError('ns', 'Module class name must not be empty. Please enter a fully qualified class name. e.g. "app\\modules\\admin\\Module".');
        }
    }

    /**
     * @return boolean the directory that contains the module class
     */
    public function getThemingPath()
    {
        return Yii::getAlias('@' . str_replace('\\', '/', $this->ns)) . '/' . $this->getThemingName($this->themingID);
    }

    /**
     * @return string the controller namespace of the module.
     */
    public function getControllerNamespace()
    {
        return substr($this->ns, 0, strrpos($this->ns, '\\')) . '\controllers';
    }

    /**
     * @return string the controller namespace of the module.
     */
    public function getThemingName($id)
    {
        $aThemingName = [
            1 => 'adminlte',
        ];

        return $aThemingName[$id];
    }
}
