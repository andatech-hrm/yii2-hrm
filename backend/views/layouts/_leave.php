<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use andahrm\leave\models\LeaveSearch;
use andahrm\leave\models\LeaveCommanderSearch;
use andahrm\leave\models\LeaveCommanderCancelSearch;
use andahrm\leave\models\LeaveInspactorSearch;
use andahrm\leave\models\LeaveDirectorSearch;
use andahrm\leave\models\LeaveDirectorCancelSearch;

$total=0;

$searchModel = new LeaveCommanderSearch();
$dataCommander = $searchModel->search(Yii::$app->request->queryParams);

$searchModel = new LeaveCommanderCancelSearch();
$dataCommanderCancel = $searchModel->search(Yii::$app->request->queryParams);

$searchModel = new LeaveInspactorSearch();
$dataInspactor = $searchModel->search(Yii::$app->request->queryParams);

$searchModel = new LeaveDirectorSearch();
$dataDirector = $searchModel->search(Yii::$app->request->queryParams);
        
$searchModel = new LeaveDirectorCancelSearch();
$dataDirectorCancel = $searchModel->search(Yii::$app->request->queryParams);


$total = $dataCommander->getCount() 
    + $dataCommanderCancel->getCount()
    + $dataInspactor->getCount()
    + $dataDirector->getCount() 
    + $dataDirectorCancel->getCount();

$dataModels = ArrayHelper::merge(
    ['/leave/commander/consider'=>$dataCommander->getModels()],
    ['/leave/commander/consider-cancel'=>$dataCommanderCancel->getModels()],
    ['/leave/inspector/consider'=>$dataInspactor->getModels()],
    ['/leave/director/consider'=>$dataDirector->getModels()],
    ['/leave/director/consider-cancel'=>$dataDirectorCancel->getModels()]
);
    
    //print_r($models);


?>

<li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-calendar-check-o"></i>
            <?php if($total):?>
            <span class="badge bg-red"><?=$total?></span>
            <?php endif();?>
        </a>
        
        
        
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        
        <?php
        if($dataModels):
        foreach($dataModels as $link => $models):
            foreach($models as $model):?>
            <li>
                <a href="<?=Url::to([$link,'id'=>$model->id])?>">
                    <span class="image">
                        <?=Html::img($model->createdBy->photoLast)?>
                    </span>
                    <span>
                        <span><?=$model->createdBy->fullname?></span>
                        <span class="time"><?= \anda\timeago\TimeAgo::widget(['timestamp' => $model->updated_at])?></span>
                    </span>   
                    <span class="message">
                        พิจารณา<?=$model->leaveType->title;?>
                    </span>
                    
                </a>
            </li>
            <?php
            endforeach;
        endforeach;
        endif;
        
        
        
        
       
        ?>
        <li>
            <div class="text-center">
                 <a href="<?=Url::to(['/leave/'])?>">
                    <strong><?=Yii::t('andahrm','See All ');?></strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
    </ul>
</li>



