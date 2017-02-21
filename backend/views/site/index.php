<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yiister\gentelella\widgets\Panel;
use yiister\gentelella\widgets\StatsTile;
use kartik\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
//echo Yii::$app->request->userIP;
$this->title = Yii::$app->name;
?>
<?php
$request = Yii::$app->request;
$profile = Yii::$app->user->identity->profile;
$module = $this->context->module->id;

?>
<div class="row">
    <div class="col-xs-12">
        <?php
        Panel::begin(
            [
                'header' => Yii::t('andahrm', 'General User'),
            ]
        )
        ?>
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="tile-stats text-center">
                    <div style="font-size: 5em;"><i class="fa fa-briefcase"></i></div>
                    <h1><?= Html::a(Yii::t('andahrm/person', 'Position'), ['/profile/position'], ['style' => 'font-weight:bold;']); ?></h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="tile-stats text-center">
                    <div style="font-size: 5em;"><i class="fa fa-bed"></i></div>
                    <h1><?= Html::a(Yii::t('andahrm/person', 'Leave'), ['/leave/default'], ['style' => 'font-weight:bold;']); ?></h1>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="tile-stats text-center">
                    <div style="font-size: 5em;"><i class="fa fa-briefcase"></i></div>
                    <h1><?= Html::a(Yii::t('andahrm/person', 'Leave'), ['/leave/default'], ['style' => 'font-weight:bold;']); ?></h1>
                </div>
            </div>
        </div>
        <?php Panel::end() ?>
    </div>
    
    
    
    <div class="col-xs-12">
        <?php
        Panel::begin(
            [
                'header' => Yii::t('andahrm', 'Personal User'),
            ]
        )
        ?>
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <div class="tile-stats" style="padding: 10px;">
                    <h4 class="page-header" style="margin:0"><?= Yii::t('andahrm/person', 'Person'); ?></h4>
                    <?php
                    
                        echo GridView::widget([
                            'dataProvider' => $models['person']->dataProvider,
                            'filterModel' => $models['person']->searchModel,
                            'bordered' => false,
                            'id' => 'data-grid',
                            // 'layout' => '{items}',
                            'tableOptions' => ['class' => 'jambo_table'],
                            'pjax'=>true,
                            'toolbar' => false,
                            'columns' => [
                                [
                                    'attribute' => 'fullname',
                                    'format' => 'raw',
                                    'value' => function($model) {
                                        $res = '<div class="media"> <div class="media-left"> ' . 
                                            '<img class="media-object img-circle" src="'.$model->photoLast.'" style="width: 32px; height: 32px;"> </div> ' . 
                                            '<div class="media-body"> ' . 
                                            '<h4 class="media-heading" style="margin:0;">' . 
                                            Html::a($model->fullname, ['/person/default/view', 'id' => $model->user_id], ['class' => 'green', 'data-pjax' => 0]) . '</h4> ' . 
                                            '<small>'.$model->positionTitle.'<small></div> </div>';
                                        return $res;
                                    },
                                    'filter' => "<div class=\"top_search\"><div class=\"input-group\" style=\"margin:0\">".Html::activeTextInput($models['person']->searchModel, 'fullname', ['class' => 'form-control'])."<span class=\"input-group-btn\"><button type=\"submit\" class=\"btn btn-default\"><i class=\"fa fa-search\"></i></button></span></div></div>",
                                ],
                            ],
                        ]);
                    $this->registerCss("#data-grid table thead tr:first-child{display:none;} #data-grid .pagination{margin:0}");
                    ?>
                </div>
            </div>
            
            <div class="col-md-4 col-xs-12">
                <div class="tile-stats" style="padding: 10px;">
                    <h4 class="page-header" style="margin:0"><?= Yii::t('andahrm', 'Personal Management System'); ?></h4>
                    <ul class="nav nav-pills nav-stacked"> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-line-chart"></i> '.Yii::t('andahrm/development', 'Developments'), ['/development']); ?></li> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-star"></i> '.Yii::t('andahrm', 'Insignia'), ['/insignia']); ?></li>
                    </ul>
                </div>
                <div class="tile-stats" style="padding: 10px;">
                    <h4 class="page-header" style="margin:0"><?= Yii::t('andahrm', 'Leave Management System'); ?></h4>
                    <ul class="nav nav-pills nav-stacked"> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-caret-right"></i> '.Yii::t('andahrm/leave', 'Leave Day Offs'), ['/leave/day-off']); ?></li> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-caret-right"></i> '.Yii::t('andahrm/leave', 'Leave Types'), ['/leave/type']); ?></li> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-caret-right"></i> '.Yii::t('andahrm/leave', 'Leave Conditions'), ['/leave/condition']); ?></li> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-caret-right"></i> '.Yii::t('andahrm/leave', 'Leave Permissions'), ['/leave/permission']); ?></li> 
                        <li role="presentation"><?= Html::a('<i class="fa fa-caret-right"></i> '.Yii::t('andahrm/leave', 'Leave Relateds'), ['/leave/related']); ?></li> 
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4 col-xs-12">
            </div>
        </div>
        <?php Panel::end() ?>
    </div>
    
    
    
    <div class="col-xs-12">
        <?php
        Panel::begin(
            [
                'header' => Yii::t('andahrm', 'Admin User'),
            ]
        )
        ?>
        <div class="row">
            
        </div>
        <?php Panel::end() ?>
    </div>
</div>



<?=$this->render('_structure')?>