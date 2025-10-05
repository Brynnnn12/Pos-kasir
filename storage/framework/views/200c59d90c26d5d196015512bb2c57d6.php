<?php if(session()->has('error')): ?>
    <?php if (isset($component)) { $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet.sweet-alert','data' => ['type' => 'error','title' => 'Error!','text' => ''.e(session('error')).'','showOnLoad' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sweet.sweet-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','title' => 'Error!','text' => ''.e(session('error')).'','show-on-load' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $attributes = $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $component = $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <?php if (isset($component)) { $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet.sweet-alert','data' => ['type' => 'warning','title' => 'Warning!','text' => ''.e(session('warning')).'','showOnLoad' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sweet.sweet-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'warning','title' => 'Warning!','text' => ''.e(session('warning')).'','show-on-load' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $attributes = $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $component = $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php endif; ?>

<?php if(session()->has('info')): ?>
    <?php if (isset($component)) { $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet.sweet-alert','data' => ['type' => 'info','title' => 'Information','text' => ''.e(session('info')).'','showOnLoad' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sweet.sweet-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'info','title' => 'Information','text' => ''.e(session('info')).'','show-on-load' => true,'timer' => '3000','position' => 'top-end','toast' => 'true','width' => '300px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $attributes = $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $component = $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php endif; ?>

<?php if($errors->any()): ?>
    <?php
        $errorList = implode('\n', $errors->all());
    ?>
    <?php if (isset($component)) { $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet.sweet-alert','data' => ['type' => 'error','title' => 'Validation Errors','text' => ''.e($errorList).'','showOnLoad' => true,'timer' => '5000','position' => 'top-end','toast' => 'true','width' => '350px']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('sweet.sweet-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => 'error','title' => 'Validation Errors','text' => ''.e($errorList).'','show-on-load' => true,'timer' => '5000','position' => 'top-end','toast' => 'true','width' => '350px']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $attributes = $__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__attributesOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd)): ?>
<?php $component = $__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd; ?>
<?php unset($__componentOriginal0f585186a433cc6cf67ae0e8f7863bfd); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/ui/flash-messages.blade.php ENDPATH**/ ?>