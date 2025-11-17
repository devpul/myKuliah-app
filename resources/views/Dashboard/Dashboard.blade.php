@extends('layout')

@section('content')
    <h1>HALO INI DASHBOARD</h1>

    @if (session('success'))
        <div style="color:green">{{ session('success') }}</div>
    @endif

    <h2>Welcome {{ Auth::user()->name ?? 'guest' }} 👋</h2>
    
    <div class="grid grid-cols-3 gap-x-3">
        <!-- card 1 -->
        <div class="bg-white px-4 py-2">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
        <!-- card 1 -->
        <div class="bg-white px-4 py-2">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
        <!-- card 1 -->
        <div class="bg-white px-4 py-2">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-x-3">
        <!-- card 1 -->
        <div class="bg-white px-4 py-2">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
        <!-- card 1 -->
        <div class="bg-white px-4 py-2">
            <div class="flex flex-col">
                <p>Lorem ipsum dolor</p>
                <h1>18</h1>
            </div>
        </div>
    </div>
    
@endsection
    