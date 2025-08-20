@extends('layouts.fronted')
@section('title', 'Summary of Placements - ' . config('app.name'))

@section('content')
   <section class="bg-[#213555] text-white py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Summary of Placements</h1>
           
        </div>
    </section>
<!-- Year Tabs -->
<div class="max-w-4xl mx-auto px-4 m-8">
    <div class="flex gap-4 mb-6">
        <button class="px-8 py-2 rounded-lg font-semibold bg-black text-white focus:outline-none">2024</button>
        <button class="px-8 py-2 rounded-lg font-semibold bg-white text-black border border-gray-300 hover:bg-gray-100 transition">2023</button>
        <button class="px-8 py-2 rounded-lg font-semibold bg-white text-black border border-gray-300 hover:bg-gray-100 transition">2022</button>
    </div>
    <hr class="mb-8">

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">👤</span>
            <span class="text-3xl font-bold text-black">360</span>
            <span class="text-gray-500 mt-1">Sanctioned Intake</span>
        </div>
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">💼</span>
            <span class="text-3xl font-bold text-black">161</span>
            <span class="text-gray-500 mt-1">Placed Students</span>
        </div>
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">🏢</span>
            <span class="text-3xl font-bold text-black">44.72%</span>
            <span class="text-gray-500 mt-1">Placement Rate</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">👤</span>
            <span class="text-3xl font-bold text-black">6.50 Lacs</span>
            <span class="text-gray-500 mt-1">Highest Package</span>
        </div>
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">💼</span>
            <span class="text-3xl font-bold text-black">2.72 Lacs</span>
            <span class="text-gray-500 mt-1">Average Package</span>
        </div>
        <div class="bg-white rounded-xl border p-6 flex flex-col items-center shadow">
            <span class="text-4xl mb-2">🏢</span>
            <span class="text-3xl font-bold text-black">64</span>
            <span class="text-gray-500 mt-1">Companies Visited</span>
        </div>
    </div>

    <!-- Branch Wise Summary Table -->
    <h2 class="text-2xl font-bold text-black mt-10 mb-2">Branch Wise Summary <span class="font-normal text-base">(As on 31st December of Respective Year)</span></h2>
    <div class="overflow-x-auto rounded-xl shadow mt-4">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-[#0a2a2a] text-white">
                <tr>
                    <th class="py-3 px-2 border">#</th>
                    <th class="py-3 px-2 border">Branch</th>
                    <th class="py-3 px-2 border">Sanctioned Intake</th>
                    <th class="py-3 px-2 border">Placed Students</th>
                    <th class="py-3 px-2 border">Placed %</th>
                    <th class="py-3 px-2 border">Highest package</th>
                </tr>
            </thead>
            <tbody class="text-black text-center">
                <tr>
                    <td class="py-2 px-2 border">1</td>
                    <td class="py-2 px-2 border">Computer Engineering</td>
                    <td class="py-2 px-2 border">60</td>
                    <td class="py-2 px-2 border">40</td>
                    <td class="py-2 px-2 border">66.67%</td>
                    <td class="py-2 px-2 border">5.00 Lacs</td>
                </tr>
                <tr>
                    <td class="py-2 px-2 border">2</td>
                    <td class="py-2 px-2 border">Information Technology</td>
                    <td class="py-2 px-2 border">60</td>
                    <td class="py-2 px-2 border">31</td>
                    <td class="py-2 px-2 border">51.67%</td>
                    <td class="py-2 px-2 border">4.80 Lacs</td>
                </tr>
                <tr>
                    <td class="py-2 px-2 border">3</td>
                    <td class="py-2 px-2 border">Electronics & Communication Engineering</td>
                    <td class="py-2 px-2 border">60</td>
                    <td class="py-2 px-2 border">13</td>
                    <td class="py-2 px-2 border">21.67%</td>
                    <td class="py-2 px-2 border">4.00 Lacs</td>
                </tr>
                <tr>
                    <td class="py-2 px-2 border">4</td>
                    <td class="py-2 px-2 border">Mechanical Engineering</td>
                    <td class="py-2 px-2 border">120</td>
                    <td class="py-2 px-2 border">50</td>
                    <td class="py-2 px-2 border">41.67%</td>
                    <td class="py-2 px-2 border">6.50 Lacs</td>
                </tr>
                <tr>
                    <td class="py-2 px-2 border">5</td>
                    <td class="py-2 px-2 border">Civil Engineering</td>
                    <td class="py-2 px-2 border">60</td>
                    <td class="py-2 px-2 border">27</td>
                    <td class="py-2 px-2 border">45.00%</td>
                    <td class="py-2 px-2 border">6.50 Lacs</td>
                </tr>
                <tr class="font-bold bg-gray-100">
                    <td class="py-2 px-2 border">Total</td>
                    <td class="py-2 px-2 border"></td>
                    <td class="py-2 px-2 border">360</td>
                    <td class="py-2 px-2 border">161</td>
                    <td class="py-2 px-2 border">44.72%</td>
                    <td class="py-2 px-2 border"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
