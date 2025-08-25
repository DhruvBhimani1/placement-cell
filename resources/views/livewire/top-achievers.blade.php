<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <!-- Section Header -->
        <div class="mb-12">
            <div class="flex justify-center">
                <svg class="h-12 w-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9a9.75 9.75 0 000 1.5h9a9.75 9.75 0 000-1.5zM12 6.75V3.75m0 3V6.75m0 0H9.375m2.625 0H14.625M12 6.75v8.25c0 1.242.413 2.393 1.125 3.375m-2.25-3.375c.712-.982 1.125-2.133 1.125-3.375V6.75m-1.125 0H9.375m2.625 0H12m0 0v.001M12 3.75h.008v.008H12V3.75zm-3.75 0h.008v.008H8.25V3.75zm7.5 0h.008v.008h-.008V3.75z" />
                </svg>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight mt-4">Top Achievers</h2>
            <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                Celebrating our students who have secured remarkable packages with leading companies.
            </p>
        </div>

        <!-- Filters -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 mb-12">
            <!-- Year Filter -->
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <select wire:model.live="year" class="w-48 appearance-none bg-gray-50 border border-gray-300 text-gray-700 py-3 px-4 pl-10 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-indigo-500 transition duration-150 ease-in-out cursor-pointer">
                    <option value="">All Years</option>
                    @foreach($years as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <!-- Branch Filter -->
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 7v-6m0 0l-9-5m9 5l9-5" />
                    </svg>
                </div>
                <select wire:model.live="branch" class="w-48 appearance-none bg-gray-50 border border-gray-300 text-gray-700 py-3 px-4 pl-10 pr-8 rounded-lg leading-tight focus:outline-none focus:bg-white focus:border-indigo-500 transition duration-150 ease-in-out cursor-pointer">
                    <option value="">All Branches</option>
                    @foreach($branches as $b)
                        <option value="{{ $b }}">{{ $b }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>

        <!-- Achievers Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($placements as $placement)
                <div class="bg-white p-8 rounded-xl shadow-lg text-center transform hover:-translate-y-2 transition-all duration-300 ease-in-out border border-gray-100 hover:shadow-2xl hover:border-indigo-500">
                    <div class="relative inline-block mb-4">
                        <div class="h-24 w-24 rounded-full bg-gray-200 flex items-center justify-center ring-4 ring-gray-300">
                            <svg class="h-12 w-12 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="font-bold text-xl text-gray-800 mb-1">{{ $placement->student_name }}</h3>
                    <p class="text-gray-500 text-base mb-4">{{ $placement->company }}</p>
                    <span class="inline-block bg-indigo-100 text-indigo-800 px-4 py-2 rounded-full text-sm font-bold">₹{{ $placement->package }} LPA</span>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.5 4.5 0 0012.001 15a4.5 4.5 0 00-3.182 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9 9.75h.008v.008H9V9.75zm6 0h.008v.008H15V9.75z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No Placements Found</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Try adjusting your year or branch filters to find top achievers.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</section>
