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
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title">
                      <!--<i class="fa fa-users"></i>  -->
                      <?=Html::img($asset->baseUrl.'/images/logo.png',['width'=>'37'])?>
                      <span><?= Yii::$app->name; ?></span>
                  </a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?= $userInfo->avatar; ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span><?=Yii::t('app','Welcome')?>,</span>
                        <h2><?= $userInfo->fullname; ?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3><?= current(($userInfo->roles)); ?></h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                //"activeCssClass" => "current-page",
                                "items" => [
                                    ["label" => Yii::t('andahrm','Home'), "url" => ["/"], "icon" => "home"],
                                    ["label" => Yii::$app->user->identity->profile->fullname, "url" => ["/person/default/index"], "icon" => "user-circle-o"],
                                    ["label" => Yii::t('andahrm','Person'), "url" => '#', "icon" => "users", "items" => [
                                         ["label" => "People", "url" => ["/person/people/index"], ['itemOptions' => ['class' => 'abcd']]],
                                         ["label" => "Position", "url" => ["/person/position/index"]],
                                    ]],
                                    ["label" => Yii::t('andahrm','Structure'), "url" => ["/structure"], "icon" => "sitemap"],
                                    ["label" => Yii::t('andahrm','Leave'), "url" => ["/leave"], "icon" => "sitemap"],
                                    ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                    [
                                        "label" => "Widgets",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ["label" => "Menu", "url" => ["site/menu"]],
                                            ["label" => "Panel", "url" => ["site/panel"]],
                                        ],
                                    ],
                                    [
                                        "label" => "Badges",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Default",
                                                "url" => "#",
                                                "badge" => "123",
                                            ],
                                            [
                                                "label" => "Success",
                                                "url" => "#",
                                                "badge" => "new",
                                                "badgeOptions" => ["class" => "label-success"],
                                            ],
                                            [
                                                "label" => "Danger",
                                                "url" => "#",
                                                "badge" => "!",
                                                "badgeOptions" => ["class" => "label-danger"],
                                            ],
                                        ],
                                    ],
                                    [
                                        "label" => "Multilevel",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            [
                                                "label" => "Second level 1",
                                                "url" => "#",
                                            ],
                                            [
                                                "label" => "Second level 2",
                                                "url" => "#",
                                                "items" => [
                                                    [
                                                        "label" => "Third level 1",
                                                        "url" => "#",
                                                    ],
                                                    [
                                                        "label" => "Third level 2",
                                                        "url" => "#",
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>
                    
                    <div class="menu_section">
                        <h3>Administrator</h3>
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    ["label" => "Setting", "url" => ["/setting"], "icon" => "cog"],
                                    //["label" => "Person", "url" => ["/person"], "icon" => "files-o"],
                                 ]
                            ]
                        )
                        ?>
                    </div>

               </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
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
$this->registerJs("
//$('form').submit(function(){
$(document).on('submit', 'form', function(){
     var submitBtns = $(this).find(':submit');
     submitBtns.find('.fa').attr('class', 'fa fa-spinner fa-spin');
     submitBtns.addClass('disabled');
});

var \$SIDEBAR_MENU = $('#sidebar-menu');
var actionIndex = '".Yii::$app->request->baseUrl.'/'.$this->context->module->id."/".$this->context->id."/index';
\$SIDEBAR_MENU.find('a[href=\"'+actionIndex+'\"]').parent('li').addClass('current-page').parents('ul').slideDown().parent().addClass('active');

\$('a').click(function(){
    var \$HREF = $(this).attr('href');
    if(\$HREF === '#' || \$HREF === '#!'){
        return false;
    }
});
");
?>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>