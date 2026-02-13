<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tulis Artikel Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Judul Artikel')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="body" :value="__('Isi Artikel')" />
                        <textarea id="body" name="body" rows="10" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required></textarea>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Simpan sebagai Draft') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
