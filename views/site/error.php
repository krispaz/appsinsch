<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        USTED NO CUENTA CON LOS PERMISOS SUFICIENTES PARA ACCEDER A ESTA PÁGINA.
    </p>
    <p>
        COMUNIQUESE CON EL ADMINISTRADOR DE LA PÁGINA PARA MAS DETALLES
    </p>

</div>
