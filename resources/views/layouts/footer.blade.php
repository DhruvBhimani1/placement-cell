<footer class="bg-gray-900 text-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-4">
            <div class="lg:col-span-1">
                <div class="flex justify-center text-white sm:justify-start">
                    <a class="w-20 leading-none" href="{{ route('home') }}">
                        <img class="w-auto h-12" src="{{ url('assets/image/placement.png') }}" alt="Placement Cell Logo">
                    </a>
                </div>
                <p class="max-w-xs mt-4 text-sm text-gray-400">
                    Connecting students with top companies and providing resources for career success.
                </p>
                <div class="flex mt-6 space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 lg:col-span-3 sm:grid-cols-3">
                <div>
                    <p class="font-medium text-white">Quick Links</p>
                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-400">
                        <a class="hover:text-white" href="{{ route('home') }}">Home</a>
                        <a class="hover:text-white" href="{{ route('about') }}">About Us</a>
                        <a class="hover:text-white" href="{{ route('companies') }}">Companies</a>
                        <a class="hover:text-white" href="{{ route('contact') }}">Contact</a>
                    </nav>
                </div>
                <div>
                    <p class="font-medium text-white">For Students</p>
                    <nav class="flex flex-col mt-4 space-y-2 text-sm text-gray-400">
                        <a class="hover:text-white" href="#">Placement Process</a>
                        <a class="hover:text-white" href="#">Resume Builder</a>
                        <a class="hover:text-white" href="#">Interview Tips</a>
                        <a class="hover:text-white" href="#">FAQs</a>
                    </nav>
                </div>
                <div>
                    <p class="font-medium text-white">Contact Us</p>
                    <div class="flex flex-col mt-4 space-y-2 text-sm text-gray-400">
                        <a href="mailto:gec-bhav-dte@gujarat.gov.in" class="flex items-center hover:text-white">
                            <i class="fas fa-envelope mr-2"></i> gec-bhav-dte@gujarat.gov.in
                        </a>
                        <a href="tel:+912782525354" class="flex items-center hover:text-white">
                            <i class="fas fa-phone mr-2"></i> +91 278 252 5354
                        </a>
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-2"></i>
                            <p>Government Engineering College, Bhavnagar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pt-8 mt-8 border-t border-gray-800">
            <p class="text-sm text-center text-gray-400">&copy; {{ date('Y') }} Placement Cell, GEC-Bhavnagar. All rights reserved.</p>
        </div>
    </div>
</footer>
