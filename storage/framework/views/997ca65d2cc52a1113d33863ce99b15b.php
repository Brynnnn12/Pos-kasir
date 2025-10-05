<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'type' => 'text',
    'name',
    'label' => null,
    'icon' => null,
    'error' => null,
    'help' => null,
    'required' => false,
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
    'type' => 'text',
    'name',
    'label' => null,
    'icon' => null,
    'error' => null,
    'help' => null,
    'required' => false,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $hasError = $error || $errors->has($name);
    $errorMessage = $error ?: $errors->first($name);
?>

<div class="mb-4">
    <!--[if BLOCK]><![endif]--><?php if($label): ?>
        <label for="<?php echo e($name); ?>" class="block text-sm font-medium text-gray-700 mb-2">
            <!--[if BLOCK]><![endif]--><?php if($icon): ?>
                <i class="<?php echo e($icon); ?> mr-1.5 text-gray-400 text-xs"></i>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <?php echo e($label); ?>

            <!--[if BLOCK]><![endif]--><?php if($required): ?>
                <span class="text-red-500">*</span>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </label>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <div class="relative">
        <!--[if BLOCK]><![endif]--><?php if($icon && !$label): ?>
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="<?php echo e($icon); ?> text-gray-400 text-sm"></i>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($type === 'textarea'): ?>
            <textarea name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                <?php echo e($attributes->merge([
                    'class' =>
                        'block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors' .
                        ($hasError ? ' border-red-500 focus:border-red-500 focus:ring-red-500' : '') .
                        ($icon && !$label ? ' pl-10' : ''),
                ])); ?>><?php echo e(old($name)); ?></textarea>
        <?php elseif($type === 'select'): ?>
            <select name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                <?php echo e($attributes->merge([
                    'class' =>
                        'block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors' .
                        ($hasError ? ' border-red-500 focus:border-red-500 focus:ring-red-500' : '') .
                        ($icon && !$label ? ' pl-10' : ''),
                ])); ?>>
                <?php echo e($slot); ?>

            </select>
        <?php else: ?>
            <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>"
                value="<?php echo e(old($name)); ?>"
                <?php echo e($attributes->merge([
                    'class' =>
                        'block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm transition-colors' .
                        ($hasError ? ' border-red-500 focus:border-red-500 focus:ring-red-500' : '') .
                        ($icon && !$label ? ' pl-10' : ''),
                ])); ?> />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!--[if BLOCK]><![endif]--><?php if($hasError): ?>
        <p class="mt-1 text-xs text-red-600 flex items-center">
            <i class="fas fa-exclamation-circle mr-1"></i><?php echo e($errorMessage); ?>

        </p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($help && !$hasError): ?>
        <p class="mt-1 text-xs text-gray-500"><?php echo e($help); ?></p>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</div>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/form/input.blade.php ENDPATH**/ ?>