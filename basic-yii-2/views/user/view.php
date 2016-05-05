<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Common\PermissionHelpers;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$show_this_nav = PermissionHelpers::requireMinimumRole('SuperUser');
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (!Yii::$app->user->isGuest && $show_this_nav)
        {
            echo Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'profileLink', 'format' => 'raw'],
            'username',
            'email:email',
            'roleName',
            'statusName',
            'userTypeName',
            'id'
        ],
    ])
    ?>

</div>
