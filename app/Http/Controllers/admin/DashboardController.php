<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Producto;
use App\Models\detalle_pedido;

class DashboardController extends Controller
{
    public function index(){
        $facturas = Factura::All();
        $detalles = detalle_pedido::All();

        $productosVendidos = [];
        foreach ($detalles as $detalle) {
            $producto_id = $detalle->producto_id;
            if (!isset($productosVendidos[$producto_id])) {
                $productosVendidos[$producto_id] = [
                    'id' => $producto_id,
                    'nombre' => Producto::findOrFail($producto_id)->nombre,
                    'cantidad' => 0,
                ];
            }
            $productosVendidos[$producto_id]['cantidad'] += $detalle->cantidad;
        }

        usort($productosVendidos, function ($a, $b) {
            return $b['cantidad'] - $a['cantidad'];
        });

        $topProductos = array_slice($productosVendidos, 0, 5);
        $otrosProductosCantidad = array_sum(array_column(array_slice($productosVendidos, 5), 'cantidad'));
        $otrosProductos = [
            [
                'nombre' => 'Otros',
                'cantidad' => $otrosProductosCantidad,
            ]
        ];
                return view('admin.Dashboard.index', compact('facturas','topProductos', 'otrosProductos'));
            }



        }
