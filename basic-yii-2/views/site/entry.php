<?php
use yii\helpers\Html;
use \yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<?php $form = ActiveForm::begin();?>
    <?= $form->field($model, 'name')->label('Your name:') ?>
    <?= $form->field($model, 'email')->label('Your email:') ?>
    
<div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
<div
<?phpActiveForm::end(); ?>