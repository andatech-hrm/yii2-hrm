<?php
use yii\helpers\Html;
use mdm\admin\components\Helper;
use yiister\gentelella\widgets\Menu;
//use dmstr\widgets\Menu;
use yii\helpers\ArrayHelper;
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
            <img src="<?= $person->getPhotoLast(); ?>" alt="..." class="img-circle profile_img">
        </div>
        <div class="profile_info">
            <span><?=Yii::t('app','Welcome')?>,</span>
            <h2><?= $person->getFullname(); ?></h2>
        </div>
    </div>
    <!-- /menu prile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

        <div class="menu_section">
            <h3><?= current($person->getRoles()); ?></h3>
            <?php
          $menuItemsSelf = [];
          $menuItemsSelf[] = ["label" => Yii::t('andahrm','Home'), "url" => ["/"], "icon" => "home"];
          $menuItemsSelf[] = ["label" => $person->fullname, "url" => ["/profile/"], "icon" => "user-circle-o"];
          
          
          $menuItems = [];
          //if (Yii::$app->user->can('manage-person')){
            $menuItems[] =  ["label" => Yii::t('andahrm','Person'), "url" => ["/person/"],"icon" => "users"];
          //}
         $menuItems[] =  ["label" => Yii::t('andahrm','Development'), "url" => ["/development/"],"icon" => "line-chart"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Insignia'), "url" => ["/insignia/"],"icon" => "line-chart"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Structure'), "url" => ["/structure/"], "icon" => "sitemap"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Position-salary'), "url" => ["/position-salary/"], "icon" => "usd"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Salary Calculation'), "url" => ["/salary-calculation/"], "icon" => "calculator"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Leave'), "url" => ["/leave/default/"], "icon" => "calendar"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Edoc'), "url" => ["/edoc/"], "icon" => "book"];
                          /* $menuItems[] = ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
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
          
          
             //$menuItems = Helper::filter($menuItems);
//                     $newMenu = [];
//                     foreach($menuItems as $k=>$menu){
//                       $newMenu[$k]=$menu;
//                       $newMenu[$k]['url'][0] = rtrim($menu['url'][0], "/");
//                     }
//                     $menuItems=$newMenu;
          
          
            $menuItems=ArrayHelper::merge($menuItemsSelf,$menuItems);
            echo Menu::widget(
                [
                 //'options' => ['class' => 'nav side-menu'],
                 //'encodeLabels' => true,
                    //"activeCssClass" => "current-page",
                    "items" => $menuItems,
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