<?php

namespace backend\controllers;

use Yii;
use backend\models\Empresa;
use backend\models\EmpresaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use trntv\filekit\actions\UploadAction;
use trntv\filekit\actions\DeleteAction;
use Intervention\Image\ImageManagerStatic;
use backend\models\TrabajadorSearch;
use backend\models\Trabajador;
use backend\models\AreasSearch;
use backend\models\Areas;
use backend\models\DiagnosticoSearch;
use backend\models\Diagnostico;
use backend\models\search\CatCatalogoSearch;
use backend\models\search\CursoSearch;
use backend\models\Curso;
use backend\models\CatCatalogo;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use Codeception\Step\Action;
use backend\models\search\NormaEmpresaSearch;
use backend\models\NormaEmpresa;
use backend\models\search\ResumenRiesgoSearch;
use backend\models\ResumenRiesgo;
/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
     * (non-PHPdoc)
     * @see \yii\base\Controller::actions()
     */
    public function actions()
    {
        return [
            'avatar-upload' => [
                'class' => UploadAction::className(),
                'deleteRoute' => 'avatar-delete',
                'on afterSave' => function ($event) {
                /* @var $file \League\Flysystem\File */
        $file = $event->file;
        $img = ImageManagerStatic::make($file->read());
        $file->put($img->encode());
                }
                ],
                'avatar-delete' => [
                    'class' => DeleteAction::className()
                ]
                ];
    }
    
    
    

    /**
     * Lists all Empresa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresa model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
    
        
        $searchModel= new TrabajadorSearch();
        $dataProvider= $searchModel->searchByCompany(\Yii::$app->request->queryParams,$id);
        
        $searchAreaModel= new AreasSearch();
        $dataAreaProvider= $searchAreaModel->searchByCompany(\Yii::$app->request->queryParams,$id);
       
        $searchResumenModel= new ResumenRiesgoSearch();
        $dataResumenProvider= $searchResumenModel->searchByeCompany(\Yii::$app->request->queryParams,$id);
        
        $searchDiaModel= new DiagnosticoSearch();
        $dataDiaProvider= $searchDiaModel->searchByCompany(\Yii::$app->request->queryParams,$id);
        
        $searchCursoModel = new CursoSearch();
        $dataCursoProvider=$searchCursoModel->searchByCompany(\Yii::$app->request->queryParams,$id);
        
        
       
        return $this->render('dashboard', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'dataAreaProvider'=>$dataAreaProvider,
            'searchAreaModel'=>$searchAreaModel,
            'dataDiaProvider'=>$dataDiaProvider,
            'searchDiaModel'=>$searchDiaModel,
            'dataCursoProvider'=>$dataCursoProvider,
            'searchCursoModel'=>$searchCursoModel,
            'searchResumenModel'=> $searchResumenModel,
            'dataResumenProvider'=>$dataResumenProvider,
            
            
        ]);
    }
    
    
    public function actionAcciones($id){
        
        $searchModel =new NormaEmpresaSearch();
        $dataProvider=$searchModel->searchByCompany(\Yii::$app->request->queryParams,$id);
        
        
        $searchModelCatalogo = new CatCatalogoSearch();
        $dataProviderCatalogo = $searchModelCatalogo->search(Yii::$app->request->queryParams);
        
        
        
        $elements = NormaEmpresa::findAll(['id_empresa'=>$id]);
        $inNorma = [];
        
        foreach ($elements as $element)
            $inNorma[] = $element->id_elemento;
        
        $dataProviderCatalogo->query->andFilterWhere([
            'ORDEN' => 10,
            'CATEGORIA' => 11,
        ]);
            
        
        
        $dataProviderCatalogo->query->andFilterWhere(['NOT IN', 'ID_ELEMENTO', $inNorma]);
              
        
        
        return $this->render('acciones', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'dataProviderCatalogo' => $dataProviderCatalogo,
            'searchModelCatalogo' => $searchModelCatalogo,
           
                   
            
        ]);
    }
    
    
    /**
     * 
     * @param integer $id
     * @param integer $id_empresa
     */
    public function actionAccionesAgregar($id,$id_empresa){
        
        
        $model = new NormaEmpresa();
        $model->id_elemento  = $id;
        $model->id_empresa = $id_empresa;
       
        
        if ($model->save()){
            
            Yii::$app->session->setFlash('alert', [
                'body' => 'Norma agregada correctamente',
                'options' => ['class' => 'alert alert-success']
            ]);
            
        }else{
            Yii::$app->session->setFlash('alert', [
                'body' => 'Norma no agregada correctamente',
                'options' => ['class' => 'alert alert-danger']
            ]);
            
        }
        
        return $this->redirect(['acciones','id' => $id_empresa]);
        
   
    }
    
    
    
    /**
     * Displays a single Empresa model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewWork($id)
    {
        $model = Trabajador::findOne($id);
        
        return $this->redirect(['trabajador/view','id' => $model->id_trabajador 
          
            
            
        ]);
    }
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionTrabajador($id)
    {
        $model = $this->findModel($id);
        $searchModel = new TrabajadorSearch();
        $dataProvider = $searchModel->searchByCompany(yii::$app->request->queryParams,$id);
        
        $model = new Trabajador();
       $model-> id_empresa=$id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->session->setFlash('alert', [
                'body' => 'Trabajador agregado correctamente',
                'options' => ['class' => 'alert alert-success']
            ]);
        } else {
            if ($model->hasErrors()){
                
                Yii::$app->session->setFlash('alert', [
                    'body' => 'Error al agregar al trabajador',
                    'options' => ['class' => 'alert alert-success']
                ]);
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect(['view', 'id' => $model->id_empresa]);
         
    }
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCurso($id)
    {
        $model = $this->findModel($id);
        $searchModel = new CursoSearch();
        $dataProvider = $searchModel->searchByCompany(yii::$app->request->queryParams,$id);
        
        $model = new Curso();
        $model-> id_empresa=$id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->getSession()->setFlash('success', [
                'body'=>'Se ha un nuevo trabajador.',
                'options'=>['class'=>'alert-danger']
            ]);
        } else {
            if ($model->hasErrors()){
                
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>'El producto seleccionado no es valido',
                    'options'=>['class'=>'alert-danger']
                ]);
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect(['view', 'id' => $model->id_empresa]);
        
    }
    /**
     * Creates a new Trabajador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionDiagnostico($id)
    {
        $model = $this->findModel($id);
        $searchModel = new DiagnosticoSearch();
        $dataProvider = $searchModel->searchByCompany(yii::$app->request->queryParams,$id);
        
        $model = new Diagnostico();
        $model-> id_empresa=$id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->getSession()->setFlash('success', [
                'body'=>'Se ha generado nuevo diagnostico.',
                'options'=>['class'=>'alert-success']
            ]);
            
        } else {
            if ($model->hasErrors()){
                
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>'El diagnostico no es valido',
                    'options'=>['class'=>'alert-danger']
                ]);
                
               
            }
        }
        return $this->redirect(['view', 'id' => $model->id_empresa]);
        
    }
    
    /**
     * Creates a new Area model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionArea($id)
    {
        $model = $this->findModel($id);
        $searchModel = new AreasSearch();
        $dataProvider = $searchModel->searchByCompany(yii::$app->request->queryParams,$id);
        
        $model = new Areas();
        $model-> id_empresa=$id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->getSession()->setFlash('success', [
                'body'=>'Se ha un nuevo trabajador.',
                'options'=>['class'=>'alert-danger']
            ]);
        } else {
            if ($model->hasErrors()){
                
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>'El producto seleccionado no es valido',
                    'options'=>['class'=>'alert-danger']
                ]);
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect(['view', 'id' => $model->id_empresa]);
        
    }
   
    /**
     * Creates a new Resumen de riesgo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRiesgo($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ResumenRiesgoSearch();
        $dataProvider = $searchModel->searchByeCompany(yii::$app->request->queryParams,$id);
        
        $model = new ResumenRiesgo();
        $model-> id_empresa=$id;
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            Yii::$app->getSession()->setFlash('success', [
                'body'=>'Se creado correctamente.',
                'options'=>['class'=>'alert-danger']
            ]);
        } else {
            if ($model->hasErrors()){
                
                Yii::$app->getSession()->setFlash('alert', [
                    'body'=>'Error al generar la accion',
                    'options'=>['class'=>'alert-danger']
                ]);
                
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
        return $this->redirect(['view', 'id' => $model->id_empresa]);
        
    }

    /**
     * Creates a new Empresa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_empresa]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Empresa model.
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
    /**
     * Updates an existing TallerImpCuota model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateWork($id)
    {
        
        
        if (($model = Trabajador::findOne($id)) !== null   && $model->load(Yii::$app->request->post()) && $model->save() ) {
            
            Yii::$app->getSession()->setFlash($id, [
                'body'=>'Trabajador actualizado con exito!.',
                'options'=>['class'=>'alert-danger']
            ]);
         
             return $this->redirect(['trabajador/update', 'id_trabajador' => $model->id_trabajador]);
                        
        } else {
            
            
            Yii::$app->getSession()->setFlash($id, [
                'body'=>'Ocurrio un error al actualizar al trabajador.',
                'options'=>['class'=>'alert-danger']
            ]);
            
            return $this->redirect(['trabajador/update', 'id' => $model->id_trabajador]);
        }
        
        
        
        
    }
    
    /**
     * Deletes an existing TallerImp model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteWork($id_trabajador,$id_empresa)
    {
        
        
        if (($model = Trabajador::findOne($id_trabajador)) !== null && $model->id_empresa == $id_empresa) {
            Yii::$app->session->setFlash('alert', [
                'body' => 'Trabajador eliminado correctamente',
                'options' => ['class' => 'alert alert-warning']
            ]);
            $model->delete();
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        return $this->redirect(['view','id'=>$id_empresa]);
    }
    
    
    
    
    
    /**
     * Deletes an existing Empresa model.
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
     * Prints new  instription
     * @param unknown $id
     */
    public function actionImprimirNom030($id){
        
        //	Yii::$app->response->format = 'pdf';
        
        $model = Empresa::findOne($id);
        
        $catCatalogo = NormaEmpresa::findAll(['id_empresa'=>$id]);
        
        
        
        //$modelCatCatalogo = CatCatalogo::findOne($id);
        
        if ($model  === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $content = $this->renderPartial('NOM-030',['model'=>$model, 'catCatalogo'=>$catCatalogo]);
        
        $header  = $this->renderPartial('NOM-030-HEAD',['model'=>$model]);
        $footer  = $this->renderPartial('NOM-030-FOOTER',['model'=>$model]);
        
        $imangen='<tr>
          <td width="70%" colspan="2"> <img src="../img//usuario.jpg" class="img-max"> </td>
        </tr>';
        
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            
            
            // your html content input
            'content' => $content,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '
    							#menu{
								      font:0px;
								    }

                                h1 {color:   #58ACFA  ;}
                           
                                   #est{color.blue}
                               
                                table.test {
                                 border-collapse:collapse;
                                }
                                b1{
                                color: #58ACFA            
                                }
                                .titulo td{
                                    color:   #58ACFA  
                          
                                }
                                .test td{

                                   border: 1px solid #FE9A2E 
                                }

            #customers {
                font-family:  Arial;
                border-collapse: collapse;
                width: 100%;
            }
            
            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }
            
            #customers tr:nth-child(even){background-color: #E0ECF8;}
            
            #customers tr:hover {background-color: #ddd;}
            
            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #A9BCF5;
                color: white;
            }
           .figura{
               width: 400px;
               height: 50px;
               background: #08B;

                border-radius:50%;
                width: 10px;
                height: 10px;
                background: #08B;
            }   
.circulo {
     width: 50px;
     height: 50px;
     -moz-border-radius: 10%;
     -webkit-border-radius: 10%;
     border-radius: 10%;
     background: #5cb85c;
}
           
                                         
                                ',
            // set mPDF properties on the fly
            'options' => ['title' => 'Ficha de inscripción','setAutoTopMargin' => 'pad','setAutoBottomMargin' => 'pad'],
            // call mPDF methods on the fly
            'methods' => [
                'SetHeader'=>$header,
                'SetFooter'=>$footer,
            ]
        ]);
    //    $stylesheet = file_get_contents('/css/estilo.css'); // external css
        
        
        // return the pdf output as per the destination setting
        return $pdf->render([
            'catCatalogo' => $catCatalogo,
         
            
        ]);
        
    }
    
    
    /**
     * Get all peligros
     */
    public function actionGetpeligros() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                //$out = self::getSubCatList($cat_id);
                $catalogo = CatCatalogo::findOne($cat_id);
                $out=ArrayHelper::map($catalogo->catalogos, 'ID_ELEMENTO', 'NOMBRE');
                $items = [];
                $i= 0;
                foreach ($out as $key=>$item){
                    $items[] = ['id'=>$key, 'name'=>$item];
                    $i++;
                }
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                // ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                // ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]
                echo Json::encode(['output'=>$items, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    

    /**
     * Finds the Empresa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
