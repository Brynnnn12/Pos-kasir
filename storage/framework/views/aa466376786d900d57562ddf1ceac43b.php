<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-900">Sale Management</h1>
        <?php if (isset($component)) { $__componentOriginal3b28f631feb44624968320500b31440d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b28f631feb44624968320500b31440d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.primary-button','data' => ['wire:click' => 'create']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'create']); ?>
            Add New Sale
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b28f631feb44624968320500b31440d)): ?>
<?php $attributes = $__attributesOriginal3b28f631feb44624968320500b31440d; ?>
<?php unset($__attributesOriginal3b28f631feb44624968320500b31440d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b28f631feb44624968320500b31440d)): ?>
<?php $component = $__componentOriginal3b28f631feb44624968320500b31440d; ?>
<?php unset($__componentOriginal3b28f631feb44624968320500b31440d); ?>
<?php endif; ?>
    </div>

    <!-- Modal for Create/Edit Sale -->
    <!--[if BLOCK]><![endif]--><?php if($showModal): ?>
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75" wire:click="$set('showModal', false)"></div>
                </div>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                    <?php echo e($editingId ? 'Edit Sale' : 'Create New Sale'); ?>

                                </h3>
                                <form wire:submit.prevent="<?php echo e($editingId ? 'update' : 'store'); ?>" class="space-y-4">
                                    <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['wire:model' => 'total','name' => 'total','label' => 'Total','type' => 'number','step' => '0.01','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'total','name' => 'total','label' => 'Total','type' => 'number','step' => '0.01','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['wire:model' => 'payment_type','name' => 'payment_type','label' => 'Payment Type','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'payment_type','name' => 'payment_type','label' => 'Payment Type','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['wire:model' => 'payment_amount','name' => 'payment_amount','label' => 'Payment Amount','type' => 'number','step' => '0.01','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'payment_amount','name' => 'payment_amount','label' => 'Payment Amount','type' => 'number','step' => '0.01','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.input','data' => ['wire:model' => 'change_amount','name' => 'change_amount','label' => 'Change Amount','type' => 'number','step' => '0.01','required' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('form.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:model' => 'change_amount','name' => 'change_amount','label' => 'Change Amount','type' => 'number','step' => '0.01','required' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $attributes = $__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__attributesOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b)): ?>
<?php $component = $__componentOriginal5c2a97ab476b69c1189ee85d1a95204b; ?>
<?php unset($__componentOriginal5c2a97ab476b69c1189ee85d1a95204b); ?>
<?php endif; ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <?php if (isset($component)) { $__componentOriginal3b28f631feb44624968320500b31440d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3b28f631feb44624968320500b31440d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.primary-button','data' => ['wire:click' => ''.e($editingId ? 'update' : 'store').'','class' => 'ml-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => ''.e($editingId ? 'update' : 'store').'','class' => 'ml-3']); ?>
                            <?php echo e($editingId ? 'Update' : 'Create'); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3b28f631feb44624968320500b31440d)): ?>
<?php $attributes = $__attributesOriginal3b28f631feb44624968320500b31440d; ?>
<?php unset($__attributesOriginal3b28f631feb44624968320500b31440d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3b28f631feb44624968320500b31440d)): ?>
<?php $component = $__componentOriginal3b28f631feb44624968320500b31440d; ?>
<?php unset($__componentOriginal3b28f631feb44624968320500b31440d); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal0b8260326e556cf5e7068339cd048740 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8260326e556cf5e7068339cd048740 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.secondary-button','data' => ['wire:click' => '$set(\'showModal\', false)']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => '$set(\'showModal\', false)']); ?>
                            Cancel
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8260326e556cf5e7068339cd048740)): ?>
<?php $attributes = $__attributesOriginal0b8260326e556cf5e7068339cd048740; ?>
<?php unset($__attributesOriginal0b8260326e556cf5e7068339cd048740); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8260326e556cf5e7068339cd048740)): ?>
<?php $component = $__componentOriginal0b8260326e556cf5e7068339cd048740; ?>
<?php unset($__componentOriginal0b8260326e556cf5e7068339cd048740); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php if (isset($component)) { $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.card','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <!-- Search & Filters -->
        <div class="mb-6 space-y-4">
            <!-- Filter Grid Layout - Adjusted for Better Responsiveness -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="sm:col-span-2 lg:col-span-2">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" wire:model.live.debounce.300ms="search" id="search"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Search sales...">
                </div>

                <!-- Payment Type Filter -->
                <div>
                    <label for="paymentTypeFilter" class="block text-sm font-medium text-gray-700 mb-1">Payment
                        Type</label>
                    <select wire:model.live="paymentTypeFilter" id="paymentTypeFilter"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="">All Types</option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                        <option value="transfer">Transfer</option>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="dateFrom" class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                    <input type="date" wire:model.live="dateFrom" id="dateFrom"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Date To -->
                <div class="sm:col-span-2 lg:col-span-1">
                    <label for="dateTo" class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                    <input type="date" wire:model.live="dateTo" id="dateTo"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>
            </div>

            <!-- Per Page & Clear Filters Row -->
            <div class="flex flex-col sm:flex-row gap-4 justify-between items-start sm:items-center">
                <!-- Per Page -->
                <div class="w-full sm:w-48">
                    <label for="perPage" class="block text-sm font-medium text-gray-700 mb-1">Per Page</label>
                    <select wire:model.live="perPage" id="perPage"
                        class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>

                <!-- Clear Filters Button -->
                <div class="w-full sm:w-auto">
                    <?php if (isset($component)) { $__componentOriginal0b8260326e556cf5e7068339cd048740 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0b8260326e556cf5e7068339cd048740 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.secondary-button','data' => ['wire:click' => 'clearFilters','class' => 'w-full sm:w-auto']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.secondary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'clearFilters','class' => 'w-full sm:w-auto']); ?>
                        Clear Filters
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0b8260326e556cf5e7068339cd048740)): ?>
<?php $attributes = $__attributesOriginal0b8260326e556cf5e7068339cd048740; ?>
<?php unset($__attributesOriginal0b8260326e556cf5e7068339cd048740); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0b8260326e556cf5e7068339cd048740)): ?>
<?php $component = $__componentOriginal0b8260326e556cf5e7068339cd048740; ?>
<?php unset($__componentOriginal0b8260326e556cf5e7068339cd048740); ?>
<?php endif; ?>
                </div>
            </div>
        </div>

        <?php if (isset($component)) { $__componentOriginal793d2b22631f88b8a3d00569a12acf88 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal793d2b22631f88b8a3d00569a12acf88 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.table','data' => ['headers' => ['No', 'User', 'Total', 'Payment Type', 'Payment Amount', 'Change Amount', 'Created At', 'Actions'],'sortableHeaders' => ['', '', 'total', '', 'payment_amount', 'change_amount', 'created_at', ''],'sortBy' => $sortBy,'sortDirection' => $sortDirection]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['No', 'User', 'Total', 'Payment Type', 'Payment Amount', 'Change Amount', 'Created At', 'Actions']),'sortable-headers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['', '', 'total', '', 'payment_amount', 'change_amount', 'created_at', '']),'sort-by' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortBy),'sort-direction' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sortDirection)]); ?>
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo e($sales->firstItem() + $loop->index); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?php echo e($sale->user->name); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        <?php echo e(number_format($sale->total, 0, ',', '.')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                <?php echo e($sale->payment_type === 'cash'
                                    ? 'bg-green-100 text-green-800'
                                    : ($sale->payment_type === 'card'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-purple-100 text-purple-800')); ?>">
                            <?php echo e(ucfirst($sale->payment_type)); ?>

                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        <?php echo e(number_format($sale->payment_amount, 0, ',', '.')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp
                        <?php echo e(number_format($sale->change_amount, 0, ',', '.')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo e($sale->created_at->format('d/m/Y H:i')); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <?php if (isset($component)) { $__componentOriginala8bb031a483a05f647cb99ed3a469847 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala8bb031a483a05f647cb99ed3a469847 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.button','data' => ['wire:click' => 'edit('.e($sale->id).')','class' => 'mr-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'edit('.e($sale->id).')','class' => 'mr-2']); ?>
                            Edit
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $attributes = $__attributesOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__attributesOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala8bb031a483a05f647cb99ed3a469847)): ?>
<?php $component = $__componentOriginala8bb031a483a05f647cb99ed3a469847; ?>
<?php unset($__componentOriginala8bb031a483a05f647cb99ed3a469847); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginal39c56033f8e3e158ea48362b5e2dd94b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal39c56033f8e3e158ea48362b5e2dd94b = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.danger-button','data' => ['wire:click' => 'delete('.e($sale->id).')','wire:confirm' => 'Are you sure you want to delete this sale?']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['wire:click' => 'delete('.e($sale->id).')','wire:confirm' => 'Are you sure you want to delete this sale?']); ?>
                            Delete
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal39c56033f8e3e158ea48362b5e2dd94b)): ?>
<?php $attributes = $__attributesOriginal39c56033f8e3e158ea48362b5e2dd94b; ?>
<?php unset($__attributesOriginal39c56033f8e3e158ea48362b5e2dd94b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39c56033f8e3e158ea48362b5e2dd94b)): ?>
<?php $component = $__componentOriginal39c56033f8e3e158ea48362b5e2dd94b; ?>
<?php unset($__componentOriginal39c56033f8e3e158ea48362b5e2dd94b); ?>
<?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                        No sales found.
                    </td>
                </tr>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal793d2b22631f88b8a3d00569a12acf88)): ?>
<?php $attributes = $__attributesOriginal793d2b22631f88b8a3d00569a12acf88; ?>
<?php unset($__attributesOriginal793d2b22631f88b8a3d00569a12acf88); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal793d2b22631f88b8a3d00569a12acf88)): ?>
<?php $component = $__componentOriginal793d2b22631f88b8a3d00569a12acf88; ?>
<?php unset($__componentOriginal793d2b22631f88b8a3d00569a12acf88); ?>
<?php endif; ?>

        <!-- Pagination -->
        <div class="mt-6">
            <?php echo e($sales->links()); ?>

        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $attributes = $__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__attributesOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93)): ?>
<?php $component = $__componentOriginaldae4cd48acb67888a4631e1ba48f2f93; ?>
<?php unset($__componentOriginaldae4cd48acb67888a4631e1ba48f2f93); ?>
<?php endif; ?>
</div>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/livewire/sale/index.blade.php ENDPATH**/ ?>