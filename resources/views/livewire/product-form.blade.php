<div class="p-6">
    <form wire:submit="save">
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="mt-1 block w-full" type="text" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:focus:border-indigo-600"></textarea>
        </div>

        <div class="mt-4">
            <x-primary-button>
                Save
            </x-primary-button>
        </div>
    </form>
</div>
