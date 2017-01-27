<?php


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
    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
        <div class="x_panel">
            <div class="x_title">
                <h2>User Report <small>Activity report</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
               
                        <div class="profile_img">
                            <img class="img-responsive avatar-view" src="<?= $profile->resultInfo->avatar; ?>" alt="Avatar" title="Change the avatar">
                        </div>
                        <h3><?= $profile->fullname; ?></h3>

                        <ul class="list-unstyled user_data">
                            <li><i class="fa fa-map-marker user-profile-icon"></i> San Francisco, California, USA
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i> Software Engineer
                            </li>

                            <li class="m-top-xs">
                                <i class="fa fa-external-link user-profile-icon"></i>
                                <a href="http://www.kimlabs.com/profile/" target="_blank">www.kimlabs.com</a>
                            </li>
                        </ul>
                   
            </div>
        </div>
    </div>
    <div class="col-md-9 col-sm-9 col-xs-12">
      
    </div>
</div>



<?=$this->render('_structure')?>