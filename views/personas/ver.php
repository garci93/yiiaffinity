<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Ver una persona';
$this->params['breadcrumbs'][] = $this->title;
$inputOptions = [
    'inputOptions' => [
        'class' => 'form-control',
        'readonly' => true,
    ],
];
?>
<?php foreach ($persona->participaciones as $participacion): ?>
    <dl class="dl-horizontal">
        <dt>Persona</dt>
        <dd><?= $participacion->persona->nombre ?></dd>
        <dt>Papel</dt>
        <dd><?= $participacion->papel->papel ?></dd>
    </dl>
<?php endforeach ?>

<?php $form = ActiveForm::begin(['enableClientValidation' => false]) ?>
    <?= $form->field($persona, 'nombre', $inputOptions) ?>
    <div class="form-group">
        <?= Html::a('Volver', ['personas/index'], ['class' => 'btn btn-danger']) ?>
    </div>
<?php ActiveForm::end() ?>
