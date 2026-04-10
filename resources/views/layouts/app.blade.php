<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SMB') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.svg') }}">



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            <aside class="w-1/5 bg-white border-r border-gray-200 hidden md:block">
                <div class="p-6 h-20 flex items-center gap-3 border-b-2 border-grey-600">
                    <x-application-logo class="h-10 w-auto" />
                    <h1 class="text-4xl font-black text-black">SMB APPS</h1>
                </div>
                <nav>
                    @can('access-admin')
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center py-4 px-6 rounded text-xl transition group 
                        {{ request()->routeIs('admin.dashboard') ? 'bg-red-700 text-white' : 'text-black hover:bg-red-700 hover:text-white' }}">
                            <i class="fa-solid fa-house w-6 h-6 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-white' }}"></i> 
                            <span>Dashboard</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Master Data</div>

                        <a href="{{ route('admin.suppliers.index') }}" class="flex items-center py-4 px-6 rounded text-xl transition group 
                        {{ request()->routeIs('admin.suppliers.*') ? 'bg-red-700 text-white' : 'text-black hover:bg-red-700 hover:text-white' }}"> 
                            <i class="fa-solid fa-arrow-up-from-ground-water w-6 h-6 mr-3 {{ request()->routeIs('admin.suppliers.*') ? 'text-white' : 'text-gray-500 group-hover:text-white' }}"></i>
                            <span>Suppliers</span>
                        </a>
                        
                        <a href="{{ route('admin.product_types.index') }}" class="flex items-center py-4 px-6 rounded text-xl transition group 
                        {{ request()->routeIs('admin.product_types.*') ? 'bg-red-700 text-white' : 'text-black hover:bg-red-700 hover:text-white' }}"> 
                            <i class="fa-solid fa-box w-6 h-6 mr-3 {{ request()->routeIs('admin.product_types.*') ? 'text-white' : 'text-gray-500 group-hover:text-white' }}"></i>
                            <span>Product Types</span>
                        </a>
                        

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-money-bill w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Payment Methods</span>
                        </a>
                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-warehouse w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Inventories</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Manage Users</div>
                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-users w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Users</span>
                        </a>
                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Documentation</div>
                        <a href="" class="flex items-center py-4 px-6 rounded text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-circle-question w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Support</span>
                        </a>
                    @endcan

                    @can('access-staff')
                        <a href="{{ route('staff.dashboard') }}" class="flex items-center py-4 px-6 rounded text-xl transition group 
                        {{ request()->routeIs('staff.dashboard') ? 'bg-red-700 text-white' : 'text-black hover:bg-red-700 hover:text-white' }}">
                            <i class="fa-solid fa-house w-6 h-6 mr-3 {{ request()->routeIs('staff.dashboard') ? 'text-white' : 'text-gray-500 group-hover:text-white' }}"></i> 
                            <span>Dashboard</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Sales</div>

                        <a href="{{ route('staff.customers.index') }}" class="flex items-center py-4 px-6 rounded text-xl transition group 
                        {{ request()->routeIs('staff.customers.index') ? 'bg-red-700 text-white' : 'text-black hover:bg-red-700 hover:text-white' }}">
                            <i class="fa-solid fa-user-group w-6 h-6 mr-3 {{request()->routeIs('staff.customers.index') ? 'text-white' : 'text-gray-500 group-hover:text-white'}}"></i>
                            <span>Customers</span>
                        </a>
                        
                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-note-sticky w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Orders</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Production</div>

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-box-open w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Products</span>
                        </a>

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-calendar w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Production Schedule</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Inventory</div>

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-file w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Inventory Orders</span>
                        </a>

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-warehouse w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Inventory Usage</span>
                        </a>

                        <div class="py-4 px-3 text-xl font-extrabold text-black uppercase bg-gray-200 p-2">Documentation</div>

                        <a href="" class="flex items-center py-4 px-6 rounded text-black text-xl hover:bg-red-700 hover:text-white transition group">
                            <i class="fa-solid fa-circle-question w-6 h-6 mr-3 text-gray-500 group-hover:text-white"></i>
                            <span>Support</span>
                        </a>
                    @endcan
                </nav>
            </aside>

            <div class="flex-1 flex flex-col">
                @include('layouts.navigation') 
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>

    @stack('scripts')
    </body>
</html>
