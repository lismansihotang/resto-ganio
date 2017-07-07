<?php
namespace app\controllers;

use app\models\Penjualan;
use app\models\PenjualanSearch;
use app\models\VPenjualan;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DataPenjualanController extends Controller
{

    /**
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PenjualanSearch();
        $dataProvider = $searchModel->searchWithDate(Yii::$app->request->post());
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return string
     */
    public function actionPettyCash()
    {
        $searchModel = new \app\models\PettyCashSearch();
        $dataProvider = $searchModel->searchWithDate(Yii::$app->request->post());
        return $this->render('petty_cash', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return string
     */
    public function actionPrintPettyCash()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
        }
        $model = (new \yii\db\Query())->select('tgl, nominal, keterangan')->from('petty_cash')->where('tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->all();

        return $this->renderPartial('print_petty_cash', ['model' => $model, 'tgl_awal' => $tglAwal, 'tgl_akhir' => $tglAkhir]);
    }

    /**
     * @return string
     */
    public function actionSummary()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->post()) > 0) {
            $tglAwal = Yii::$app->request->post('tgl_awal');
            $tglAkhir = Yii::$app->request->post('tgl_akhir');
        }
        $model = (new \yii\db\Query())->select('penjualan.tgl, SUM(penjualan.total) AS total_penjualan,(SELECT SUM(kas.nominal) FROM kas WHERE kas.tgl=penjualan.tgl) AS kas, (SELECT SUM(petty_cash.nominal) FROM petty_cash WHERE petty_cash.tgl=penjualan.tgl) AS total_petty_cash, (SELECT SUM(nominal) FROM closing WHERE closing.tgl=penjualan.tgl) AS closing_kas')->from('penjualan')->where('penjualan.tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->groupBy(['tgl'])->all();
        return $this->render('summary', ['model' => $model]);
    }

    /**
     * @return string
     */
    public function actionPrintSummary()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
        }
        $model = (new \yii\db\Query())->select('penjualan.tgl, SUM(penjualan.total) AS total_penjualan,(SELECT SUM(kas.nominal) FROM kas WHERE kas.tgl=penjualan.tgl) AS kas, (SELECT SUM(petty_cash.nominal) FROM petty_cash WHERE petty_cash.tgl=penjualan.tgl) AS total_petty_cash, (SELECT SUM(nominal) FROM closing WHERE closing.tgl=penjualan.tgl) AS closing_kas')->from('penjualan')->where('penjualan.tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->groupBy(['tgl'])->all();
        return $this->renderPartial('print_summary', ['model' => $model, 'tgl_awal' => $tglAwal, 'tgl_akhir' => $tglAkhir]);
    }

    /**
     * @return string
     */
    public function actionStockBahan()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->post()) > 0) {
            $tglAwal = Yii::$app->request->post('tgl_awal');
            $tglAkhir = Yii::$app->request->post('tgl_akhir');
        }
        $strId = '';
        $arrBahan = [];
        $model = (new \yii\db\Query())->select('id')->from('penjualan')->where('tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->all();
        if (count($model) > 0) {
            foreach ($model as $row) {
                if ($strId !== '') {
                    $strId .= ', "' . $row['id'] . '"';
                } else {
                    $strId .= '"' . $row['id'] . '"';
                }

            }
        }
        if ($strId !== '') {
            $modelDetail = (new \yii\db\Query())->select('id_barang, jml')->from('penjualan_detail')->where('id_penjualan IN (' . $strId . ')')->all();
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    $modelBahan = (new \yii\db\Query())->select('resep.id_bahan_baku, resep.qty, satuan_bahan_baku.nm_satuan, bahan_baku.nm_bahan, bahan_baku.harga')->from('resep')
                        ->innerJoin('satuan_bahan_baku', 'satuan_bahan_baku.id=resep.id_satuan')
                        ->innerJoin('bahan_baku', 'resep.id_bahan_baku=bahan_baku.id')
                        ->where(['id_makanan' => $row['id_barang'], 'tipe' => 1])->all();
                    if (count($modelBahan) > 0) {
                        foreach ($modelBahan as $detail) {
                            if (count($arrBahan) > 0) {
                                if (array_key_exists($detail['nm_bahan'], $arrBahan) === true) {
                                    $arrBahan[$detail['nm_bahan']]['jml'] += ((int)$row['jml'] * (int)$detail['qty']);
                                } else {
                                    $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                                }
                            } else {
                                $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                            }

                        }

                    }
                }
            }
        }
        return $this->render('stock_bahan', ['model' => $arrBahan]);
    }

    /**
     * @return string
     */
    public function actionPrintStockBahan()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
        }
        $strId = '';
        $arrBahan = [];
        $model = (new \yii\db\Query())->select('id')->from('penjualan')->where('tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->all();
        if (count($model) > 0) {
            foreach ($model as $row) {
                if ($strId !== '') {
                    $strId .= ', "' . $row['id'] . '"';
                } else {
                    $strId .= '"' . $row['id'] . '"';
                }

            }
        }
        if ($strId !== '') {
            $modelDetail = (new \yii\db\Query())->select('id_barang, jml')->from('penjualan_detail')->where('id_penjualan IN (' . $strId . ')')->all();
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    $modelBahan = (new \yii\db\Query())->select('resep.id_bahan_baku, resep.qty, satuan_bahan_baku.nm_satuan, bahan_baku.nm_bahan, bahan_baku.harga')->from('resep')
                        ->innerJoin('satuan_bahan_baku', 'satuan_bahan_baku.id=resep.id_satuan')
                        ->innerJoin('bahan_baku', 'resep.id_bahan_baku=bahan_baku.id')
                        ->where(['id_makanan' => $row['id_barang'], 'tipe' => 1])->all();
                    if (count($modelBahan) > 0) {
                        foreach ($modelBahan as $detail) {
                            if (count($arrBahan) > 0) {
                                if (array_key_exists($detail['nm_bahan'], $arrBahan) === true) {
                                    $arrBahan[$detail['nm_bahan']]['jml'] += ((int)$row['jml'] * (int)$detail['qty']);
                                } else {
                                    $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                                }
                            } else {
                                $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                            }

                        }

                    }
                }
            }
        }
        return $this->renderPartial('print_stock_bahan', ['model' => $arrBahan, 'tglAwal' => $tglAwal, 'tglAkhir' => $tglAkhir]);
    }

    /**
     * @return string
     */
    public function actionStockTitipan()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->post()) > 0) {
            $tglAwal = Yii::$app->request->post('tgl_awal');
            $tglAkhir = Yii::$app->request->post('tgl_akhir');
        }
        $strId = '';
        $arrBahan = [];
        $model = (new \yii\db\Query())->select('id')->from('penjualan')->where('tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->all();
        if (count($model) > 0) {
            foreach ($model as $row) {
                if ($strId !== '') {
                    $strId .= ', "' . $row['id'] . '"';
                } else {
                    $strId .= '"' . $row['id'] . '"';
                }

            }
        }
        if ($strId !== '') {
            $modelDetail = (new \yii\db\Query())->select('id_barang, jml')->from('penjualan_detail')->where('id_penjualan IN (' . $strId . ')')->all();
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    $modelBahan = (new \yii\db\Query())->select('resep.id_bahan_baku, resep.qty, satuan_bahan_baku.nm_satuan, bahan_baku.nm_bahan, bahan_baku.harga')->from('resep')
                        ->innerJoin('satuan_bahan_baku', 'satuan_bahan_baku.id=resep.id_satuan')
                        ->innerJoin('bahan_baku', 'resep.id_bahan_baku=bahan_baku.id')
                        ->where(['id_makanan' => $row['id_barang'], 'tipe' => 2])->all();
                    if (count($modelBahan) > 0) {
                        foreach ($modelBahan as $detail) {
                            if (count($arrBahan) > 0) {
                                if (array_key_exists($detail['nm_bahan'], $arrBahan) === true) {
                                    $arrBahan[$detail['nm_bahan']]['jml'] += ((int)$row['jml'] * (int)$detail['qty']);
                                } else {
                                    $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                                }
                            } else {
                                $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                            }

                        }

                    }
                }
            }
        }
        return $this->render('stock_titipan', ['model' => $arrBahan]);
    }

    /**
     * @return string
     */
    public function actionPrintStockTitipan()
    {
        $tglAwal = date('Y-m-d');
        $tglAkhir = date('Y-m-d');
        if (count(Yii::$app->request->get()) > 0) {
            $tglAwal = Yii::$app->request->get('tgl_awal');
            $tglAkhir = Yii::$app->request->get('tgl_akhir');
        }
        $strId = '';
        $arrBahan = [];
        $model = (new \yii\db\Query())->select('id')->from('penjualan')->where('tgl BETWEEN  "' . $tglAwal . '" AND "' . $tglAkhir . '" ')->all();
        if (count($model) > 0) {
            foreach ($model as $row) {
                if ($strId !== '') {
                    $strId .= ', "' . $row['id'] . '"';
                } else {
                    $strId .= '"' . $row['id'] . '"';
                }

            }
        }
        if ($strId !== '') {
            $modelDetail = (new \yii\db\Query())->select('id_barang, jml')->from('penjualan_detail')->where('id_penjualan IN (' . $strId . ')')->all();
            if (count($modelDetail) > 0) {
                foreach ($modelDetail as $row) {
                    $modelBahan = (new \yii\db\Query())->select('resep.id_bahan_baku, resep.qty, satuan_bahan_baku.nm_satuan, bahan_baku.nm_bahan, bahan_baku.harga')->from('resep')
                        ->innerJoin('satuan_bahan_baku', 'satuan_bahan_baku.id=resep.id_satuan')
                        ->innerJoin('bahan_baku', 'resep.id_bahan_baku=bahan_baku.id')
                        ->where(['id_makanan' => $row['id_barang'], 'tipe' => 2])->all();
                    if (count($modelBahan) > 0) {
                        foreach ($modelBahan as $detail) {
                            if (count($arrBahan) > 0) {
                                if (array_key_exists($detail['nm_bahan'], $arrBahan) === true) {
                                    $arrBahan[$detail['nm_bahan']]['jml'] += ((int)$row['jml'] * (int)$detail['qty']);
                                } else {
                                    $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                                }
                            } else {
                                $arrBahan[$detail['nm_bahan']] = ['jml' => ((int)$row['jml'] * (int)$detail['qty']), 'harga' => $detail['harga']];
                            }

                        }

                    }
                }
            }
        }
        return $this->renderPartial('print_stock_titipan', ['model' => $arrBahan, 'tglAwal' => $tglAwal, 'tglAkhir' => $tglAkhir]);
    }
}
