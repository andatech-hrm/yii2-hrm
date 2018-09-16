<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $profile->resultInfo->avatar ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $profile->resultInfo->fullname ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->
        <?php
        $isAdmin = (Yii::$app->session->get('user.idbeforeswitch') === null) ? false : true;
        ?>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'User settings', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'fa fa-dashboard', 'url' => ['default/index']],
                    [
                        'label' => 'Settings',
                        'icon' => 'fa fa-cog',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Profile', 'icon' => 'fa fa-book', 'url' => ['settings/profile'],],
                            ['label' => 'Account', 'icon' => 'fa fa-adn', 'url' => ['settings/account'],],
                            ['label' => 'Change password', 'icon' => 'fa fa-key', 'url' => ['settings/change-password'],],
                        ],
                    ],
                    ['label' => 'Admin', 'icon' => 'fa fa-users', 'url' => ['admin/index']],
                    ['label' => 'Log off ['.Yii::$app->user->identity->username.']', 'icon' => 'fa fa-power-off', 'url' => ['admin/log-off'], 'visible' => $isAdmin, 'options'  => ['class' => 'bg-red'],],
                    ['label' => 'RBAC', 'icon' => 'fa fa-filter', 'url' => $this->context->module->rbacUrl],
                ],
            ]
        ) ?>

    </section>

</aside>
