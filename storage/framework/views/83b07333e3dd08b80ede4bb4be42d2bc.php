<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Dashboard'); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Livewire Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

</head>

<body class="bg-gray-100 font-sans" x-data="{
    isSidebarOpen: false,
    activeTab: '<?php echo e($title ?? 'Dashboard'); ?>'
}">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <?php if (isset($component)) { $__componentOriginal060abe2a9b4511e378911474e77b046d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal060abe2a9b4511e378911474e77b046d = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal060abe2a9b4511e378911474e77b046d)): ?>
<?php $attributes = $__attributesOriginal060abe2a9b4511e378911474e77b046d; ?>
<?php unset($__attributesOriginal060abe2a9b4511e378911474e77b046d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal060abe2a9b4511e378911474e77b046d)): ?>
<?php $component = $__componentOriginal060abe2a9b4511e378911474e77b046d; ?>
<?php unset($__componentOriginal060abe2a9b4511e378911474e77b046d); ?>
<?php endif; ?>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <?php if (isset($component)) { $__componentOriginald3b387f4f5efe74d7afe13be62871c47 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald3b387f4f5efe74d7afe13be62871c47 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.header','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald3b387f4f5efe74d7afe13be62871c47)): ?>
<?php $attributes = $__attributesOriginald3b387f4f5efe74d7afe13be62871c47; ?>
<?php unset($__attributesOriginald3b387f4f5efe74d7afe13be62871c47); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald3b387f4f5efe74d7afe13be62871c47)): ?>
<?php $component = $__componentOriginald3b387f4f5efe74d7afe13be62871c47; ?>
<?php unset($__componentOriginald3b387f4f5efe74d7afe13be62871c47); ?>
<?php endif; ?>

            <!-- Mobile Sidebar -->
            <?php if (isset($component)) { $__componentOriginal0497d39e9270d21b59cd69d8c015c0e2 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0497d39e9270d21b59cd69d8c015c0e2 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.dashboard.mobile-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('dashboard.mobile-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0497d39e9270d21b59cd69d8c015c0e2)): ?>
<?php $attributes = $__attributesOriginal0497d39e9270d21b59cd69d8c015c0e2; ?>
<?php unset($__attributesOriginal0497d39e9270d21b59cd69d8c015c0e2); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0497d39e9270d21b59cd69d8c015c0e2)): ?>
<?php $component = $__componentOriginal0497d39e9270d21b59cd69d8c015c0e2; ?>
<?php unset($__componentOriginal0497d39e9270d21b59cd69d8c015c0e2); ?>
<?php endif; ?>



            <!-- Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <?php if (isset($component)) { $__componentOriginal0c42a1fbd293e53d538db84a00a4c6ad = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0c42a1fbd293e53d538db84a00a4c6ad = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.ui.flash-messages','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('ui.flash-messages'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0c42a1fbd293e53d538db84a00a4c6ad)): ?>
<?php $attributes = $__attributesOriginal0c42a1fbd293e53d538db84a00a4c6ad; ?>
<?php unset($__attributesOriginal0c42a1fbd293e53d538db84a00a4c6ad); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0c42a1fbd293e53d538db84a00a4c6ad)): ?>
<?php $component = $__componentOriginal0c42a1fbd293e53d538db84a00a4c6ad; ?>
<?php unset($__componentOriginal0c42a1fbd293e53d538db84a00a4c6ad); ?>
<?php endif; ?>

                <?php echo e($slot); ?>

            </main>
        </div>
    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <?php echo $__env->yieldPushContent('scripts'); ?>

    <!-- Livewire Scripts -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

</body>

</html>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/layout/dashboard.blade.php ENDPATH**/ ?>