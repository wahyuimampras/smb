<x-app-layout>
    <div x-data="{
        showCreateModal: false, 
        showEditModal: false, 
        showDeleteModal: false,
        productType: { id: '', productTypeName: '', productTypeDesc: '', },
        deleteUrl: '' 
    }" class="py-12">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 ">
                    <div class="flex justify-between">
                        <h1 class="text-4xl text-black font-bold mb-2">{{ __('Product Type') }}</h1>
                        <x-primary-button 
                            @click.prevent="$dispatch('open-modal', 'create-productType'); showCreateModal = true">
                            <i class="fa-solid fa-plus mr-2"></i>Add Product Type
                        </x-primary-button>
                    </div>
                    
                    <table class="w-full border-collapse mt-4">
                        <thead>
                            <tr class="bg-gray-0 border-b">
                                <th class="p-3 text-left">ID</th>
                                <th class="p-3 text-left">Name</th>
                                <th class="p-3 text-left">Description</th>
                                <th class="p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productTypes as $pt)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3">{{ $pt->productTypeID }}</td>
                                    <td class="p-3">{{ $pt->productTypeName }}</td>
                                    <td class="p-3">{{ $pt->productTypeDesc }}</td>
                                    <td class="p-3 flex gap-2">
                                        <button @click.prevent="
                                            productType = { 
                                                id: '{{ $pt->id }}', 
                                                productTypeName: '{{ addslashes($pt->productTypeName) }}', 
                                                productTypeDesc: '{{ addslashes($pt->productTypeDesc) }}' 
                                            };
                                            showEditModal = true;
                                            $dispatch('open-modal', 'edit-productType');
                                            " class="text-blue-600 hover:underline">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Edit
                                        </button>
                                        
                                        <button @click.prevent="
                                            deleteUrl = '{{ route('admin.product_types.destroy', $pt->id) }}';
                                            productType.name = '{{ addslashes($pt->productTypeName) }}';
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

        <x-modal name="create-productType" :show="false" x-show="showCreateModal" @close="showCreateModal = false">
            <form method="POST" action="{{ route('admin.product_types.store') }}" class="p-6">
                @csrf
                <h2 class="text-lg font-medium text-gray-900">Add New Supplier</h2>
                <div class="mt-6 space-y-4">
                    <div>
                        <x-input-label for="productTypeName" value="Product Type Name" />
                        <x-text-input name="productTypeName" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label for="productTypeDesc" value="Product Type Description" />
                        <textarea name="productTypeDesc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close-modal', 'create-productType'); showCreateModal = false">Cancel</x-secondary-button>
                    <x-primary-button class="ms-3">Save Product Type</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="edit-productType" :show="false" x-show="showEditModal" @close="showEditModal = false">
            <form method="POST" :action="'{{ url('admin/product_types') }}/' + productType.id" class="p-6">
                @csrf @method('PATCH')
                <h2 class="text-lg font-medium text-gray-900">Edit Product Type</h2>
                <div class="mt-6 space-y-4">
                    <div>
                        <x-input-label value="Product Type Name" />
                        <x-text-input name="productTypeName" x-model="productType.name" type="text" class="mt-1 block w-full" required />
                    </div>
                    <div>
                        <x-input-label value="Product Type Description" />
                        <textarea name="productTypeDesc" x-model="productType.desc" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500" rows="3" required></textarea>
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button @click="$dispatch('close-modal', 'edit-productType'); showEditModal = false">Cancel</x-secondary-button>
                    <x-primary-button class="ms-3">Update Product Type</x-primary-button>
                </div>
            </form>
        </x-modal>

        <x-modal name="confirm-delete" :show="false" x-show="showDeleteModal" @close="showDeleteModal = false">
            <form method="POST" :action="deleteUrl" class="p-6">
                @csrf @method('DELETE')
                <h2 class="text-lg font-medium text-gray-900">
                    Do you want to delete this product type data? <span class="font-bold text-red-600" x-text="productType.productTypeName"></span>?
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
