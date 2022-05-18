@extends('layouts.app')

@section('main')
<div class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700"
    >
        Obat
    </h2>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
            >
                <th class="px-4 py-3">Kode</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Status</th>
            </tr>
            </thead>
            <tbody
            class="bg-white divide-y"
            >
                @foreach ($signas as $signa)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            {{$signa->signa_kode}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$signa->signa_nama}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($signa->is_active)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full"
                                >
                                    Aktif
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full"
                                >
                                    Tidak Aktif
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
        <div
        class="px-4 py-3 text-xs tracking-wide text-gray-500 uppercase border-t bg-gray-50"
        >
            {{ $signas->links() }}
        </div>
        
    </div>
</div>
@endsection