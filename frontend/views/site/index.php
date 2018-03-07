<?php

/* @var $this yii\web\View */

$this->title = 'Resumen de Operaciones del Día';
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
        <!-- ./col -->
    </div>

    <div class="body-content">

        
    </div>
</div>
