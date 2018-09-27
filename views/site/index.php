<?php
use yii\helpers\Html;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use yii\grid\GridView;
?>
<div>
        <div>
        
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

        <div>

            <div class="col-md-8">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'summary' => false,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'Tenant',
                        'Jumlah',

                        // ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </div>

            <div class="col-md-4">
                <?= ChartJs::widget([
                    'type' => 'doughnut',
                    'options' => [
                        'height' => 100,
                        'width' => 100
                    ],
                    'data' => [
                        // 'labels' => ["Smart City", "Software Engineering", "Human Resource & GA", "Mahapatih", "Solution", "Advertising Agency"],
                        'datasets' => [
                            [
                                'label' => "Data Kunjungan",
                                'backgroundColor' => 
                                [
                                    '#d35400',
                                    '#f39c12',
                                    '#2ecc71',
                                    '#16a085',
                                    '#3498db',
                                    '#e74c3c'
                                ],
                                'borderWidth' => 0,
                                // 'borderColor' => [
                                //     'rgba(255,99,132,1)',
                                //     'rgba(54, 162, 235, 1)',
                                //     'rgba(255, 206, 86, 1)',
                                //     'rgba(75, 192, 192, 1)',
                                //     'rgba(153, 102, 255, 1)',
                                //     'rgba(255, 159, 64, 1)'
                                // ],
                                'pointBackgroundColor' => "rgba(179,181,198,1)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                'data' => [$a, $b, $c, $d, $e, $f]
                            ],
                        ]
                    ]
                ]);
                ?>

            </div>
            
        </div>
</div>