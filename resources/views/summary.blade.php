@extends('layouts.fronted')
@section('title', 'Summary of Placements - ' . config('app.name'))

@section('content')
    <section class="bg-gradient-to-r from-[#213555] to-[#4F6F52] text-white py-20">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Summary of Placements</h1>
        </div>
    </section>
    <livewire:summary-page />
@endsection
