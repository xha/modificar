<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        
        <?php
            /*if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'icon' => 'circle-o', 'url' => ['../../backend/web/site/login']];
                $menuItems[] = ['label' => 'Registro', 'icon' => 'file-o', 'url' => ['../../backend/web/site/register']];
                $menuItems[] = ['label' => 'Recuperar Usuario', 'icon' => 'unlock', 'url' => ['../../backend/web/site/recuperar']];
            } else {*/
                $menuItems[] = ['label' => 'Configuración', 'icon' => 'circle-o', 'url' => '#',
                                    'items' => [
                                        ['label' => 'Accion', 'icon' => 'check', 'url' => ['../../backend/web/accion']],
                                        ['label' => 'Rol', 'icon' => 'check', 'url' => ['../../backend/web/rol']],
                                        ['label' => 'Rol - Accion', 'icon' => 'check', 'url' => ['../../backend/web/rol-accion']],
                                        ['label' => 'Recuperar Usuario', 'icon' => 'check', 'url' => ['../../backend/web/site/recuperar']],
                                        ['label' => 'Activar Usuario', 'icon' => 'check', 'url' => ['../../backend/web/site/activar']],
                                        ['label' => 'Cambiar Clave', 'icon' => 'check', 'url' => ['../../backend/web/site/cambiar']],
                                        ['label' => 'Preguntas', 'icon' => 'check', 'url' => ['../../backend/web/pregunta']],
                                ],];
                $menuItems[] = ['label' => 'Área de Trabajo', 'icon' => 'unlock', 'url' => ['../../frontend/web/site/']];
            //}
        ?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => $menuItems,
            ]
        ) ?>
                <!--'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'About', 'icon' => 'star', 'url' => ['/site/about']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],*/-->

    </section>

</aside>
