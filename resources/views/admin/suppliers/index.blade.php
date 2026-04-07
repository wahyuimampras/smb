<x-app-layout>
    <div x-data="{
        showCreateModal: false, 
        showEditModal: false, 
        showDeleteModal: false,
        supplier: { id: '', name: '', phone: '', email: '', address: '' },
        deleteUrl: '' 
    }" class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="flex justify-between">
                        <h1 class="text-4xl text-black text-extrabold mb-2">{{ __('Supplier') }}</h1>
                        <x-primary-button 
                            @click.prevent="$dispatch('open-modal', 'create-supplier'); showCreateModal = true">
                            <i class="fa-solid fa-plus mr-2"></i>Add Supplier
                        </x-primary-button>
                    </div>
                    
                    <table class="w-full border-collapse mt-4">
                        <thead>
                            <tr class="bg-gray-0 border-b">
                                <th class="p-3 text-left">ID</th>
                                <th class="p-3 text-left">Supplier Name</th>
                                <th class="p-3 text-left">Phone</th>
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Address</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $s)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">{{ $s->supplier_code }}</td>
                                    <td class="p-3">{{ $s->name }}</td>
                                    <td class="p-3">{{ $s->phone }}</td>
                                    <td class="p-3">{{ $s->email }}</td>
                                    <td class="p-3">{{ $s->address }}</td>
                                    <td class="p-3 flex gap-2">
                                        <button @click.prevent="
                                            supplier = { 
                                                id: '{{ $s->id }}', 
                                                name: '{{ addslashes($s->name) }}', 
                                                phone: '{{ $s->phone }}', 
                                                email: '{{ $s->email }}', 
                                                address: '{{ addslashes($s->address) }}' 
                                            };
                                            showEditModal = true;
                                            $dispatch('open-modal', 'edit-supplier');
                                            " class="text-blue-600 hover:underline">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                        
                                        <button @click.prevent="
                                            deleteUrl = '{{ route('admin.suppliers.destroy', $s->id) }}';
                                            supplier.name = '{{ addslashes($s->name) }}';
                                            showDeleteModal = true;
                                            $dispatch('open-modal', 'confirm-delete');
                                            " class="text-red-600 hover:underline">
                                            <i class="fa-solid fa-trash-can"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <x-modal name="create-supplier" :show="false" x-show="showCreateModal" @close="showCreateModal = false">
            <form method="POST" action="{{ route('admin.suppliers.store') }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900">Add New Supplier</h2>
                <div class="mt-6 space-y-4">
                    <div>
                        <x-input-label for="name" value="Supplier Name" />
                        <x-text-input name="name" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="phone" value="Phone" />
                            <x-text-input name="phone" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="email" value="Email" />
                            <x-text-input name="email" type="email" class="mt-1 block w-full" required />
                        </div>
                    </div>
                    <div>
                        <x-input-label for="address" value="Address" />
                        <textarea name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close-modal', 'create-supplier'); showCreateModal = false">Cancel</x-secondary-button>
                    <x-primary-button class="ms-3">Save Supplier</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="edit-supplier" :show="false" x-show="showEditModal" @close="showEditModal = false">
            <form method="POST" :action="'{{ url('admin/suppliers') }}/' + supplier.id" class="p-6">
                @csrf @method('PATCH')
                <h2 class="text-lg font-medium text-gray-900">Edit Supplier</h2>
                <div class="mt-6 space-y-4">
                    <div>
                        <x-input-label value="Supplier Name" />
                        <x-text-input name="name" x-model="supplier.name" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label value="Phone" />
                            <x-text-input name="phone" x-model="supplier.phone" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label value="Email" />
                            <x-text-input name="email" x-model="supplier.email" type="email" class="mt-1 block w-full" required />
                        </div>
                    </div>
                    <div>
                        <x-input-label value="Address" />
                        <textarea name="address" x-model="supplier.address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close-modal', 'edit-supplier'); showEditModal = false">Cancel</x-secondary-button>
                    <x-primary-button class="ms-3">Update Supplier</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="confirm-delete" :show="false" x-show="showDeleteModal" @close="showDeleteModal = false">
            <form method="POST" :action="deleteUrl" class="p-6">
                @csrf @method('DELETE')
                <h2 class="text-lg font-medium text-gray-900">
                    Do you want to delete this supplier data? <span class="font-bold text-red-600" x-text="supplier.name"></span>?
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    You can cancel this action.
                </p>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close-modal', 'confirm-delete'); showDeleteModal = false">Cancel</x-secondary-button>
                    <x-danger-button class="ms-3">Delete Now</x-danger-button>
                </div>
            </form>
        </x-modal>

    </div>
</x-app-layout>