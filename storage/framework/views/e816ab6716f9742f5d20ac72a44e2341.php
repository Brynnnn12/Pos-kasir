<?php if (isset($component)) { $__componentOriginalcd5f175fe3927c3286d1ef25660f2ada = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcd5f175fe3927c3286d1ef25660f2ada = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout.dashboard','data' => ['title' => 'Dashboard Overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout.dashboard'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Dashboard Overview']); ?>
    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('dashboard.index');

$__html = app('livewire')->mount($__name, $__params, 'lw-1215815559-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcd5f175fe3927c3286d1ef25660f2ada)): ?>
<?php $attributes = $__attributesOriginalcd5f175fe3927c3286d1ef25660f2ada; ?>
<?php unset($__attributesOriginalcd5f175fe3927c3286d1ef25660f2ada); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcd5f175fe3927c3286d1ef25660f2ada)): ?>
<?php $component = $__componentOriginalcd5f175fe3927c3286d1ef25660f2ada; ?>
<?php unset($__componentOriginalcd5f175fe3927c3286d1ef25660f2ada); ?>
<?php endif; ?>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/dashboard/main/index.blade.php ENDPATH**/ ?>