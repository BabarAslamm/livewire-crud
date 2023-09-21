<div>
    <form method="POST" wire:submit="save">
        <div class="mt-4 ml-3 mr-3">
            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">Name *</label>
                <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" wire:model="name" />
                @error('name')
                <span class="mt-2 text-sm text-red-600">{{ $message }} *</span>
            @enderror
            </div>

            <div class="mt-4">
                <label for="description" class="block font-medium text-sm text-gray-700">Description *</label>
                <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" wire:model="description"></textarea>
                @error('description')
                <span class="mt-2 text-sm text-red-600">{{ $message }} *</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="category">Category *</label>
                <select wire:model="category_id" name="category" id="category" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                    <option value="0">-- CHOOSE CATEGORY --</option>
                    @foreach($categories as $id => $category)
                        <option value="{{ $id }}">{{ $category }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="mt-2 text-sm text-red-600">{{ $message }} *</span>
                @enderror
            </div>


            <div class="mt-4">
                <label for="color">Color</label>
                @foreach(\App\Models\Item::COLOR_LIST as $key => $value)
                    <div><input type="radio" wire:model="color" id="color" value="{{ $key }}" /> {{ $value }}</div>
                @endforeach
                @error('color')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="in_stock">In stock</label>
                <div><input type="checkbox" wire:model="in_stock" id="in_stock" value="1" /> In stock</div>
                @error('in_stock')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-4">
                <label for="photo" class="block font-medium text-sm text-gray-700">Photo</label>
                <input wire:model="photo" type="file" id="photo" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                @error('photo')
                    <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                Save Product
            </button>
        </div>
    </form>
</div>
