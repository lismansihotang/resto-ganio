<?php
namespace app\controllers;

use app\models\Barang;
use app\models\BarangDetail;
use Yii;
use app\models\Penjualan;
use app\models\PenjualanSearch;
use app\models\PenjualanDetail;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;

/**
 * PenjualanController implements the CRUD actions for Penjualan model.
 */
class PenjualanController extends Controller
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
                    'delete' => ['POST', 'GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Penjualan models.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        #var_dump(Yii::$app->request->queryParams);
        #Yii::$app->request->setParams(['1' => date('Y-m-d')]);
        $searchModel = new PenjualanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render(
            'index',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * Displays a single Penjualan model.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $modelDetail = [];
        if (count($model) > 0) {
            $modelDetail = (new \yii\db\Query())->select('penjualan_detail.jml AS jml, penjualan_detail.harga AS harga, penjualan_detail.subtotal AS subtotal, barang.nm_barang AS nm_barang')->from('penjualan_detail')->innerJoin('barang', 'penjualan_detail.id_barang=barang.id')->where(['penjualan_detail.id_penjualan' => $id])->all();
        }
        return $this->render(
            'view',
            [
                'model' => $model,
                'modelDetail' => $modelDetail,
            ]
        );
    }

    /**
     * Creates a new Penjualan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penjualan();
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->identity->id;
            $model->save();
            //echo $model->id;
            //echo Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/create', 'id-jual' => $model->id]);

            //$model->save();
            //return $this->redirect(['view', 'id' => $model->id]);
            //return $this->redirect(['penjualan-detail/create', 'id-jual' => $model->id]);
            return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['penjualan-detail/create', 'id-jual' => $model->id]));
        } else {
            return $this->render(
                'create',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdatePemesan($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['penjualan-detail/create', 'id-jual' => $model->id]);
        } else {
            return $this->render(
                '_form_pemesan',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * Updates an existing Penjualan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render(
                'update',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * @param $id
     *
     * @return string|\yii\web\Response
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionPayment($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['print', 'id' => $model->id]);
        } else {
            if (Yii::$app->request->isAjax) {
                return $this->renderAjax(
                    'payment',
                    [
                        'model' => $model,
                    ]
                );
            } else {
                return $this->render(
                    'payment',
                    [
                        'model' => $model,
                    ]
                );
            }
        }
    }

    /**
     * Deletes an existing Penjualan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Penjualan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Penjualan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Penjualan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param $id
     */
    public function actionPrintNota($id)
    {
        $model = $this->findModel($id);
        $modelDetail = new PenjualanDetail();
        $recordDetail = $modelDetail->findAll(['id_penjualan' => $id]);
        $modelBarang = ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang');
        return $this->renderPartial(
            '_nota',
            [
                'model' => $model,
                'modelDetail' => $recordDetail,
                'modelBarang' => $modelBarang
            ]
        );
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPrintNotaPaket($id)
    {
        $model = $this->findModel($id);
        $modelDetail = new PenjualanDetail();
        $recordDetail = $modelDetail->findAll(['id_penjualan' => $id]);
        $modelBarang = ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang');
        $modelBarangDesc = ArrayHelper::map(Barang::find()->all(), 'id', 'ket_barang');
        return $this->renderPartial(
            '_nota_paket',
            [
                'model' => $model,
                'modelDetail' => $recordDetail,
                'modelBarang' => $modelBarang,
                'modelBarangDesc' => $modelBarangDesc
            ]
        );
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPrint($id)
    {
        $model = $this->findModel($id);
        $modelDetail = new PenjualanDetail();
        $recordDetail = $modelDetail->findAll(['id_penjualan' => $id]);
        $modelBarang = ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang');
        return $this->renderPartial(
            '_kwitansi',
            [
                'model' => $model,
                'modelDetail' => $recordDetail,
                'modelBarang' => $modelBarang
            ]
        );
        /*$content = $this->renderPartial(
            '_kwitansi',
            [
                'model'        => $model,
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider
            ]
        );
        $string = 'http://localhost/shop-local/vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css';
        $cssFile = file_get_contents($string);
        $pdf = new Pdf();
        $mpdf = $pdf->api;
        $mpdf->SetHeader('Kwitansi');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->SetJS('this.print();');
        $mpdf->WriteHtml($cssFile, 1);
        $mpdf->WriteHtml($content, 2);
        $mpdf->Output();*/
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPrintTemp($id)
    {
        $model = $this->findModel($id);
        $modelDetail = new PenjualanDetail();
        $recordDetail = $modelDetail->findAll(['id_penjualan' => $id]);
        $modelBarang = ArrayHelper::map(Barang::find()->all(), 'id', 'nm_barang');
        return $this->renderPartial(
            '_kwitansi_temp',
            [
                'model' => $model,
                'modelDetail' => $recordDetail,
                'modelBarang' => $modelBarang
            ]
        );
    }

    /**
     * @return string
     */
    public function actionStock()
    {
        $model = new Barang();
        return $this->render(
            'view_stock',
            [
                'model' => $model
            ]
        );
    }

    /**
     * @return json
     */
    public function actionCheckStock()
    {
        $data = ['stock' => '0', 'harga' => '0'];
        if (Yii::$app->request->isAjax === true) {
            $modelBarangDetail = new BarangDetail();
            $recordBarangDetail = $modelBarangDetail->findOne(['barcode' => Yii::$app->request->post(('id'))]);
            if ($recordBarangDetail !== null) {
                $modelBarang = new Barang();
                $recordBarang = $modelBarang->findOne(['id' => $recordBarangDetail['id_barang']]);
                if ($recordBarang !== null) {
                    $data = ['stock' => $recordBarang['stock'], 'harga' => $recordBarang['harga_jual']];
                }
            }
        }
        echo Json::encode($data);
    }

    /**
     * @return string
     */
    public function actionIndexRevisiPembayaran()
    {
        $searchModel = new PenjualanSearch();
        $dataProvider = $searchModel->searchRevisiPembayaran(Yii::$app->request->queryParams);
        return $this->render(
            'index_revisi_pembayaran',
            [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]
        );
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionRevisiPembayaran($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view-revisi-pembayaran', 'id' => $model->id]);
        } else {
            return $this->render(
                'revisi_pembayaran',
                [
                    'model' => $model,
                ]
            );
        }
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionViewRevisiPembayaran($id)
    {
        return $this->render(
            'view_revisi',
            [
                'model' => $this->findModel($id),
            ]
        );
    }
}
