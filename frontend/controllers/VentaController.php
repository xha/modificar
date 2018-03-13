<?php

namespace frontend\controllers;

use Yii;
use frontend\Models\Venta;
use frontend\Models\VentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;
use common\models\AccessHelpers;
/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex($TipoFac)
    {
        $searchModel = new VentaSearch([ 'TipoFac' => $TipoFac]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'TipoFac' => $TipoFac,
        ]);
    }

    /**
     * Displays a single Venta model.
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoFac
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($CodSucu, $NumeroD, $TipoFac)
    {
        return $this->render('view', [
            'model' => $this->findModel($CodSucu, $NumeroD, $TipoFac),
        ]);
    }

    /**
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Venta();
        $connection = \Yii::$app->db;
        $data = array();
        $items = array();
        /********************** CLIENTES ***************************************/
        $query = "SELECT CodClie,Descrip FROM SACLIE where Activo=1";
        $data1 = $connection->createCommand($query)->queryAll();
        
        for($i=0;$i<count($data1);$i++) {
            $data[]= $data1[$i]['CodClie']." - ".$data1[$i]['Descrip'];
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoFac' => $model->TipoFac]);
        }

        return $this->render('create', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoFac
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($CodSucu, $NumeroD, $TipoFac)
    {
        $model = $this->findModel($CodSucu, $NumeroD, $TipoFac);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'CodSucu' => $model->CodSucu, 'NumeroD' => $model->NumeroD, 'TipoFac' => $model->TipoFac]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoFac
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($CodSucu, $NumeroD, $TipoFac)
    {
        //$this->findModel($CodSucu, $NumeroD, $TipoFac)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $CodSucu
     * @param string $NumeroD
     * @param string $TipoFac
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($CodSucu, $NumeroD, $TipoFac)
    {
        if (($model = Venta::findOne(['CodSucu' => $CodSucu, 'NumeroD' => $NumeroD, 'TipoFac' => $TipoFac])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /***********************************************************************************************************************/
    public function actionBuscarCliente($cliente) {
        $connection = \Yii::$app->db;

        $query = "SELECT * from SACLIE where Activo=1 and CodClie='".$cliente."'";
        $pendientes = $connection->createCommand($query)->queryOne();
        //$pendientes = $comand->readAll();
        return Json::encode($pendientes);
    }    
    
    public function actionBuscarProducto($codigo, $servicio) {
        $connection = \Yii::$app->db;

        if ($servicio==1) {
            $query = "SELECT CodServ as Codigo, CONCAT(Descrip,Descrip2,Descrip3) as Descrip, Precio1 as Costo,EsExento,1 as EsServ
                    from SASERV
                    where Activo=1 and (CodServ like '%".$codigo."%' OR Descrip like '%".$codigo."%' OR Descrip2 like '%".$codigo."%' 
                    OR Descrip3 like '%".$codigo."%')";
        } else {
            $query = "SELECT CodProd as Codigo, CONCAT(Descrip,Descrip2,Descrip3) as Descrip, Precio1 as Costo,EsExento,0 as EsServ
                    from SAPROD
                    where Activo=1 and (CodProd like '%".$codigo."%' OR Descrip like '%".$codigo."%' OR Descrip2 like '%".$codigo."%' 
                    OR Descrip3 like '%".$codigo."%')";
        }
        
        $pendientes = $connection->createCommand($query)->queryAll();
        return Json::encode($pendientes);
    } 
}
