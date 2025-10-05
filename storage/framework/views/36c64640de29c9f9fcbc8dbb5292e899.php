<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left',
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'loading' => false,
    'icon' => null,
    'iconPosition' => 'left',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 text-white border-transparent',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 focus:ring-gray-500 text-white border-transparent',
        'success' => 'bg-green-600 hover:bg-green-700 focus:ring-green-500 text-white border-transparent',
        'danger' => 'bg-red-600 hover:bg-red-700 focus:ring-red-500 text-white border-transparent',
        'warning' => 'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-500 text-white border-transparent',
        'info' => 'bg-cyan-600 hover:bg-cyan-700 focus:ring-cyan-500 text-white border-transparent',
        'light' => 'bg-gray-100 hover:bg-gray-200 focus:ring-gray-500 text-gray-900 border-gray-300',
        'outline' => 'bg-transparent hover:bg-gray-50 focus:ring-gray-500 text-gray-700 border-gray-300',
        'ghost' => 'bg-transparent hover:bg-gray-100 focus:ring-gray-500 text-gray-700 border-transparent',
    ];

    $sizes = [
        'xs' => 'px-2.5 py-1.5 text-xs',
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2 text-sm',
        'lg' => 'px-4 py-2 text-base',
        'xl' => 'px-6 py-3 text-base',
    ];

    $variantClass = $variants[$variant] ?? $variants['primary'];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
?>

<button type="<?php echo e($type); ?>"
    <?php echo e($attributes->merge([
        'class' => "inline-flex items-center justify-center border font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed transition-all duration-200 transform hover:scale-105 active:scale-95 {$variantClass} {$sizeClass}",
    ])); ?>

    <?php if($loading): ?> disabled <?php endif; ?>>
    <!--[if BLOCK]><![endif]--><?php if($loading): ?>
        <i class="fas fa-spinner fa-spin <?php echo e($slot->isEmpty() ? '' : 'mr-2'); ?> text-sm"></i>
    <?php elseif($icon && $iconPosition === 'left'): ?>
        <i class="<?php echo e($icon); ?> <?php echo e($slot->isEmpty() ? '' : 'mr-2'); ?> text-sm"></i>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <?php echo e($slot); ?>


    <!--[if BLOCK]><![endif]--><?php if($icon && $iconPosition === 'right' && !$loading): ?>
        <i class="<?php echo e($icon); ?> <?php echo e($slot->isEmpty() ? '' : 'ml-2'); ?> text-sm"></i>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</button>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/ui/button.blade.php ENDPATH**/ ?>