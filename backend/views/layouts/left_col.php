<?php
use yii\helpers\Html;

?>


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
                                    ["label" => Yii::t('andahrm','Leave'), "url" => ["/leave"], "icon" => "calendar"],
                                    /*["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
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
                                    ],*/
                                ],
                            ]
                        )
                        ?>
                    </div>
                    <?php if(Yii::$app->user->can('admin')):?>
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
                  <?php endif;?>

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