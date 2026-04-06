<x-app-layout>
    <div x-data="{
        showCreateModal: false, 
        showEditModal: false, 
        showDeleteModal: false,
        customer: { id: '', name: '', phone: '', email: '', address: '' },
        deleteUrl: ''  
    }" 
    class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between">
                        <h1 class="text-4xl text-black text-extrabold mb-2">Customer</h1>
                        <x-primary-button @click.prevent="showCreateModal=true; $dispatch('open-modal', 'create-customer')">
                            <i class="fa-solid fa-plus mr-2"></i>Add Customer
                        </x-primary-button>
                    </div>

                    <table class="w-full border-collapse mt-4">
                        <thead>
                            <tr class="bg-gray-0 border-b">
                                <th class="p-3 text-left">ID</th>
                                <th class="p-3 text-left">Customer Name</th>
                                <th class="p-3 text-left">Phone</th>
                                <th class="p-3 text-left">Email</th>
                                <th class="p-3 text-left">Address</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($customers as $c)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">{{ $c->cust_id }}</td>
                                    <td class="p-3">{{ $c->name }}</td>
                                    <td class="p-3">{{ $c->phone }}</td>
                                    <td class="p-3">{{ $c->email }}</td>
                                    <td class="p-3">{{ $c->address }}</td>
                                    <td class="p-3 flex gap-2">
                                        <button @click.prevent="
                                            customer = {
                                                id: '{{ $c->id }}',
                                                name: '{{ addslashes($c->name) }}',
                                                phone: '{{ $c->phone }}',
                                                email: '{{ $c->email }}',
                                                address: '{{ addslashes($c->address) }}'
                                            };
                                            showEditModal = true;
                                            $dispatch('open-modal', 'edit-customer');
                                        " class="text-blue-600 hover:text-blue-800">
                                            <i class="fa-solid fa-pen-to-square"></i>Edit
                                        </button>

                                        <button class="text-red-600 hover:underline">
                                            <i class="fa-solid fa-trash-can"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="create-customer" :show="false" x-show="showCreateModal" @close="showCreateModal = false">
        <form action="{{ route('staff.customers.store') }}" method="POST" class="p-6">
            @csrf
            <h2 class="text-lg font-medium text-gray-900">Add New Customer</h2>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="name" value="Customer Name" />
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
                <x-secondary-button @click="$dispatch('close-modal', 'create-customer'); showCreateModal=false">Cancel</x-secondary-button>
                <x-primary-button class="ms-3">Save Customer</x-primary-button>
            </div>
        </form>
    </x-modal>

    <x-modal name="edit-customer" :show="false" x-show="showEditModal" @close="showEditModal = false">
        <form method="POST" :action="'{{ url('staff/customers') }}/' + customer.id" class="p-6">
            @csrf
            @method('PATCH')
            <h2 class="text-lg font-medium text-gray-900 mb-4">Edit Customer</h2>
            
            <div class="space-y-4">
                <div>
                    <x-input-label value="Customer Name" />
                    <x-text-input name="name" type="text" x-model="customer.name" class="mt-1 block w-full" required />
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label value="Phone" />
                        <x-text-input name="phone" type="text" x-model="customer.phone" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label value="Email" />
                        <x-text-input name="email" type="email" x-model="customer.email" class="mt-1 block w-full" required />
                    </div>
                </div>
                <div>
                    <x-input-label value="Address" />
                    <textarea name="address" x-model="customer.address" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required></textarea>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button @click="$dispatch('close-modal', 'edit-customer'); showEditModal = false">Cancel</x-secondary-button>
                <x-primary-button class="ms-3">Update Customer</x-primary-button>
            </div>
        </form>
    </x-modal>

</x-app-layout>