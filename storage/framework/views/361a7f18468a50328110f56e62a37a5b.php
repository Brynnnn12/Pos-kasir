<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'headers' => [],
    'sortableHeaders' => [],
    'sortBy' => null,
    'sortDirection' => 'asc',
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
    'sortableHeaders' => [],
    'sortBy' => null,
    'sortDirection' => 'asc',
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
                    <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $headers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $header): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <!--[if BLOCK]><![endif]--><?php if(isset($sortableHeaders[$index]) && $sortableHeaders[$index]): ?>
                                <button wire:click="sortBy('<?php echo e($sortableHeaders[$index]); ?>')"
                                    class="flex items-center hover:text-gray-700">
                                    <?php echo e($header); ?>

                                    <!--[if BLOCK]><![endif]--><?php if($sortBy === $sortableHeaders[$index]): ?>
                                        <svg class="ml-1 w-4 h-4 <?php echo e($sortDirection === 'asc' ? 'rotate-180' : ''); ?>"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </button>
                            <?php else: ?>
                                <?php echo e($header); ?>

                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </th>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                </tr>
            </thead>
        <?php elseif(isset($header)): ?>
            <thead class="bg-gray-50">
                <?php echo e($header); ?>

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