<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'Listado de películas';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php var_dump($sort->orders) ?>
<?php $form = ActiveForm::begin() ?>
    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>

<h1>Listado de personas</h1>
<table class="table table-striped">
    <thead>
        <th>#</th>
        <th><?= $sort->link('nombre') ?></th>
        <th>Acciones</th>
    </thead>
    <tbody>
        <?php
        $i = 1;
        ?>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= Html::a(Html::encode($persona->nombre), ['personas/ver', 'id' => $persona->id]) ?></td>
                <td>
                    <?= Html::a('Modificar', ['personas/update', 'id' => $persona->id], ['class' => 'btn-xs btn-info']) ?>
                    <?= Html::a('Ver', ['personas/ver', 'id' => $persona->id], ['class' => 'btn-xs btn-warning']) ?>
                    <?= Html::a('Borrar', ['personas/delete', 'id' => $persona->id], [
                        'class' => 'btn-xs btn-danger',
                        'data-confirm' => '¿Seguro que desea borrar?',
                        'data-method' => 'POST',
                    ]) ?>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<div class="row">
    <div class="text-center">
        <?= Html::a('Insertar persona', ['personas/create'], ['class' => 'btn btn-info']) ?>
    </div>
</div>
