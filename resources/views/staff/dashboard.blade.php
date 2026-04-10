<x-app-layout>
    <div class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl text-bold mb-2">Dashboard Staff</h1>
                    {{-- {{ __("You're logged in!") }} --}}
                    <div class="grid grid-cols-2 gap-2">
                        <div class="p-6 m-20 bg-white rounded shadow">
                            {!! $pieChart->container() !!}
                        </div>
                        <div class="p-6 m-20 bg-white rounded shadow">
                            {!! $barChart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ $pieChart->cdn() }}"></script>
        {{ $pieChart->script() }}
        {{ $barChart->script() }}
    @endpush
</x-app-layout>
