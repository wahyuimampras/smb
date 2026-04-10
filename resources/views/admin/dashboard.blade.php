<x-app-layout>
    <div class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="border-b-2 pb-6 mb-2">
                        <div class="flex justify-between items-center">
                            <h1 class="text-4xl font-bold">Dashboard Admin</h1>
                            <div class="flex items-center gap-4">
                                <p class="text-lg font-medium text-gray-700">
                                    {{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y - H:mm:ss') }}
                                </p>
                                <div class="relative group"> 
                                    <input type="date" class="absolute inset-0 opacity-0 cursor-pointer z-10" onclick="this.showPicker()">
                                    
                                    <button class="bg-gray-100 p-5 rounded-full h-16 w-16 group-hover:bg-gray-700 transition flex items-center justify-center">
                                        <i class="fa-solid fa-calendar-days text-2xl text-gray-700 group-hover:text-white"></i>
                                    </button>
                                </div>                         
                            </div>
                        </div>
                        
                        <h3 class="text-xl text-gray-400">Track company progress here. You almost reach targets here</h3>
                    </div>

                    <div class="border-b-2 py-4 grid grid-cols-4 items-center ">
                        <div class="flex gap-8 items-center justify-center py-2 border-r-2">
                            <i class="fa-solid fa-arrow-up-from-ground-water text-2xl w-20 h-20 p-8 rounded-full bg-gray-200 flex items-center justify-center"></i>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-2xl font-medium tracking-wide">Suppliers</h4>
                                <p class="text-3xl font-extrabold">{{ $suppliers->count() }}</p>
                            </div>                           
                        </div>
                        <div class="flex gap-8 items-center justify-center py-2 border-r-2">
                            <i class="fa-solid fa-user-group text-2xl w-20 h-20 p-8 rounded-full bg-gray-200  flex items-center justify-center"></i>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-2xl font-medium tracking-wide">Customers</h4>
                                <p class="text-3xl font-extrabold">{{ $customers->count() }}</p>
                            </div>                           
                        </div>
                        <div class="flex gap-8 items-center justify-center py-2 border-r-2">
                            <i class="fa-solid fa-arrow-up-from-ground-water text-2xl w-20 h-20 p-8 rounded-full bg-gray-200  flex items-center justify-center"></i>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-2xl font-medium tracking-wide">Orders</h4>
                                <p class="text-3xl font-extrabold">{{ $product_types->count() }}</p>
                            </div>                           
                        </div>
                        <div class="flex gap-8 items-center justify-center py-2 ">
                            <i class="fa-solid fa-box text-2xl w-20 h-20 p-8 rounded-full bg-gray-200  flex items-center justify-center"></i>
                            <div class="flex flex-col gap-2">
                                <h4 class="text-2xl font-medium tracking-wide"> Product Types</h4>
                                <p class="text-3xl font-extrabold">{{ $product_types->count() }}</p>
                            </div>                           
                        </div>
                    </div> 

                    <div class="p-6 m-10 bg-white rounded shadow">
                        {!! $barChart->container() !!}
                    </div>



                </div>
            </div>
        </div>
    </div>
    <style>
        .apexcharts-title-text {
            font-size: 1.875rem !important;
            line-height: 2.25rem !important;
            font-weight: 700;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
            
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            
            transform: translateY(15px);
        }
        
        .apexcharts-legend-text {
            font-size:20px !important; 
            font-weight: 500 !important;
            color: #374151 !important; 
            ont-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
        }


    </style>
    @push('scripts')
        <script src="{{ $barChart->cdn() }}"></script>
        {{ $barChart->script() }}
    @endpush
</x-app-layout>
