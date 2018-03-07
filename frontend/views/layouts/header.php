<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                <?php  
                    if (Yii::$app->user->isGuest) {
                        echo Html::a(
                        'Error en el Login',
                        ['/site/logout'],
                        ['data-method' => 'post']);
                    } else {
                ?>              
                    <?= Html::a(
                        'Logout (Usuario: '.Yii::$app->user->identity->usuario.', Ubic: '.Yii::$app->user->identity->CodUbic.')',
                        ['/site/logout'],
                        ['data-method' => 'post']
                    ) ?>
                <?php 
                    };
                ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
