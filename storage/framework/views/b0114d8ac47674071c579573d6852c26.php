<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'header' => null,
    'footer' => null,
    'padding' => true,
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
    'header' => null,
    'footer' => null,
    'padding' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div <?php echo e($attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200'])); ?>>
    <!--[if BLOCK]><![endif]--><?php if($header): ?>
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <?php echo e($header); ?>

            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="<?php echo e($padding ? 'p-6' : ''); ?>">
        <?php echo e($slot); ?>

    </div>

    <!--[if BLOCK]><![endif]--><?php if($footer): ?>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/ui/card.blade.php ENDPATH**/ ?>