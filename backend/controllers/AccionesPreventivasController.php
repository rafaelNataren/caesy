<?php

namespace backend\controllers;

use Yii;
use backend\models\AccionesPreventivas;
use backend\models\AccionesPreventivasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Model;
use yii\filters\VerbFilter;
use backend\models\CatCatalogo;
use backend\models\Empresa;

/**
 * AccionesPreventivasController implements the CRUD actions for AccionesPreventivas model.
 */
class AccionesPreventivasController extends Controller
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
     * Lists all AccionesPreventivas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccionesPreventivasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    
    
    /**
     * Lists all AccionesPreventivas models.
     * @return mixed
     */
    public function actionEvaluar($id_empresa)
    {
        
        $searchModel = new AccionesPreventivasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
       
        $catCatalogo = CatCatalogo::findBySql('SELECT * FROM caesy.tbl_cat_catalogo where categoria = 11 and ELEMENTO_PADRE IS NULL;')->all();
        
        $model = new AccionesPreventivas();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acciones_prev]);
        } else {
            
            
            return $this->render('create_all', [
                'catCatalogo' => $catCatalogo,
                'id_empresa' => $id_empresa
                
            ]);
        }
    }
    /**
     * Displays a single AccionesPreventivas model.
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
     * Creates a new AccionesPreventivas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id_empresa,$id)
    {
       
        
        $model = new AccionesPreventivas();
        $searchModel = new AccionesPreventivasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $catCatalogo = CatCatalogo::findBySql('SELECT * FROM caesy.tbl_cat_catalogo where  ID_ELEMENTO = ' . $id)->all();
        
        $modelCatalog = CatCatalogo::findOne($id);
        
        $modelEmpresa = Empresa::findOne($id_empresa);
        
        if (Yii::$app->request->post()) {
            
            $count = count(Yii::$app->request->post('AccionesPreventivas', []));
            $accionesPreventivas = [new AccionesPreventivas()];
            for($i = 1; $i < $count; $i++) {
                $accionesPreventivas[] = new AccionesPreventivas();
            }
            
            
            if (Model::loadMultiple($accionesPreventivas, Yii::$app->request->post()) ) {
                
                
                foreach ($accionesPreventivas as $accion) {
                    
                    
                   if( $accionModel = AccionesPreventivas::findOne($accion->id_acciones_prev)){
                       $accionModel->attributes = $accion->attributes;
                       $accionModel->id_empresa = $id_empresa;
                       $accionModel->elemento_padre = $modelCatalog->ID_ELEMENTO;
                       
                       $accionModel->save();
                       
                   }else{
                       
                    
                    $accion->id_empresa = $id_empresa;
                    $accion->elemento_padre = $modelCatalog->ID_ELEMENTO;
                    
                    $accion->save();
                    
                   }
                    
                    $x = 2;
                }
            }
            
            
            return $this->redirect(['empresa/acciones','id'=>$id_empresa]);
        } else {
            
            
            return $this->render('create', [
                'catCatalogo' => $catCatalogo,
                'id_empresa' => $id_empresa,
                'modelEmpresa'=>$modelEmpresa
         
            ]);
        }
    }

    /**
     * Updates an existing AccionesPreventivas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_acciones_prev]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AccionesPreventivas model.
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
     * Finds the AccionesPreventivas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AccionesPreventivas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AccionesPreventivas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
