<?php

namespace app\controllers;

use app\models\BuscarForm;
use app\models\Personas;
use Yii;
use yii\data\Sort;
use yii\web\NotFoundHttpException;

/**
 * Definición del controlador personas.
 */
class PersonasController extends \yii\web\Controller
{
    public function actionPrueba()
    {
        Yii::$app->session->setFlash('error', 'Esto es un error.');
        return $this->redirect(['personas/index']);
    }

    public function actionIndex()
    {
        $sort = new Sort([
            'attributes' => [
                'nombre',
            ],
        ]);

        $buscarForm = new BuscarForm();
        $query = Personas::find();

        if ($buscarForm->load(Yii::$app->request->post()) && $buscarForm->validate()) {
            $query->andFilterWhere(['ilike', 'nombre', $buscarForm->nombre]);
        }

        if (empty($sort->orders)) {
            $query->orderBy(['id' => SORT_ASC]);
        } else {
            $query->orderBy($sort->orders);
        }

        return $this->render('index', [
            'personas' => $query->all(),
            'sort' => $sort,
        ]);
    }

    public function actionCreate()
    {
        $persona = new Personas();

        if ($persona->load(Yii::$app->request->post()) && $persona->save()) {
            return $this->redirect(['personas/index']);
        }
        return $this->render('create', [
            'persona' => $persona,
        ]);
    }

    public function actionVer($id)
    {
        $persona = $this->buscarPersona($id);

        return $this->render('ver', [
            'nombre' => $persona,
        ]);
    }

    public function actionUpdate($id)
    {
        $persona = $this->buscarPersona($id);

        if ($persona->load(Yii::$app->request->post()) && $persona->save()) {
            return $this->redirect(['personas/index']);
        }

        return $this->render('update', [
            'persona' => $persona,
        ]);
    }

    public function actionDelete($id)
    {
        $this->buscarPersona($id)->delete();
        return $this->redirect(['personas/index']);
    }

    private function buscarPersona($id)
    {
        $fila = Personas::find()
            ->where(['id' => $id])
            ->with([
                'participaciones.pelicula',
                'participaciones.papel',
            ])
            ->one();
        if ($fila === null) {
            throw new NotFoundHttpException('Esa persona no existe.');
        }
        return $fila;
    }
}
