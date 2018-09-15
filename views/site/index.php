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
                        <span class="info-box-number"><?= $visitor ?></span>
                        <span>
                            <?php echo Html::a('Selengkapnya ...', 
                                ['visit']
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
                        'height' => 100,
                        'width' => 100
                    ],
                    'data' => [
                        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                        'datasets' => [
                            // [
                            //     'label' => "My First dataset",
                            //     'backgroundColor' => "rgba(179,181,198,0.2)",
                            //     'borderColor' => "rgba(179,181,198,1)",
                            //     'pointBackgroundColor' => "rgba(179,181,198,1)",
                            //     'pointBorderColor' => "#fff",
                            //     'pointHoverBackgroundColor' => "#fff",
                            //     'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            //     'data' => [65, 59, 90, 81, 56, 55, 40]
                            // ],
                            [
                                'label' => "Data Kunjungan",
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
            <div class="col-lg-6 col-md-12">
                <?= ChartJs::widget([
                    'type' => 'line',
                    'options' => [
                        'height' => 100,
                        'width' => 100
                    ],
                    'data' => [
                        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
                        'datasets' => [
                            [
                                'label' => "Data Kunjungan",
                                'backgroundColor' => "rgba(255,99,132,0.2)",
                                'borderColor' => "rgba(255,99,132,1)",
                                'pointBackgroundColor' => "rgba(255,99,132,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                                'data' => [28, 48, 40, 19, 96, 27, 100]
                            ]
                        ]
                    ]
                ]);
                ?>
            </div>
        </div>
</div>