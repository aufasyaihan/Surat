<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="">
        <div class="w-full md:w-5/6 xl:w-3/4 mx-auto mb-5 mt-3">
            <div class="py-5">
                <a class="bg-blue-600 p-3 rounded-lg hover:bg-blue-700 text-white font-bold uppercase text-sm"
                    href="{{ route('surat.create') }}">Tambah Surat</a>
            </div>
            @if (Session::has('success'))
                <div class="bg-green-200 px-2 py-0.5 mt-2 rounded-lg">
                    <div class="m-5 text-green-600 font-semibold">
                        {{ Session::get('success') }}
                    </div>
                </div>
            @endif

            <div class="mx-50 mt-2 dark:text-white">
                <hr>
                <div class="grid grid-cols-4 gap-4 p-3">
                    @foreach (App\Models\Surat::all() as $item)
                        <div class="bg-white dark:bg-slate-700 p-4 rounded-lg">
                            <div class="grid grid-cols-2 mb-5">
                                <div class="col-start-1 font-bold text-lg">{{ $item->judul }}</div>
                                <div class="col-end font-semibold text-sm justify-end">Kategori :
                                    {{ $item->kategoris->kategori }}</div>
                            </div>
                            <hr class="my-2">
                            <div class="text-justify">{{ $item->isi }}</div>
                            <hr class="my-2">
                            <div class="text-end">Penerima : {{ $item->penerimas->penerima }}</div>
                            <div class="text-end">Penerima : {{ $item->pengirims->pengirim }}</div>
                            <div class="grid grid-cols-4 mb-1">
                                <div class="col-end-6 text-md ">
                                    <a class="underline decoration-lime-500 underline-offset-4 hover:text-lime-400 transition-all"
                                        href="{{ url('surat/' . $item->id) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


</x-app-layout>
