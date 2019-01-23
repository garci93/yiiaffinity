<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Insertar una nueva persona';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin() ?>
    <?= $form->field($persona, 'nombre') ?>
    <div class="form-group">
        <?= Html::submitButton('Insertar persona', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Cancelar', ['personas/index'], ['class' => 'btn btn-danger']) ?>
    </div>
<?php ActiveForm::end() ?>
