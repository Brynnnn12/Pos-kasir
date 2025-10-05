<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'headers' => [],
    'striped' => true,
    'hover' => true,
    'responsive' => true,
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
    'headers' => [],
    'striped' => true,
    'hover' => true,
    'responsive' => true,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="<?php echo e($responsive ? 'overflow-x-auto' : ''); ?>">
    <table <?php echo e($attributes->merge(['class' => 'min-w-full divide-y divide-gray-200'])); ?>>
        <!--[if BLOCK]><![endif]--><?php if(!empty($headers)): ?>
            <thead class="bg-gray-50">
                <tr>
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <?php echo e($header); ?>

                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            </thead>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->


        <tbody class="bg-white divide-y divide-gray-200 <?php echo e($striped ? '' : 'divide-y-0'); ?>">
            <?php echo e($slot); ?>

        </tbody>

        <!--[if BLOCK]><![endif]--><?php if(isset($footer)): ?>
            <tfoot class="bg-gray-50">
                <?php echo e($footer); ?>

            </tfoot>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </table>
</div>

<style>
    <!--[if BLOCK]><![endif]--><?php if($hover): ?>
        tbody tr:hover {
            background-color: #f9fafb;
        }
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!--[if BLOCK]><![endif]--><?php if($striped): ?>
        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</style>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/ui/table.blade.php ENDPATH**/ ?>