<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Регистрация и учет заявок на ремонт</h1>

    <?php
    if (Yii::$app->user->isGuest){
    ?>
        <p class="lead">Войдите чтобы продолжить</p>
        <p><a class="btn btn-lg btn-success" href="https://project.ru/site/login">Войти</a></p>
    <?php
    }
    ?>

        <?php
        if (!Yii::$app->user->isGuest){
            ?>
            <p class="lead">Успешный вход, продолжайте работу!</p>

            <?php
        }
        ?>



    </div>


</div>
