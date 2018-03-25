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
    public function actionIndex($TipoFac = NULL)
    {
        if (isset($TipoFac)<>1) $TipoFac = 'F';

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
        $msg = "";
        /********************** CLIENTES ***************************************/
        $query = "SELECT CodClie,Descrip FROM SACLIE where Activo=1";
        $data1 = $connection->createCommand($query)->queryAll();
        
        for($i=0;$i<count($data1);$i++) {
            $data[]= $data1[$i]['CodClie']." - ".$data1[$i]['Descrip'];
        }
        
        if ($model->load(Yii::$app->request->post())) {
            date_default_timezone_set("America/Caracas");
            $hora = time();
            $hora = date('H:i:s',$hora);
            $fechat = date('Ymd H:i:s',time());
            $arr_fecha_compra=explode("-",$model->FechaE);
            $model->FechaE = $fechat;
            $model->FechaV = $model->FechaE;
            $model->FechaI = $model->FechaE;
            $model->FechaT = $model->FechaE;
            $model->CodEsta = substr(gethostname(),0,9) ;
            /*************************************************************************************************/
            //BUSCO EL CORRELATIVO QUE SIGUE
            switch ($model->TipoFac) {
                case "A":
                break;
                default: 
                    $prx = ""
            }
            $query = "SELECT * as venta FROM SACORRELSIS WHERE FieldName='LenCorrel'";
            $correlativo = $connection->createCommand($query)->queryOne();
            $model->NumeroD = $nro_despacho['despacho'];
            /*************************************************************************************************/
            //BUSCO DATOS DEL CLIENTE
            $query = "SELECT * FROM SACLIE WHERE CodClie='".$model->CodClie."'";
            $cliente = $connection->createCommand($query)->queryOne();
            //print_r($_POST);die;
            //if($model->validate()) {
            $model->Direc1 = $cliente['Direc1'];
            $model->Direc2 = $cliente['Direc2'];
            $model->ID3 = $cliente['ID3'];
            $model->Descrip = $cliente['Descrip'];
            /*************************************************************************************************/
            if ($model->validate()) {
                $transaction = $connection->beginTransaction();
                  try {
                   $query2 = "SELECT count(*) as conteo from SAFACT where CodClie='".$model->CodClie."' and TipoFac='A' and FechaE between DATEADD(minute,-1,Getdate()) and Getdate()";
                   $valido = $connection->createCommand($query2)->queryOne();
                   if ($valido['conteo']==0) {
                    $model->save();
                    /*************************************************************************************************/
                    //AUMENTO EL CORRELATIVO DEL FACTURA
                    $query = "UPDATE SACORRELSIS SET ValueInt=(ValueInt+1) WHERE FieldName='PrxFact'";
                    $connection->createCommand($query)->query();
                    /*************************************************************************************************/
                    $detalle = explode("¬",$_POST['i_items']);
                    $total = 0;
                    $costo = 0;
                    for ($i=0;$i < count($detalle) - 1;$i++) {
                        $campos = explode("#",$detalle[$i]);
                        $descrip1 = substr($campos[2],0,40);
                        $descrip2 = substr($campos[2],40,40);
                        $descrip3 = $campos[3];
                        //No    Código  Principio Act.  Nombre C.   Lote    Vencimiento Cantidad    Tratamiento Opt
                        $query2 = "SELECT Costo FROM SALOTE WHERE NroLote='".$campos[4]."' and CodProd='".$campos[1]."' and CodUbic='".$model->CodUbic."';";
                        $datos_item = $connection->createCommand($query2)->queryOne();
                        $total_items = $datos_item['Costo'] * $campos[6];
                        $total+=$total_items;
                        $costo+=$datos_item['Costo'];

                        $query2 = "INSERT INTO SAITEMFAC(CodSucu,TipoFac,NumeroD,NroLinea,NroLineaC,CodItem,CodUbic,CodVend,Descrip1,Descrip2,Descrip3,Refere,Signo,
                                CantMayor,Cantidad,TotalItem,Costo,Precio,MtoTax,PriceO,Descto,NroUnicoL,FechaE,EsServ,EsExento,Descrip10,NroLote,FechaV,DEsLote) VALUES ('".$model->CodSucu."','A','".$model->NumeroD."',
                                ".($i+1).",0,'".$campos[1]."','".$model->CodUbic."','".$model->CodVend."','".$descrip1."','".$descrip2."','".$descrip3."','".$campos[1]."',1,".$campos[6].",".$campos[6].",
                                ".$total_items.",".$datos_item['Costo'].",".$datos_item['Costo'].",0,".$datos_item['Costo'].",0,0,'".$model->FechaE."',0,1,'".$campos[7]."','".$campos[4]."','".$campos[5]."',1);";
                        $connection->createCommand($query2)->query();

                        $query2 = "UPDATE SAEXIS SET Existen=(Existen-".$campos[6].")
                                WHERE CodProd='".$campos[1]."' and CodUbic='".$model->CodUbic."'";
                        $connection->createCommand($query2)->execute();
                        //SAPROD
                        $query2 = "UPDATE SAPROD SET Existen=(Existen-".$campos[6].")
                                WHERE CodProd='".$campos[1]."'";
                        $connection->createCommand($query2)->execute();
                        //SALOTE
                        $query2 = "UPDATE SALOTE SET Cantidad=(Cantidad-".$campos[6].")
                                WHERE CodProd='".$campos[1]."' and CodUbic='".$model->CodUbic."' and NroLote='".$campos[4]."' and FechaV='".$campos[5]."'";
                        $connection->createCommand($query2)->execute();
                    }
                    //SAACXC
                    $query2 = "INSERT INTO SAACXC(CodSucu,CodClie,FechaI,FechaE,FechaV,FechaT,CodEsta,CodUsua,CodVend,NumeroD,FromTran,TipoCxc,
                      TipoTraE,Factor,Document,Monto,MontoNeto,MtoTax,RetenIVA,Saldo,EsLibroI,BaseImpo,TExento,EsUnPago,EsReten) VALUES
                      ('".$model->CodSucu."','".$model->CodClie."','".$model->FechaE."','".$model->FechaE."','".$model->FechaE."',
                      '".$model->FechaE."','".$model->CodEsta."','".$model->CodUsua."','".$model->CodVend."','".$model->NumeroD."',0,10,0,1,'".$model->NumeroD."',
                      ".$total.",".$total.",0,0,".$total.",0,0,".$total.",0,0);";
                    $connection->createCommand($query2)->execute();
                    //SAFACT
                    $query2 = "UPDATE SAFACT SET Monto=".$total.",TExento=".$total.",MtoTotal=".$total.",Contado=".$total.",TotalPrd=".$total."
                            WHERE NumeroD='".$model->NumeroD."' and TipoFac='".$model->TipoFac."'";
                    $connection->createCommand($query2)->execute();
                    }
                  $transaction->commit();
                } catch (\Exception $msg) {
                    $transaction->rollBack();
                    throw $msg;
                } catch (\Throwable $msg) {
                    $transaction->rollBack();
                    throw $msg;
                }

                return $this->redirect(['despacho/index']);
            } else {
                $msg = Json::encode($model->getErrors());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'data' => $data,
            'msg' => $msg
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
