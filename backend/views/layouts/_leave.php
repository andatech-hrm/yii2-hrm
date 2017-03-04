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

$models = ArrayHelper::merge(
    $dataCommander->getModels(),
    $dataCommanderCancel->getModels(),
    $dataInspactor->getModels(),
    $dataDirector->getModels(),
    $dataDirectorCancel->getModels()
);
    
    //print_r($models);


?>

<li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-calendar-check-o"></i>
            <span class="badge bg-red"><?=$total?></span>
        </a>
        
        
        
    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        
        <?php foreach($models as $model):?>
        <li>
            <a href="<?=Url::to(['/leave/default/view','id'=>$model->id])?>">
                <span class="image">
                    <?=Html::img($model->createdBy->photoLast)?>
                </span>
                <span>
                    <span><?=$model->createdBy->fullname?></span><br/>
                    
                </span>   
                <span class="message">
                    ขอ<?=$model->leaveType->title;?>
                </span>
                <span class="time"><?=Yii::$app->formatter->asDateTime($model->updated_at)?></span>
            </a>
        </li>
        <?php endforeach;?>
        
    </ul>
</li>



