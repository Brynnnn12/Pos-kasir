

<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['active' => '', 'type' => 'landing']));

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

foreach (array_filter((['active' => '', 'type' => 'landing']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?> <?php
    // Definisikan menu berdasarkan tipe dan status otentikasi
    $menuItems = match ($type) {
        'landing' => [
            'guest' => [
                ['href' => '#home', 'label' => 'Home', 'active' => $active === 'home'],
                ['href' => '#features', 'label' => 'Fitur', 'active' => $active === 'features'],
                ['href' => '#demo', 'label' => 'Demo', 'active' => $active === 'demo'],
            ],
            'auth' => [
                ['href' => route('home'), 'label' => 'POS'],
                ['href' => route('transactions.index'), 'label' => 'Transactions'],
                ['href' => route('dashboard'), 'label' => 'Dashboard'],
            ],
        ],
        'pos' => [
            // Menu untuk 'pos' hanya untuk user yang terotentikasi
            'auth' => [['href' => route('dashboard'), 'label' => 'Dashboard']],
        ],
        default => [],
    };
?>

<nav x-data="{ isOpen: false, isScrolled: false }" @scroll.window="isScrolled = (window.pageYOffset > 50)"
    class="bg-white shadow-sm transition-all duration-300" :class="{ 'navbar-sticky': isScrolled }">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="<?php echo e(route('landing')); ?>" wire:navigate class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cash-register text-white text-xl"></i>
                </div>
                <span class="text-xl font-bold text-gray-900">POS Minimarket</span>
            </a>

            <div class="hidden md:flex items-center space-x-6">
                <?php if($type === 'landing'): ?>
                    <?php if(auth()->guard()->guest()): ?>
                        <?php $__currentLoopData = $menuItems['guest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($item['href']); ?>"
                                class="nav-link <?php echo e($item['active'] ? 'text-green-600 font-semibold' : 'text-gray-700 hover:text-green-600'); ?>">
                                <?php echo e($item['label']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e(route('login')); ?>"
                            class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-all duration-200 font-medium">
                            Login
                        </a>
                    <?php endif; ?>

                    <?php if(auth()->guard()->check()): ?>
                        <?php $__currentLoopData = $menuItems['auth']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($item['href']); ?>" wire:navigate class="nav-link">
                                <?php echo e($item['label']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link flex items-center">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Logout
                            </button>
                        </form>
                    <?php endif; ?>
                <?php else: ?>
                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php $__currentLoopData = $menuItems['auth']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($item['href']); ?>" wire:navigate class="nav-link">
                                <?php echo e($item['label']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="nav-link flex items-center">
                                <i class="fas fa-sign-out-alt mr-1"></i>
                                Logout
                            </button>
                        </form>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <button @click="isOpen = !isOpen"
                class="md:hidden p-2 text-gray-700 hover:text-green-600 hover:bg-gray-100 rounded-lg transition-colors">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>

        <div x-show="isOpen" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2"
            class="md:hidden border-t border-gray-200 pt-4 pb-2" @click.away="isOpen = false">

            <?php if($type === 'landing'): ?>
                <?php if(auth()->guard()->guest()): ?>
                    <?php $__currentLoopData = $menuItems['guest']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['href']); ?>" @click="isOpen = false"
                            class="mobile-nav-link <?php echo e($item['active'] ? 'text-green-600 font-semibold' : ''); ?>">
                            <?php echo e($item['label']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="<?php echo e(route('login')); ?>"
                            class="block w-full bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition-colors text-center font-medium">
                            Login
                        </a>
                    </div>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                    <?php $__currentLoopData = $menuItems['auth']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['href']); ?>" wire:navigate @click="isOpen = false" class="mobile-nav-link">
                            <?php echo e($item['label']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="mobile-nav-link w-full text-left flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                
                <?php if(auth()->guard()->check()): ?>
                    <?php $__currentLoopData = $menuItems['auth']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e($item['href']); ?>" wire:navigate @click="isOpen = false" class="mobile-nav-link">
                            <?php echo e($item['label']); ?>

                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="mobile-nav-link w-full text-left flex items-center">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</nav>


<style>
    .nav-link {
        @apply text-gray-700 hover:text-green-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50;
    }

    .mobile-nav-link {
        @apply block text-gray-700 hover:text-green-600 transition-colors duration-200 px-3 py-2 rounded-md hover:bg-gray-50 text-base;
    }

    .navbar-sticky {
        @apply fixed top-0 left-0 right-0 z-50 shadow-lg bg-white/95 backdrop-blur-sm;
    }
</style>
<?php /**PATH D:\Projek\midtrans\Pos-kasir\resources\views/components/landing/x-navbar.blade.php ENDPATH**/ ?>