<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Configuracion;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Configuracion::findOne(1)->NombreGimnacio,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Inicio', 'url' => ['/site/index']],
            !Yii::$app->user->isGuest ? ['label' => 'Usuarios', 'url' => ['/usuario']] : "",
            !Yii::$app->user->isGuest ? ['label' => 'Socios', 'url' => ['/socio']] : "",
            !Yii::$app->user->isGuest ? ['label' => 'Membresias', 'url' => ['/membresia']] : "",
            !Yii::$app->user->isGuest ? ['label' => 'Productos', 'url' => ['/producto']] : "",
            !Yii::$app->user->isGuest ? ['label' => 'Configuracion', 'url' => ['/configuracion/update?id=1'], 'role' => 'modal-remote'] : "",
            Yii::$app->user->isGuest ? (
                ['label' => 'Entrar', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Salir (' . Yii::$app->user->identity->Usuario . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )

        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?php echo Configuracion::findOne(1)->NombreGimnacio; ?> <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
