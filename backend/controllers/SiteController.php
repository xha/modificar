<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\AccessHelpers;
use common\models\Usuario;
use backend\models\LoginForm;
use backend\models\RegisterForm;
use backend\models\RecuperarClaveForm;
use backend\models\ActivarForm;
use backend\models\CambiarClaveForm;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\db\Query;
use yii\helpers\Json;
Use app\itbz\fpdf\src\fpdf\fpdf;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'register', 'recuperar'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'cambiar', 'recuperar', 'activar', 'permiso', 'busca-usuarios'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionPermiso()
    {
        return $this->render('permiso');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionRegister() {
        $model = new RegisterForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate()) {
                //Preparamos la consulta para guardar el usuario
                $table = new Usuario;
                $table->usuario = $model->usuario;
                $table->correo = $model->correo;
                $table->cedula = $model->cedula;
                $table->nombre = $model->nombre;
                $table->apellido = $model->apellido;
                $table->sexo = $model->sexo;
                $table->telefono = $model->telefono;
                $table->id_rol = 1;
                $table->id_pregunta = $model->id_pregunta;
                $table->respuesta_seguridad = $model->respuesta_seguridad;
                $table->CodUbic = $model->CodUbic;
                $table->activo = 0;
                $table->clave = md5("is".$model->clave);
                
                //Si el registro es guardado correctamente
                //print_r($table->getErrors());die;
                if ($table->insert(false))
                {
                    $msg = "Registro Guardado, Debe esperar que un administrador active su cuenta";
                }
                else
                {
                    $msg = "Error al guardar";
                }
            } else {
                $model->getErrors();
            }
          }

        return $this->render('register', [
            'model' => $model,
            'msg' => $msg
        ]);  
    }
    
    public function actionCambiar() {
        $model = new CambiarClaveForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()))
        {
            if($model->validate()) {
                //Preparamos la consulta para guardar el usuario
                $table = new Usuario;
                $table->id_usuario = $model->id_usuario;
                $table->clave = md5("is".$model->clave);
                $table->clave_actual = md5("is".$model->clave_actual);
                
                $connection = \Yii::$app->db;

                $query = "UPDATE ISOP_usuario
                SET clave='".$table->clave."'
                OUTPUT INSERTED.clave
                where id_usuario='".$table->id_usuario."' and clave='".$table->clave_actual."'";
                $salida = $connection->createCommand($query)->queryOne();
        
                if ($salida['clave']!="") {
                    $msg = "Registro Actualizado";
                } else {
                    $msg = "Error al actualizar la clave";
                }
                
            } else {
                $model->getErrors();
            }
          }

        return $this->render('cambiar', [
            'model' => $model,
            'msg' => $msg
        ]);  
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRecuperar()
    {
        $model = new RecuperarClaveForm;
           
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()))
        {
            $clave = md5("is".$model->clave);
            $connection = \Yii::$app->db;

            $query = "UPDATE ISOP_usuario
            SET clave='$clave'
            where usuario='".$model->usuario."' and id_pregunta=".$model->id_pregunta." and respuesta_seguridad='".$model->respuesta_seguridad."' and correo='".$model->correo."'";
            $msg = $connection->createCommand($query)->execute();
            
            if ($msg > 0) {
                $msg = "Registro Actualizado";
            } else {
                $msg = "Error al Actualizar";
            };
        }

        return $this->render('recuperar', [
            'model' => $model,
            'msg' => $msg
        ]);
    }

    public function actionActivar()
    {
        $model = new ActivarForm;
        $connection = \Yii::$app->db;
        $msg = null;
        $data = array();
        
        $query = "SELECT usuario FROM ISOP_USUARIO";
        $data1 = $connection->createCommand($query)->queryAll();

        for($i=0;$i<count($data1);$i++) {
            $data[]= $data1[$i]['usuario'];
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $extra="";
            if ($model->reseteo==1) {
                $extra = md5("is123456");
                $extra = ",clave='".$extra."'";
            }

            $query = "UPDATE ISOP_USUARIO
            SET id_rol=".$model->id_rol.", CodUbic='".$model->CodUbic."', activo=".$model->activado." $extra
            where usuario='".$model->usuario."'";
            
            $msg = $connection->createCommand($query)->execute();
            
            if ($msg > 0) {
                $msg = "Registro Actualizado";
            } else {
                $msg = "Error al Actualizar";
            };
        }
        
        return $this->render('activar', [
            'model' => $model,
            'msg' => $msg,
            'data' => $data
        ]);
    }
    
    public function actionBuscaUsuarios() {
        $connection = \Yii::$app->db;
        
        $query = "select u.usuario, u.cedula, CONCAT(u.apellido,', ',u.nombre) as nombre,d.Descrip as ubicacion, r.descripcion as rol, u.activo
            from ISOP_Usuario u, SADEPO d, ISOP_Rol r
            WHERE u.CodUbic=d.CodUbic and r.id_rol=u.id_rol
            ORDER BY ubicacion,nombre";

        $pendientes = $connection->createCommand($query)->queryAll();
        //$pendientes = $comand->readAll();
        echo Json::encode($pendientes);
    }
}
