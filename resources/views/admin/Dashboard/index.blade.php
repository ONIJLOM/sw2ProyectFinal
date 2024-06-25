@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between mb-4">
                        <div>
                            <label for="fecha-inicial" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Inicial:</label>
                            <input type="date" id="fecha-inicial" name="fecha-inicial" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div>
                            <label for="fecha-final" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Fecha Final:</label>
                            <input type="date" id="fecha-final" name="fecha-final" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100">
                        </div>
                        <div>
                            <button id="btn-generar-grafico" class="mt-8 px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                Generar Gráfico
                            </button>
                        </div>
                    </div>

                    <div style="height: 300px;">
                        <canvas id="grafico-barras"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="w-3/5">
                <div class="bg-white dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div style="width: 60%;">
                            <canvas id="top-productos-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-3/5 ml-4">
                <div class="bg-white dark:bg-gray-100 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-2">Productos Vendidos</h3>
                        <ul>
                            @php
                                $colores = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40'];
                                $colorIndex = 0;
                            @endphp
                            @foreach($topProductos as $producto)
                                <li class="flex items-center mb-2">
                                    <div class="w-4 h-4 mr-2 rounded-full"
                                        style="background-color: {{ $colores[$colorIndex] }};"></div>
                                    <span>{{ $producto['nombre'] }}:</span>
                                    <span class="ml-2">{{ $producto['cantidad'] }}</span>
                                </li>
                                @php $colorIndex = ($colorIndex + 1) % count($colores); @endphp
                            @endforeach

                            <li class="flex items-center mb-2">
                                <div class="w-4 h-4 mr-2 rounded-full"
                                    style="background-color: rgba(0, 0, 0, 0.1);"></div>
                                <span>Otros:</span>
                                <span class="ml-2">{{ $otrosProductos[0]['cantidad'] }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnGenerarGrafico = document.getElementById('btn-generar-grafico');
            btnGenerarGrafico.addEventListener('click', function() {
                generarGrafico();
            });

            function generarGrafico() {
                const fechaInicial = document.getElementById('fecha-inicial').value;
                const fechaFinal = document.getElementById('fecha-final').value;

                const facturas = @json($facturas);
                const facturasFiltradas = facturas.filter(factura => {
                    const fechaFactura = new Date(factura.created_at).toISOString().split('T')[0];
                    return fechaFactura >= fechaInicial && fechaFactura <= fechaFinal;
                });

                const datos = facturasFiltradas.map(factura => ({
                    fecha: new Date(factura.created_at).toLocaleDateString(),
                    pago_total: factura.pago_total
                }));

                dibujarGrafico(datos);
            }

            function dibujarGrafico(datos) {
                const ctx = document.getElementById('grafico-barras').getContext('2d');
                if (window.graficoBarras) {
                    window.graficoBarras.destroy();
                }
                window.graficoBarras = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: datos.map(factura => factura.fecha),
                        datasets: [{
                            label: 'Pago Total',
                            data: datos.map(factura => factura.pago_total),
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const topProductos = @json($topProductos);
            const otrosProductos = @json($otrosProductos);

            const topProductosLabels = topProductos.map(producto => producto.nombre);
            const topProductosData = topProductos.map(producto => producto.cantidad);

            topProductosLabels.push('Otros');
            topProductosData.push(otrosProductos[0].cantidad);

            const ctxTop = document.getElementById('top-productos-chart').getContext('2d');
            new Chart(ctxTop, {
                type: 'pie',
                data: {
                    labels: topProductosLabels,
                    datasets: [{
                        label: 'Top 5 Productos + Otros',
                        data: topProductosData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Top 5 Productos + Otros'
                        }
                    }
                }
            });
        });
    </script>
@stop
