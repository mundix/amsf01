<div class="row row-bg"> <!-- .row-bg -->
    <div class="col-sm-6 col-md-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual cyan">
                    <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                </div>
                <div class="title">Ventas Realizadas Hoy</div>
                <div class="value">{{ $data['total_today_sales'] }}</div>
                <a class="more" href="javascript:void(0);">Ver m&aacute;s <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
    <div class="col-sm-6 col-md-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual green">
                    <i class="icon-dollar"></i>
                </div>
                <div class="title">Monto de Venta Hoy</div>
                <div class="value">${{ number_format($data['total_today_amount_sales'],2)}}</div>
                <a class="more" href="javascript:void(0);">Ver m&aacute;s <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
    <div class="col-sm-6 col-md-3 hidden-xs">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual yellow">
                    <i class="icon-dollar"></i>
                </div>
                <div class="title">Compras Realizadas Hoy</div>
                <div class="value">{{ $data['total_today_buy'] }}</div>
                <a class="more" href="javascript:void(0);">Ver m&aacute;s <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
    <div class="col-sm-6 col-md-3 hidden-xs">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual red">
                    <i class="icon-user"></i>
                </div>
                <div class="title">Monto Compras Hoy</div>
                <div class="value">${{ number_format($data['total_today_amount_buy'],2)}}</div>
                <a class="more" href="javascript:void(0);">Ver m&aacute;s <i class="pull-right icon-angle-right"></i></a>
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
</div> <!-- /.row -->