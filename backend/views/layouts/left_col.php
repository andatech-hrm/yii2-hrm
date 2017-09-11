<?php
use yii\helpers\Html;
use mdm\admin\components\Helper;
//use yiister\gentelella\widgets\Menu;
use dmstr\widgets\Menu;
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
            <img src="<?= $person->getPhoto(); ?>" alt="..." class="img-circle profile_img">
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
          $menuItemsSelf[] = ["label" => Yii::t('andahrm','Home'), "url" => ["/"], "icon" => "fa fa-home"];
          $menuItemsSelf[] = ["label" => $person->fullname, "url" => ["/profile/"], "icon" => "fa fa-user-circle-o"];
          
          
          $menuItems = [];
          //if (Yii::$app->user->can('manage-person')){
            //$menuItems[] =  ["label" => Yii::t('andahrm','Person'), "url" => ["/person/"],"icon" => "users"];
          //}
          $module = $this->context->module->id;
 $controller = $this->context->id;
          
          
         $menuItems[] =  ["label" => Yii::t('andahrm','Manage Structure'), "url" => ["/structure/"], "icon" => "fa fa-sitemap",
         "items" => [
                    [
                        "label" => Yii::t('andahrm/structure', 'Organiaztional Structure'), 
                        "url" => ["/structure/default"],
                        "icon" => "fa fa-users"
                    ],
                    [
                            'label' => Yii::t('andahrm/structure', 'Positions'),
                            'url' => ["/structure/position"],
                            'icon' => 'fa fa-id-badge ',
                            'active'=>($controller=="position"||$controller=="position-old")?"active":""
                        ],
                        [
                            'label' => Yii::t('andahrm/structure', 'Fiscal Years'),
                            'url' => ["/structure/fiscal-year"],
                            'icon' => 'fa fa-calendar'
                        ], 
                        
                        [
                            'label' => Yii::t('andahrm/structure', 'Sections'),
                            'url' => ["/structure/section"],
                            'icon' => 'fa fa-group'
                        ],  
                        [
                            'label' => Yii::t('andahrm/structure', 'Person Types'),
                            'url' => ["/structure/person-type"],
                            'icon' => 'fa fa-vcard'
                        ],                 
                        [
                            'label' => Yii::t('andahrm/structure', 'Position Lines'),
                            'url' => ["/structure/position-line"],
                            'icon' => 'fa fa-pagelines'
                        ],
                        [
                            'label' => Yii::t('andahrm/structure', 'Position Types'),
                            'url' => ["/structure/position-type"],
                            'icon' => 'fa fa-user-circle'
                        ], 
                         [
                            'label' => Yii::t('andahrm/structure', 'Position Levels'),
                            'url' => ["/structure/position-level"],
                            'icon' => 'fa fa-level-up '
                        ], 
                        
                        [
                            'label' => Yii::t('andahrm/structure', 'Base Salaries'),
                            'url' => ["/structure/base-salary"],
                            'icon' => 'fa fa-money'
                        ],   
                   
            ]
         ];
         $menuItems[] =  [
             "label" => Yii::t('andahrm','Manage Person'), "url" => ["/person/"],"icon" => "fa fa-users",
             "items" => [
                    [
                        "label" => Yii::t('andahrm','Person'), "url" => ["/person/"],"icon" => "fa fa-users"
                    ],
                    [
                        "label" => Yii::t('andahrm','Development'), "url" => ["/development/"],"icon" => "fa fa-line-chart"
                    ],
                    [
                        "label" => Yii::t('andahrm','Insignia'), "url" => ["/insignia/"],"icon" => "fa fa-star"
                    ],
                    [
                        "label" => Yii::t('andahrm','Defect'), "url" => ["/person/defect"],"icon" => "fa fa-thumbs-o-down"
                    ],
                   
            ]
         
         
         ];
         $menuItems[] =  ["label" => Yii::t('andahrm','Leave'), "url" => ["/leave/default/"], "icon" => "fa fa-calendar"];
         
         $menuItems[] =  [
             "label" => Yii::t('andahrm','Manage Salary'), "url" => ["/position-salary/"], "icon" => "fa fa-usd",
             "items" => [
                 [
                     "label" => Yii::t('andahrm','Position-salary'), "url" => ["/position-salary/"], "icon" => "fa fa-usd",
                 ],
                 [
                     "label" => Yii::t('andahrm','Salary Calculation'), "url" => ["/salary-calculation/"], "icon" => "fa fa-calculator"],
                 ]
             
             ];
         //$menuItems[] =  ["label" => Yii::t('andahrm','Salary Calculation'), "url" => ["/salary-calculation/"], "icon" => "fa fa-calculator"];
         
         
         $menuItems[] =  [
             "label" => Yii::t('andahrm','Report'), "url" => ["/report"], "icon" => "fa fa-book",
             "items" => [
                            [
                                "label" => Yii::t('andahrm','Person Report'),
                                "url" => ["/report/person/"],
                                "icon" => "fa fa-users",
                                //'active' => (strpos($this->context->route,'report/person') !== false)?true:false
                            ],
                            [
                                "label" => Yii::t('andahrm','Leave Report'),
                                "url" => ["/report/leave/"],
                                "icon" => "fa fa-users"
                            ],
                            [
                                "label" => Yii::t('andahrm','Position Report'),
                                "url" => ["/report/position/"],
                                "icon" => "fa fa-sitemap"
                            ],
                        ]   
                    ];
         //$menuItems[] =  ["label" => Yii::t('andahrm','Insignia'), "url" => ["/insignia/"],"icon" => "star"];
         
         //$menuItems[] =  ["label" => Yii::t('andahrm','Development'), "url" => ["/development/"],"icon" => "line-chart"];
         $menuItems[] =  ["label" => Yii::t('andahrm','Edoc'), "url" => ["/edoc/"], "icon" => "fa fa-book"];
         
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
          
          
             $menuItems = Helper::filter($menuItems);
            //         $newMenu = [];
            //         foreach($menuItems as $k=>$menu){
            //           $newMenu[$k]=$menu;
            //           $newMenu[$k]['url'][0] = rtrim($menu['url'][0], "/");
            //         }
            //         $menuItems=$newMenu;
            
            
        //     $newMenu = [];
        //     foreach($menuItems as $k=>$menu){
        //           $newMenu[$k]=$menu;
        //         //   echo $menu['url'][0]." ";
        //         //   echo $this->context->route." <br/>";
        //           //$newMenu[$k]['active'] = isActive($menu['url']);
        //           $newMenu[$k]['active'] = (strpos($this->context->route,trim($menu['url'][0],'/')) !== false)?true:false;
                  
                  
        //         if(isset($menu['items'])){
        //             foreach($menu['items'] as $sk=>$sub_menu){
        //                     //echo $sub_menu['url'][0]." ";
        //                     //echo $this->context->route.strpos($this->context->route,trim($sub_menu['url'][0],'/'))." <br/>";
        //               //$newMenu[$k]['item'][$sk]['active']= isActive($sub_menu['url']);
        //               $newMenu[$k]['item'][$sk]['active']= (strpos($this->context->route,trim($sub_menu['url'][0],'/')) !== false)?true:false;
        //             }
        //         }
        //     }
        //     // echo "<pre>";
        //     // print_r($newMenu);
        //     // exit();
        //   $menuItems=$newMenu;
          
            $menuItems=ArrayHelper::merge($menuItemsSelf,$menuItems);
            echo Menu::widget(
                [
                 'options' => ['class' => 'nav side-menu'],
                 'submenuTemplate' => "\n<ul class='nav child_menu' {show}>\n{items}\n</ul>\n",
                 'activeCssClass' => 'current-page',
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

<?php


// function isActive($routes = array())
// {
//     if (Yii::$app->requestedRoute == "" && count($routes) == 0){
//         return true;
//     }
//     $routeCurrent = Yii::$app->requestedRoute;
//     foreach ($routes as $route) {
//         $pattern = sprintf('~%s~', preg_quote($route));
//         if (preg_match($pattern, $routeCurrent)) {
//             return true;
//         }
//     }
//     return false;
// }

?>