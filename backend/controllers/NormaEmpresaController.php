<?php

namespace backend\controllers;

use Yii;
use backend\models\NormaEmpresa;
use backend\models\search\NormaEmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NormaEmpresaController implements the CRUD actions for NormaEmpresa model.
 */
class NormaEmpresaController extends Controller
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
     * Lists all NormaEmpresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NormaEmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NormaEmpresa model.
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
     * Creates a new NormaEmpresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NormaEmpresa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_norma_empresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing NormaEmpresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_norma_empresa]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing NormaEmpresa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$id_empresa)
    {
        
        if (($model = NormaEmpresa::findOne($id)) !== null && $model->id_empresa == $id_empresa) {
            Yii::$app->session->setFlash('alert', [
                'body' => 'Norma eliminada correctamente',
                'options' => ['class' => 'alert alert-warning']
            ]);
            $this->findModel($id)->delete();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
      
        return $this->redirect(['empresa/acciones','id'=>$id_empresa]);
    }

    /**
     * Finds the NormaEmpresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NormaEmpresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    

    
    
    protected function findModel($id)
    {
        if (($model = NormaEmpresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
