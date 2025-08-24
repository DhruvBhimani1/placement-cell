<section class="py-16 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <!-- Trophy Icon and Title -->
        <div class="flex flex-row justify-center items-center mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mt-2 mr-2" viewBox="0 0 640 640">
                <path fill="#000000" d="M208.3 64L432.3 64C458.8 64 480.4 85.8 479.4 112.2C479.2 117.5 479 122.8 478.7 128L528.3 128C554.4 128 577.4 149.6 575.4 177.8C567.9 281.5 514.9 338.5 457.4 368.3C441.6 376.5 425.5 382.6 410.2 387.1C390 415.7 369 430.8 352.3 438.9L352.3 512L416.3 512C434 512 448.3 526.3 448.3 544C448.3 561.7 434 576 416.3 576L224.3 576C206.6 576 192.3 561.7 192.3 544C192.3 526.3 206.6 512 224.3 512L288.3 512L288.3 438.9C272.3 431.2 252.4 416.9 233 390.6C214.6 385.8 194.6 378.5 175.1 367.5C121 337.2 72.2 280.1 65.2 177.6C63.3 149.5 86.2 127.9 112.3 127.9L161.9 127.9C161.6 122.7 161.4 117.5 161.2 112.1C160.2 85.6 181.8 63.9 208.3 63.9zM165.5 176L113.1 176C119.3 260.7 158.2 303.1 198.3 325.6C183.9 288.3 172 239.6 165.5 176zM444 320.8C484.5 297 521.1 254.7 527.3 176L475 176C468.8 236.9 457.6 284.2 444 320.8z" />
            </svg>
            <h2 class="text-3xl md:text-4xl font-bold text-black">Top Achievers</h2>
        </div>
        <p class="text-lg text-gray-500 mb-8">Celebrating our students who secured the highest packages</p>
        <!-- Filters -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-10">
            <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <select wire:model.live="year" class="bg-transparent text-gray-700 focus:outline-none">
                    <option value="">All Years</option>
                    @foreach($years as $y)
                        <option value="{{ $y }}">{{ $y }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center bg-white rounded-lg px-4 py-2 shadow-sm">
                <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 7v-6m0 0l-9-5m9 5l9-5" />
                </svg>
                <select wire:model.live="branch" class="bg-transparent text-gray-700 focus:outline-none">
                    <option value="">All Branches</option>
                    @foreach($branches as $b)
                        <option value="{{ $b }}">{{ $b }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Achievers Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($placements as $placement)
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <svg class="h-16 w-16 rounded-full mx-auto mb-2 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.997A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <p class="font-semibold text-black text-lg">{{ $placement->student_name }}</p>
                    <p class="text-gray-500 text-sm mb-2">{{ $placement->company }}</p>
                    <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">₹{{ $placement->package }} LPA</span>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    <p>No placements found for the selected filters.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
