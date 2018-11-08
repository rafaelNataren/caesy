<?php

namespace backend\controllers;

use Yii;
use backend\models\Trabajador;
use backend\models\TrabajadorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

use backend\models\Empresa;
use backend\models\Emprea;
use backend\models\EmpresaSearch;

/**
 * TrabajadorController implements the CRUD actions for Trabajador model.
 */
class TrabajadorController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Trabajador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TrabajadorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trabajador model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trabajador();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_trabajador]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateEmpresa($id_empresa)
    {
        $model = new Trabajador();
        $model->id_empresa = $id_empresa;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_trabajador]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }
   
    /**
     * Updates an existing TallerImpCuota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionTrabajadorIndex($id)
    {
       
        $searchModel = new TrabajadorSearch();
              
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $searchEmpresaModel= new EmpresaSearch();
        $dataEmpresaProvider= $searchEmpresaModel->search(\Yii::$app->request->queryParams,$id);
       
        return $this->render('index', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchEmpresaModel' => $searchModel,
            'dataEmpresaProvider' => $dataProvider,
          
        ]);
      
    }
    
    /**
     * Updates an existing Trabajador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['empresa/view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Prints new  instription
     * @param unknown $id
     */
    public function actionImprimirConstancia($id_trabajador){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Trabajador::findOne($id_trabajador);
        
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('constancia',['model'=>$model]);
        
        
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_LANDSCAPE,
            // stream to browser inline
            //'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}
    							#menu{
								      font:5px;
								    }',
            // set mPDF properties on the fly
            'options' => ['title' => 'Ficha de inscripción'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['NOM-030'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }
    
    /**
     * Deletes an existing Trabajador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trabajador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trabajador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trabajador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
