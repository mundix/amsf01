<?php
use Billing\Entities\NcfType;

class NCFTypesTableSeeder extends Seeder {

	public function run()
    {
        NcfType::create([
            'name'  => 'Facturas que generan Crédito y Sustentan Costos y/o Gastos',
            'code'  =>1,
        ]);
        NcfType::create([
            'name'  => 'Facturas para Consumidores Finales',
            'code'  =>2,
        ]);
        NcfType::create([
            'name'  => 'Nota de Débito',
            'code'  =>3,
        ]);
        NcfType::create([
            'name'  => 'Nota de Crédito',
            'code'  =>4,
        ]);
        NcfType::create([
            'name'  => 'Proveedores Informales',
            'code'  =>11,
        ]);
        NcfType::create([
            'name'  => 'Registro Único de Ingresos',
            'code'  =>12,
        ]);
        NcfType::create([
            'name'  => 'Gastos Menores',
            'code'  =>13,
        ]);
        NcfType::create([
            'name'  => 'Regímenes Especiales de Tributación',
            'code'  =>14,
        ]);
        NcfType::create([
            'name'  => 'Comprobantes Gubernamentales',
            'code'  =>15,
        ]);
	}

}