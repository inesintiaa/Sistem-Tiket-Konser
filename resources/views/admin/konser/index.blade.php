<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Konser') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto mb-5 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <a href="{{ route('admin.konser.create') }}">Create New Konser</a>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        @if ($message = Session::get('success'))
                        <p>{{ $message }}</p>
                        @endif
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">No</th>
                                    <th scope="col" class="px-6 py-3">Nama Konser</th>
                                    <th scope="col" class="px-6 py-3">Deskripsi</th>
                                    <th scope="col" class="px-6 py-3">Tanggal Konser</th>
                                    <th scope="col" class="px-6 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($konsers as $konser)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ ++$konser->id }}</td>
                                    <td class="px-6 py-4">{{ $konser->name }}</td>
                                    <td class="px-6 py-4">{{ $konser->description }}</td>
                                    <td class="px-6 py-4">{{ $konser->date }}</td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('admin.konser.destroy', $konser->id) }}" method="POST">
                                            <a href="{{ route('admin.konser.edit', $konser->id) }}">Edit</a>

                                            @csrf
                                            @method('DELETE')
    
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>