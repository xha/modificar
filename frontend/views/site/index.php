<?php

/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

$this->title = 'Resumen de Operaciones del Mes';
?>
<div class="site-index">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $ordenes; ?></h3>

              <p>Ordenes</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder-open-o"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $compras ?></h3>

              <p>Compras</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $presupuestos ?></h3>

              <p>Presupuestos</p>
            </div>
            <div class="icon">
              <i class="fa fa-calculator"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $ventas ?></h3>

              <p>Ventas</p>
            </div>
            <div class="icon">
              <i class="fa fa-cart-arrow-down"></i>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3><?= $devoluciones ?></h3>

              <p>Devoluciones</p>
            </div>
            <div class="icon">
              <i class="fa fa-cart-arrow-down"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="body-content">
        <div style="width: 45%; float: left">
            <?=
                Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => 'Movimientos de Compra Mensual',
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>'
                        ],
                        'labels' => [
                            'items' => [
                                [
                                    'style' => [
                                        'left' => '50px',
                                        'top' => '18px',
                                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                    ],
                                ],
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total consumption',
                                'data' => [
                                    [
                                        'name' => 'Compras',
                                        'y' => $compras+0,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), 
                                    ],
                                    [
                                        'name' => 'Ordenes de C/S',
                                        'y' => $ordenes+0,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), 
                                    ],
                                ],
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                    ]
                ]);
            ?>
        </div>
        <div style="width: 45%; float: right">
            <?=
                Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => 'Movimientos de Venta Mensual',
                        ],
                        'tooltip' => [
                            'pointFormat' => '{series.name}: <b>{point.percentage:.1f}%</b>'
                        ],
                        'labels' => [
                            'items' => [
                                [
                                    'style' => [
                                        'left' => '50px',
                                        'top' => '18px',
                                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                    ],
                                ],
                            ],
                        ],
                        'series' => [
                            [
                                'type' => 'pie',
                                'name' => 'Total de Movimientos',
                                'data' => [
                                    [
                                        'name' => 'Ventas',
                                        'y' => $ventas+0,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), 
                                    ],
                                    [
                                        'name' => 'Presupuestos',
                                        'y' => $presupuestos+0,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[5]'), 
                                    ],
                                    [
                                        'name' => 'Devoluciones',
                                        'y' => $devoluciones+0,
                                        'color' => new JsExpression('Highcharts.getOptions().colors[3]'), 
                                    ],
                                ],
                                'showInLegend' => true,
                                'dataLabels' => [
                                    'enabled' => false,
                                ],
                            ],
                        ],
                    ]
                ]);
            ?>
        </div>
    </div>
</div>
