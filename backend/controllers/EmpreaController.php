<?php

namespace backend\controllers;

use Yii;
use backend\models\Emprea;
use backend\models\EmpreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;

/**
 * EmpreaController implements the CRUD actions for Emprea model.
 */
class EmpreaController extends Controller
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
     * Lists all Emprea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emprea model.
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
     * Creates a new Emprea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emprea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Emprea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    // aqui se crea el controlador para pdf
    
    public function actionGenPdf($id)
    {
        $pdf_content= $this->renderPartial('view-pdf', [
            'model' => $this->findModel($id),
            
        ]);
        $mpdf = new \mPDF();
        $mpdf -> Writehtml($pdf_content);
        $mpdf->Output();
        exit;
    }
    
    /**
     * Prints new  instription
     * @param unknown $id
     */
    public function actionImprimirComprobante($id){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Emprea::findOne($id);
        
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('ficha-alumno',['model'=>$model]);
        
        
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
            'options' => ['title' => 'Formato 12'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>['Norma 12'],
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
        
    }
    
    /**
     * Deletes an existing Emprea model.
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
     * Finds the Emprea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emprea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emprea::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
