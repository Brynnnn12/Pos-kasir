<div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Card 1 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 mr-4">
                <i class="fas fa-wallet text-xl"></i>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Total Pendapatan Hari Ini</h3>
                <p class="text-2xl font-semibold text-gray-800">Rp <?php echo e(number_format($todayRevenue, 0, ',', '.')); ?></p>
                <p class="text-xs text-blue-500">
                    Bulan ini: Rp <?php echo e(number_format($monthRevenue, 0, ',', '.')); ?>

                </p>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center text-green-600 mr-4">
                <i class="fas fa-shopping-cart text-xl"></i>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Total Pesanan Hari Ini</h3>
                <p class="text-2xl font-semibold text-gray-800"><?php echo e($todayOrders); ?></p>
                <p class="text-xs text-green-500">
                    Bulan ini: <?php echo e($monthOrders); ?>

                </p>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center text-purple-600 mr-4">
                <i class="fas fa-user text-xl"></i>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Pelanggan Hari Ini</h3>
                <p class="text-2xl font-semibold text-gray-800"><?php echo e($todayCustomers); ?></p>
                <p class="text-xs text-gray-500">
                    Unique customers
                </p>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex items-center">
            <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center text-yellow-600 mr-4">
                <i class="fas fa-box text-xl"></i>
            </div>
            <div>
                <h3 class="text-sm font-medium text-gray-500">Produk Terjual</h3>
                <p class="text-2xl font-semibold text-gray-800"><?php echo e($todayProductsSold); ?></p>
                <p class="text-xs text-yellow-500">
                    Unit terjual hari ini
                </p>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Pendapatan Bulanan</h3>
            <canvas id="revenueChart" height="300"></canvas>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Distribusi Kategori</h3>
            <canvas id="categoryChart" height="300"></canvas>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Transaksi Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th
                            class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Kasir</th>
                        <th
                            class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total</th>
                        <th
                            class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Pembayaran</th>
                        <th
                            class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Waktu</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $recentSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="px-4 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <div
                                            class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-semibold">
                                            <?php echo e(substr($sale->user->name, 0, 1)); ?>

                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900"><?php echo e($sale->user->name); ?></div>
                                        <div class="text-sm text-gray-500"><?php echo e($sale->payment_type); ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                Rp <?php echo e(number_format($sale->total, 0, ',', '.')); ?>

                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp <?php echo e(number_format($sale->payment_amount, 0, ',', '.')); ?>

                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500">
                                <?php echo e($sale->created_at->diffForHumans()); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const monthlyLabels = [];
        const monthlyData = <?php echo json_encode($monthlyRevenueData, 15, 512) ?>;

        // Generate labels for last 12 months
        for (let i = 11; i >= 0; i--) {
            const date = new Date();
            date.setMonth(date.getMonth() - i);
            monthlyLabels.push(date.toLocaleDateString('id-ID', {
                month: 'short',
                year: 'numeric'
            }));
        }

        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Pendapatan (Rupiah)',
                    data: monthlyData,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });

        // Category Chart
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        const categoryLabels = <?php echo json_encode($categoryData->pluck('name'), 15, 512) ?>;
        const categoryValues = <?php echo json_encode($categoryData->pluck('total'), 15, 512) ?>;

        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryValues,
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#9ca3af', '#ef4444']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': Rp ' + context.parsed.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/livewire/dashboard/index.blade.php ENDPATH**/ ?>