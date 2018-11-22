<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use yii\grid\GridView;

$this->title = 'Dashboard';
?>
<div>
        <div>
        
            <div class="col-lg-4 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Host</span>
                        <span class="info-box-number"><?= $karyawan ?></span>
                        <span>
                            <?php echo Html::a('Selengkapnya ...', 
                                ['/karyawan']
                            ) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Janji Bertemu</span>
                        <span class="info-box-number"><?= $visited ?></span>
                        <span>
                            <?php echo Html::a('Selengkapnya ...', 
                                ['visited/index']
                            ) ?>
                        </span>
                    </div>
                </div>
            </div>

        </div>


</div>