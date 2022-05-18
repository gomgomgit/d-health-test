@extends('layouts.app')

@section('main')
<div class="container px-6 mx-auto grid mb-12">
  <div class="flex justify-between items-center py-6">
    <h2
      class="text-2xl font-semibold text-gray-700"
    >
      Detail Resep
    </h2>
  </div>

  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md"
  >
    <div class="pb-6">
      <h3 class="mb-4 text-xl font-semibold text-gray-700">Data Pembeli</h3>
      <div class="grid grid-cols-6">
        <div class="flex items-center mb-2">
          <span class="text-gray-700">Nama</span>
        </div>
        <div class="col-span-5 flex items-center mb-2 w-full gap-4">
          <span class="text-gray-700">: </span>

          {{$recipe->buyer}}
        </div>
        <div class="flex items-center mb-2">
          <span class="text-gray-700">No Hp</span>
        </div>
        <div class="col-span-5 flex items-center mb-2 w-full gap-4">
          <span class="text-gray-700">: </span>

          {{$recipe->phone}}
        </div>
        <div class="flex items-center mb-2">
          <span class="text-gray-700">Tanggal</span>
        </div>
        <div class="col-span-5 flex items-center mb-2 w-full gap-4">
          <span class="text-gray-700">: </span>

          {{$recipe->date}}
        </div>
        <div class="flex items-center mb-2">
          <span class="text-gray-700">Tipe</span>
        </div>
        <div class="col-span-5 flex items-center mb-2 w-full gap-4">
          <span class="text-gray-700">: </span>

          {{$recipe->is_concoction ? 'Racikan' : 'Non Racikan'}}
        </div>
      </div>
    </div>
  </div>
  
  <div class="border-b-2 pb-6 mb-6">
    <h3 class="mb-4 text-xl font-semibold text-gray-700">Obat</h3>

    <div class="grid grid-cols-6 border-b-2 mb-6 form-obat">
      <h2 class="px-4 py-3 col-span-3">Obat</h2>
      <h2 class="px-4 py-3">Qty</h2>
      <h2 class="px-4 py-3 col-span-2">Signa</h2>

      @foreach ($recipe->recipeDetails as $detail)
        <div class="px-4 py-3 col-span-3">
          {{$detail->drug->obatalkes_nama}} ({{$detail->drug->obatalkes_kode}})
        </div>
        <div class="px-4 py-3">
          {{$detail->qty}}
        </div>
        <div class="px-4 py-3 col-span-2">
          {{$detail->signa->signa_nama}}
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection