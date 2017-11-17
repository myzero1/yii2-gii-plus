<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace myzero1\yii2giiplus\generators\gii;

use myzero1\yii2giiplus\CodeFile;
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
class Generator extends \myzero1\yii2giiplus\Generator
{
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Default Gii';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This the default Gii of yii.';
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
    }

}
