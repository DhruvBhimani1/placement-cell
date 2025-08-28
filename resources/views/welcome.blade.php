@extends('layouts.fronted')
@section('title', config('app.name'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden py-12 md:py-26 bg-[#213555]">
        <img src="{{ asset('assets/image/homeimg.jpg') }}" alt="Placement Cell Hero"
            class="absolute inset-0 w-full h-full object-cover object-center z-0">
        <div class="absolute inset-0 bg-black/50 z-10"></div> {{-- Added semi-transparent overlay --}}
        <div class="relative z-20 max-w-3xl md:max-w-5xl mx-auto px-4 py-20 md:py-32 flex flex-col items-center text-center">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold mb-4 text-white leading-tight">Welcome to the Placement
                Cell</h1>
            <p class="text-lg sm:text-xl md:text-2xl mb-10 text-white">Providing transparent access to placement data,
                connecting students with opportunities, and showcasing the achievements of our alumni.</p>

        </div>
    </section>
    <livewire:top-achievers />
    <!-- Partner Companies Section -->
    <section class="py-16 bg-gray-50"> {{-- Changed background to light gray --}}
        <div class=" mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-8">Our Recruiters</h2> {{-- Increased bottom margin --}}
              <div class="max-w-6xl mx-auto px-4 mt-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-20">
            <!-- Company Card 1 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/1.jpg') }}" alt="Logo of ArcelorMittal Nippon Steel India Limited" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">ArcelorMittal Nippon Steel India Limited</p>
            </div>
            <!-- Company Card 2 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/2.jpg') }}" alt="Logo of Cybercom Creation" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Cybercom Creation</p>
            </div>
            <!-- Company Card 3 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/3.jpg') }}" alt="Logo of COVRIZE" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">COVRIZE</p>
            </div>
            <!-- Company Card 4 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/4.jpg') }}" alt="Logo of Acrysil" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Acrysil</p>
            </div>
            <!-- Company Card 5 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/5.jpg') }}" alt="Logo of Meditab" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Meditab</p>
            </div>
            <!-- Company Card 6 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/6.jpg') }}" alt="Logo of Tata Consultancy Services" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Tata Consultancy Services</p>
            </div>
            <!-- Company Card 7 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/7.jpg') }}" alt="Logo of Adani Group" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Adani Group</p>
            </div>
            <!-- Company Card 8 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/8.jpg') }}" alt="Logo of Scanpoint Geomatics" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Scanpoint Geomatics</p>
            </div>
            <!-- Company Card 9 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/9.jpg') }}" alt="Logo of Godrej & Boyce Ltd." class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Godrej & Boyce Ltd.</p>
            </div>
            <!-- Company Card 10 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/10.jpg') }}" alt="Logo of E-infochip" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">E-infochip</p>
            </div>
            <!-- Company Card 11 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/11.jpg') }}" alt="Logo of Zignuts Technolab" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Zignuts Technolab</p>
            </div>
            <!-- Company Card 12 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/12.jpg') }}" alt="Logo of Reliance Industries" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Reliance Industries</p>
            </div>
            <!-- Company Card 13 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/13.jpg') }}" alt="Logo of Tatvasoft" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Tatvasoft</p>
            </div>
            <!-- Company Card 14 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/15.jpg') }}" alt="Logo of Metso Outotech" class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Metso Outotech</p>
            </div>
            <!-- Company Card 15 -->
            <div class="bg-white border rounded-2xl p-8 flex flex-col items-center shadow transition-transform duration-200 hover:scale-105 hover:shadow-2xl hover:border-[#213555]">
                <img src="{{ asset('assets/image/company/16.jpg') }}" alt="Logo of Fibrox 3D Technologies Pvt.Ltd." class="h-16 w-16 object-contain mb-4 rounded-lg bg-gray-100">
                <p class="font-bold text-lg text-center text-[#213555]">Fibrox 3D Technologies Pvt.Ltd.</p>
            </div>
        </div>
            <div class="mt-12"> {{-- Added a button to view all recruiters --}}
                <a href="{{ route('companies') }}"
                    class="inline-block bg-[#213555] text-white font-semibold py-3 px-8 rounded-full text-lg hover:bg-[#1a2b47] transition duration-300 ease-in-out shadow-lg">
                    View All Recruiters
                </a>
            </div>
        </div>
    </section>

@endsection
