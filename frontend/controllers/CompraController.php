<?php

namespace frontend\controllers;

use Yii;
use frontend\Models\Compra;
use frontend\Models\CompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompraController implements the CRUD actions for Compra model.
 */
class CompraController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Compra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compra model.
     * @param string $CodProv
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoCom
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CodProv, $CodSucu, $NumeroD, $TipoCom)
    {
        return $this->render('view', [
            'model' => $this->findModel($CodProv, $CodSucu, $NumeroD, $TipoCom),
        ]);
    }

    /**
     * Creates a new Compra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Compra();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CodProv' => $model->CodProv, 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoCom' => $model->TipoCom]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Compra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CodProv
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoCom
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CodProv, $CodSucu, $NumeroD, $TipoCom)
    {
        $model = $this->findModel($CodProv, $CodSucu, $NumeroD, $TipoCom);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CodProv' => $model->CodProv, 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoCom' => $model->TipoCom]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Compra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CodProv
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoCom
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CodProv, $CodSucu, $NumeroD, $TipoCom)
    {
        $this->findModel($CodProv, $CodSucu, $NumeroD, $TipoCom)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Compra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CodProv
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoCom
     * @return Compra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CodProv, $CodSucu, $NumeroD, $TipoCom)
    {
        if (($model = Compra::findOne(['CodProv' => $CodProv, 'CodSucu' => $CodSucu, 'NumeroD' => $NumeroD, 'TipoCom' => $TipoCom])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
