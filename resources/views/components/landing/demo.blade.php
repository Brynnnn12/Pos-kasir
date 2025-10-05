{{--
    Demo section component for landing page
--}}
<section id="demo" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Lihat Sistem Kami</h2>
            <p class="text-xl text-gray-600">Interface yang clean dan mudah digunakan</p>
        </div>

        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden">
                <div class="bg-gray-800 text-white p-4">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        <span class="ml-4 text-sm">POS Minimarket - Point of Sale System</span>
                    </div>
                </div>
                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-4">Interface Modern</h3>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    Navigasi intuitif
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    Real-time calculations
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    Responsive design
                                </li>
                                <li class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    Dark mode support
                                </li>
                            </ul>
                            <a href="{{ route('login') }}"
                                class="inline-block mt-6 bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors">
                                Coba Sekarang <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        <div class="text-center">
                            <img src="https://via.placeholder.com/400x300/667eea/ffffff?text=POS+Interface"
                                alt="POS Interface" class="rounded-lg shadow-lg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
