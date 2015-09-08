<!--=== Page Header ===-->
<div class="page-header">
    <div class="page-title">
        <h3>Resumen</h3>
        <span>Bienvenido, {{ \Auth::user()->full_name }}!</span>
    </div>
    <!-- Page Stats -->
    <ul class="page-stats">
        <li>
            <div class="summary">
                <span>Nuevas Ordenes</span>
                <h3>0</h3>
            </div>
            <div id="sparkline-bar" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
            <!-- Use instead of sparkline e.g. this:
            <div class="graph circular-chart" data-percent="73">73%</div>
            -->
        </li>
        <li>
            <div class="summary">
                <span>Total en Inventario</span>
                <h3>$ {{ number_format($data['total_inventory_amount'],2) }}</h3>
            </div>
            <div id="sparkline-bar2" class="graph sparkline hidden-xs">20,15,8,50,20,40,20,30,20,15,30,20,25,20</div>
        </li>
    </ul>
    <!-- /Page Stats -->
</div>
<!-- /Page Header -->