<?php
use yii\helpers\Html;
use yii\helpers\Url;

use dosamigos\chartjs\ChartJs;

?>

<div class="container">
        <div class="row">
        
            <div class="col-lg-4 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-building"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tenant</span>
                        <span class="info-box-number"><?= $tenant ?></span>
                        <span>
                            <?php echo Html::a('Selengkapnya ...', 
                                ['dcldestination/index']
                            ) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Pengguna</span>
                        <span class="info-box-number"><?= $user ?></span>
                        <span>
                            <?php echo Html::a('Selengkapnya ...', 
                                ['userapp/index']
                            ) ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-calendar"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Kunjungan</span>
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

        <div class="row">
            <div class="col-lg-6 col-md-12">

<?= ChartJs::widget([
    'type' => 'bar',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["docotel", "grapari", "arsip", "mercure", "gmp", "rswaras"],
        'datasets' => [
            [
                'label' => "Data Kunjungan",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [$docotel, $grapari, $arsip, $mercure, $gmp, $rswaras]
            ],
        ]
    ]
]);
?>

            </div>
            
        </div>
</div>