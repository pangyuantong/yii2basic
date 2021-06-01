<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>DPEX Bootcamp</h1>

        <p class="lead">Yii2 Basic Tryout.</p>
        <h3><?php
            echo 
                Yii::$app->user->isGuest ? ( 
                        "Please Log In to Manage Guests."
                    ) 
                    :     
                    ( 
                        "Welcome, ".Yii::$app->user->identity->username
                    ) 
        ?></h3>
    </div>

    
</div>
