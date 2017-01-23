<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);
$asset = backend\assets\AppAsset::register($this);

$user = Yii::$app->user->identity;
$userInfo = $user->profile->getResultInfo();
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="<?=$asset->baseUrl?>/images/favicon.ico" rel="shortcut icon">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <?=$this->render('left_col',[
                    'asset'=>$asset,
                    'userInfo'=>$userInfo,
            ])?>
        </div>

        <!-- top navigation -->
        <div class="top_nav hidden-print">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?= $userInfo->avatar; ?>" alt=""><?= $userInfo->fullname; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><?= Html::a('<i class="fa fa-address-card pull-right"></i> Profile', ['/user/settings/profile']); ?>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
                                <li>
                                    <?= Html::a('<i class="fa fa-sign-out pull-right"></i> Log Out', ['/user/auth/logout'],['data-method' => 'post']); ?>
                                </li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                      <span class="image">
                                        <img src="http://placehold.it/128x128" alt="Profile Image" />
                                    </span>
                      <span>
                                        <span>John Smith</span>
                      <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a href="/">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
                <div class="page-title hidden-print">
                    <div class="title_left">
                      <!-- <h3><?= ucfirst($this->context->module->id); ?></h3> -->
                      <h3><?= Yii::t('andahrm',ucfirst($this->context->module->id)); ?></h3>                    
                      
                    </div>
                    <div class="title_right">
                        <div class="pull-right">
<!--                             <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div> -->
                        <?=
                        \yii\widgets\Breadcrumbs::widget(
                            [
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]
                        ) ?>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>
            <?php 
            foreach (Yii::$app->session->getAllFlashes() as $message) :
                echo \kuakling\lobibox\Notification::widget([
                    'type' => (isset($message['type'])) ? $message['type'] : 'default',
                    'title' => (isset($message['title'])) ? $message['title'] : ucfirst($message['type']),
                    'msg' => (isset($message['msg'])) ? $message['msg'] : '',
                ]);
            endforeach;
            ?>
            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
                Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php 
$currentMenu = (isset($this->params['current-menu'])) ? $this->params['current-menu'] : Yii::$app->request->baseUrl.'/'.$this->context->module->id."/".$this->context->id;

$this->registerJs("
//$('form').submit(function(){
$(document).on('submit', 'form', function(){
     var submitBtns = $(this).find(':submit');
     submitBtns.find('.fa').attr('class', 'fa fa-spinner fa-spin');
     submitBtns.addClass('disabled');
});

var \$SIDEBAR_MENU = $('#sidebar-menu');
var actionIndex = '".$currentMenu."';
\$SIDEBAR_MENU.find('a[href=\"'+actionIndex+'\"]').parent('li').addClass('current-page').parents('ul').slideDown().parent().addClass('active');

\$('a').click(function(){
    var \$HREF = $(this).attr('href');
    if(\$HREF === '#' || \$HREF === '#!'){
        return false;
    }
});
");
?>
    
    
<?php
$this->registerCss("
ul.bar_tabs > li.active a{
    padding-bottom: 12px;
}
ul.bar_tabs{
    margin-bottom:0;
}
.tab-content{
    border: 1px solid #E6E9ED;
    padding:10px;
    background-color:#fff;
}
.form-group{
    position: relative;
}
.help-block{
    position: absolute;
    top: 0;
    right: 5px;
}");
?>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>