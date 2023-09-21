<div>
    <div class="mt-4 mr-3 flex justify-end">
        <a wire:navigate href="{{ route('items.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
            Add new product
        </a>
    </div>

    <center>


        <div class="space-x-8 mt-4">
            <input wire:model.live="searchQuery" type="search" id="search" placeholder="Search...">

            <select wire:model.live="searchCategory" name="category">
                <option value="0">-- CHOOSE CATEGORY --</option>
                @foreach($categories as $id => $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="text-red-600 mb-2 mt-2" wire:loading>Loading...</div>
        <div class="min-w-full align-middle mt-4 " >





            <table class="min-w-full divide-y divide-gray-200 border"  wire:loading.class="opacity-50">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>

                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Name</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Category</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                            <span
                                class="text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Description</span>
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left">
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                    @forelse($items as $item)
                        <tr class="bg-white">
                            <td class="px-6 py-4">
                                @if($item->photo)
                                    <img src="/storage/{{ $item->photo }}" class="w-20 h-20" />
                                @endif
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $item->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $item->category->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                {{ $item->description }}
                            </td>
                            <td class="pr-4">
                                <a href="{{ route('items.edit', $item) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest">
                                    Edit
                                </a>
                                <a
                                    wire:click="deleteItem({{ $item->id }})"
                                    onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()"
                                    href="#" class="inline-flex items-center px-4 py-2 bg-red-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                                >
                                Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-4 text-sm" colspan="4">
                                <center>No products were found.</center>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="mt-2">
            {{ $items->links() }}
        </div>
    </center>
    <br>
</div>
