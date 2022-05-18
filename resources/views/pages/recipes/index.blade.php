@extends('layouts.app')

@section('main')
<div class="container px-6 mx-auto grid">
    <h2
        class="my-6 text-2xl font-semibold text-gray-700"
    >
        Riwayat Resep
    </h2>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
            >
                <th class="px-4 py-3">Pembeli</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">No HP</th>
                <th class="px-4 py-3">Tipe</th>
                <th class="px-4 py-3">Obat/Racikan</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
            </thead>
            <tbody
            class="bg-white divide-y"
            >
                @foreach ($recipes as $recipe)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3">
                            {{$recipe->buyer}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$recipe->date}}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{$recipe->phone}}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($recipe->is_concoction)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full"
                                >
                                    Racikan
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full"
                                >
                                    Non Racikan
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($recipe->is_concoction)
                              {{$recipe->concoction_name}}
                            @else
                              {{$recipe->recipeDetails->first()->drug->obatalkes_nama}}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                          <div class="flex items-center space-x-4 text-sm">
                            <a href="{{Route('recipes.show', $recipe->id)}}">
                              <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg" aria-label="Show">
                                <i class="fa-solid fa-eye"></i>
                              </button>
                            </a>
                          </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
        <div
        class="px-4 py-3 text-xs tracking-wide text-gray-500 uppercase border-t bg-gray-50"
        >
            {{ $recipes->links() }}
        </div>

    </div>
</div>
@endsection