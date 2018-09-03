<?php
use yii\bootstrap\Html;
//use yii\widgets\Menu;
use yii\bootstrap\Nav;
use dmstr\widgets\Menu;
use mdm\admin\components\Helper;
use lajax\translatemanager\bundles\TranslateManagerAsset;


TranslateManagerAsset::register($this);

 $this->beginContent('@app/views/layouts/main.php'); 
 $module = $this->context->module->id;
?>


<?php
    $menuItems = [

//         ['label' => Html::icon('home'). ' ' .Yii::t('language', 'Home'),
//          'url' => ['/translatemanager/default']],
        ['label' => Yii::t('language', 'Languages'),
         'url' => ['/translatemanager/language/list'],
         'icon' => 'fa fa-flag'],
        ['label' => Html::icon('new-window'). ' ' .Yii::t('language', 'Create'), 
         'url' => ['/translatemanager/language/create']],
        ['label' => Html::icon('search'). ' ' .Yii::t('language', 'Scan'), 
         'url' => ['/translatemanager/language/scan']],
        ['label' => Html::icon('refresh'). ' ' .Yii::t('language', 'Optimize'), 
         'url' => ['/translatemanager/language/optimizer']],
        ['label' => Html::icon('import'). ' ' .Yii::t('language', 'Import'), 
         'url' => ['/translatemanager/language/import']],
        ['label' => Html::icon('export'). ' ' .Yii::t('language', 'Export'), 
         'url' => ['/translatemanager/language/export']],

    ];
    $menuItems = Helper::filter($menuItems);

    //$nav = new Navigate();
    echo Menu::widget([
        'options' => ['class' => 'nav nav-tabs'],
        'encodeLabels' => false,
        //'activateParents' => true,
        //'linkTemplate' =>'<a href="{url}">{icon} {label} {badge}</a>',
        'items' => $menuItems,
    ]);
    ?>
      
        <div class="x_panel tile">
            <div class="x_title">
                <h2><?= $this->title; ?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <?php echo $content; ?>
                <div class="clearfix"></div>
            </div>
        </div>
      
   

<?php $this->endContent(); ?>
