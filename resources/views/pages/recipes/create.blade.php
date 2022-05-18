@extends('layouts.app')

@section('title', 'Buat Resep')

@section('head-addon')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <style>
    .select2-selection {
      height: 36px !important
    }
    .select2-selection__rendered {
      padding: .25rem .5rem !important
    }
    .select2-selection__arrow {
      height: 36px !important
    }
    .form-obat {
      min-width: 800px;
      overflow: scroll;
    }
  </style>
@endsection

@section('main')
  
<div x-data="recipe()" x-init="select2Alpine" class="container px-6 mx-auto grid mb-12">
  <div class="flex justify-between items-center py-6">
    <h2
      class="text-2xl font-semibold text-gray-700"
    >
      Tambah Resep
    </h2>
  </div>

  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md"
  >
    <form action="{{Route('recipes.store')}}" method="POST">
      @csrf

      {{-- Data Pembeli --}}
      <div class="border-b-2 pb-6 mb-6">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">Data Pembeli</h3>
        <div class="grid grid-cols-6">
          <div class="flex items-center">
            <span class="text-gray-700">Nama</span>
          </div>
          <div class="col-span-5 flex items-center w-full gap-4">
            <span class="text-gray-700">: </span>
            <input
              name="name" value="{{old('name')}}" required
              class="block w-full mt-1 text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
              placeholder="Budi Tama"
            />
          </div>
          <div class="flex items-center">
            <span class="text-gray-700">No Hp</span>
          </div>
          <div class="col-span-5 flex items-center w-full gap-4">
            <span class="text-gray-700">: </span>
            <input
              name="phone" value="{{old('phone')}}" required
              class="block w-full mt-1 text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
              placeholder="084327468322"
            />
          </div>
          <div class="flex items-center">
            <span class="text-gray-700">Tanggal</span>
          </div>
          <div class="col-span-5 flex items-center w-full gap-4">
            <span class="text-gray-700">: </span>
            <input
              name="date" value="{{old('date', date('Y-m-d'))}}" required
              type="date"
              class="block w-full mt-1 text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
            />
          </div>
        </div>
      </div>

      {{-- Pilih tipe --}}
      <div class="border-b-2 pb-6 mb-6">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">Pilih Tipe Resep</h3>
        <div class="grid grid-cols lg:grid-cols-2 gap-12">
          <div @click="recipeType = 'nonConcoction'" :class="'flex justify-center items-center bg-'+ nonConcoctionColor() +'-300 shadow rounded-2xl h-44 drop-shadow-xl hover:drop-shadow-md duration-300'">
            <i :class="'text-'+ nonConcoctionColor() +'-800 text-5xl text-center mr-5 fa-solid fa-capsules'"></i>
            <p class="text-gray-600 text-2xl font-bold">
              Non Racikan
            </p>
          </div>
          <div @click="recipeType = 'concoction'" :class="'flex justify-center items-center bg-'+ concoctionColor() +'-300 shadow rounded-2xl h-44 drop-shadow-xl hover:drop-shadow-md duration-300'">
            <i :class="'text-'+ concoctionColor() +'-800 text-5xl text-center mr-5 fa-solid fa-flask-vial'"></i>
            <p class="text-gray-600 text-2xl font-bold">
              Racikan
            </p>
          </div>
        </div>
        <input type="hidden" name="type" x-model="recipeType">
      </div>
  
      {{-- Pilih Obat --}}
        <div class="border-b-2 pb-6 mb-6" x-show="recipeType == 'nonConcoction'">
          <h3 class="mb-4 text-xl font-semibold text-gray-700">Pilih Obat</h3>
  
          <div class="grid grid-cols-7 border-b-2 mb-6 form-obat">
            <h2 class="px-4 py-3 col-span-3">Obat</h2>
            <h2 class="px-4 py-3">Stok</h2>
            <h2 class="px-4 py-3">Qty</h2>
            <h2 class="px-4 py-3 col-span-2">Signa</h2>
  
            <div class="px-4 py-3 col-span-3">
              <select
                data-placeholder="Pilih Obat"
                name="drug" :required="recipeType == 'nonConcoction'"
                class=" py-2 block w-full text-sm form-select focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan"
                style="width: 100%; height: 100%"
                x-ref="selectDrugNon"
                x-model="drugNon"
              >
                <template x-for="(drug, drugIndex) in drugs" :key="drugIndex">
                  <option :value="drug.id" :data-index="drugIndex" :disabled="drug.stock <=0" x-text="drug.code + ' (' + drug.name + ') ' + (drug.stock <=0 ? 'Stok Habis' : '')"></option>
                </template>
              </select>
            </div>
            <div class="px-4 py-3">
                <input
                  type="number" value="-"
                  x-model="stockNon"
                  name="" disabled
                  class="stock block w-full text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
                  placeholder=""
                />
            </div>
            <div class="px-4 py-3">
                <input
                  type="number" value="-"
                  x-model="qtyNon"
                  :max="drugNon.stock"
                  name="qty"
                  class="block w-full text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
                  x-on:change="qtyNonChange()"
                  x-on:keyUp="qtyNonChange()"
                  placeholder=""
                />
            </div>
            <div class="px-4 py-3 col-span-2">
              <select
                data-placeholder="Pilih Obat"
                name="signa" :required="recipeType == 'nonConcoction'"
                class="select-signa py-2 block w-full text-sm form-select focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan"
                style="width: 100%; height: 100%"
              >
                @foreach ($signas as $signa)
                  <option value="{{$signa->signa_id}}">{{$signa->signa_kode}} ({{$signa->signa_nama}})</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      
        <div class="border-b-2 pb-6 mb-6" x-show="recipeType == 'concoction'">
          <h3 class="mb-4 text-xl font-semibold text-gray-700">Racik Obat</h3>

          <div class="px-4 py-3 grid grid-cols-6 border-b-2">
            <div class="flex items-center">
              <span class="text-gray-700">Nama Racikan</span>
            </div>
            <div class="col-span-5 flex items-center w-full gap-4">
              <span class="text-gray-700">: </span>
              <input
                name="concoction_name" value="{{old('concoction_name')}}" :required="recipeType == 'concoction'"
                class="block w-full mt-1 text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
                placeholder="racikan batuk"
              />
            </div>
          </div>
  
          <div class="grid grid-cols-8 border-b-2 mb-6 form-obat">
            <h2 class="px-4 py-3 col-span-3">Obat</h2>
            <h2 class="px-4 py-3">Stok</h2>
            <h2 class="px-4 py-3">Qty</h2>
            <h2 class="px-4 py-3 col-span-2">Signa</h2>
            <h2 class="px-4 py-3">Aksi</h2>
  
            <template x-for="(condrug, condrugIndex) in consDrug">
              <div class="col-span-8 grid grid-cols-8">
                <div class="px-4 py-3 col-span-3">
                  <select
                    data-placeholder="Pilih Obat"
                    :required="recipeType == 'concoction'"
                    class="block w-full text-sm form-select focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan"
                    style="width: 100%; height: 100%"
                    x-model="condrug.index"
                    x-on:change="drugChange(condrugIndex)"
                  >
                    <option value="">Pilih Obat</option>
                    <template x-for="(ldrug, drugIndex) in drugs" :key="drugIndex">
                      <option :value="drugIndex" :disabled="ldrug.stock <=0" x-text="ldrug.code + ' (' + ldrug.name + ') ' + (ldrug.stock <=0 ? 'Stok Habis' : '')"></option>
                    </template>
                  </select>
                  <input type="hidden" :name="'drugs['+condrugIndex + '][drug]'"
                  x-model="condrug.drug">
                </div>
                <div class="px-4 py-3">
                    <input
                      type="number" value="-"
                      x-model="condrug.stock"
                      name="" disabled
                      class="stock block w-full text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
                      placeholder=""
                    />
                </div>
                <div class="px-4 py-3">
                    <input
                      type="number" value="-"
                      x-model="condrug.qty"
                      :max="condrug.stock"
                      :name="'drugs['+ condrugIndex +'][qty]'"
                      class="block w-full text-sm focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan form-input"
                      x-on:change="qtyChange(condrugIndex)"
                      x-on:keyUp="qtyChange(condrugIndex)"
                      placeholder=""
                    />
                </div>
                <div class="px-4 py-3 col-span-2">
                  <select
                    data-placeholder="Pilih Obat"
                    :name="'drugs['+ condrugIndex +'][signa]'" :required="recipeType == 'concoction'"
                    class="block w-full text-sm form-select focus:border-cyan-400 focus:outline-none focus:shadow-outline-cyan"
                    style="width: 100%; height: 100%"
                  >
                    <option value="">Pilih Signa</option>
                    @foreach ($signas as $signa)
                      <option value="{{$signa->signa_id}}">{{$signa->signa_kode}} ({{$signa->signa_nama}})</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <div class="px-4 py-3 col-span-2">
                    <div @click="deleteConsDrug(condrugIndex)" class="bg-red-500 w-10 h-10 rounded flex justify-center items-center">
                      <i class="text-white fa-solid fa-trash-alt"></i>
                    </div>
                  </div>
                </div>
              </div>
            </template>
          </div>
      
          <div class="flex justify-end my-3">
            <button
              type="button"
              @click="addConsDrug()"
              class="px-4 pt-1.5 pb-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-md active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green"
            >
              <i class="fas fa-plus"></i>
              Tambah Obat
            </button>
          </div>
        </div>
  
      <div>
        <button
          class="w-full px-4 pt-1.5 pb-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-cyan-600 border border-transparent rounded-md active:bg-cyan-600 hover:bg-cyan-700 focus:outline-none focus:shadow-outline-cyan"
        >
          Simpan Resep
        </button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script-addon')
  <script>
    function select2Alpine() {
      this.selectDrugNon = $(this.$refs.selectDrugNon).select2();
      this.selectSignaNon = $(this.$refs.selectSignaNon).select2();
      this.selectDrugNon.on("select2:select", (event) => {
        this.dataNon = this.drugs[event.params.data.element.dataset.index];
      });
      this.$watch("dataNon", (value) => {
        this.drugNonChange()
      });
    }
    function recipe() {
      return {
        recipeType: '',
        drugs : [
          @foreach ($drugs as $drug)
            { 
              id: '{{$drug->obatalkes_id}}', 
              name: '{{$drug->obatalkes_nama}}', 
              code: '{{$drug->obatalkes_kode}}', 
              stock: '{{$drug->stok}}'
            },
          @endforeach
        ],
        dataNon  : '',
        drugNon  : '',
        stockNon : 0,
        qtyNon   : 0,

        consDrug : [
          {
            data: '',
            index: '',
            drug: '',
            stock: 0,
            qty: 0,
          }
        ],

        nonConcoctionColor() {
          if (this.recipeType == 'nonConcoction') {
            return 'green'
          } else {
            return 'gray'
          }
        },
        concoctionColor() {
          if (this.recipeType == 'concoction') {
            return 'blue'
          } else {
            return 'gray'
          }
        },
        drugNonChange() {
          console.log('drugnonchange')
          this.stockNon = this.dataNon.stock
          this.qtyNon = 0
        },
        qtyNonChange() {
          if (this.qtyNon < 0) {
            alert('tidak kurang dari 0')
            return this.qtyNon = 0 
          }
          stockNonTemp = (this.dataNon.stock - this.qtyNon).toFixed(2)
          if (stockNonTemp < 0) {
            alert('qty telah melebihi stock')
            this.qtyNon = 0
          } else {
            this.stockNon = stockNonTemp
          }
        },

        addConsDrug() {
          this.consDrug.push({
            data: '',
            index: '',
            drug: '',
            stock: 0,
            qty: 0,
          })
        },
        deleteConsDrug(i) {
          this.consDrug.splice(1, i)
        },

        drugChange(i) {
          drugIndex = this.consDrug[i].index
          
          this.consDrug[i].data = this.drugs[drugIndex]
          this.consDrug[i].drug = this.consDrug[i].data.id
          this.consDrug[i].stock = this.consDrug[i].data.stock
          this.consDrug[i].qty = 0
        },
        qtyChange(i) {
          if (this.consDrug[i].qty < 0) {
            alert('tidak kurang dari 0')
            return this.consDrug[i].qty = 0
          }
          
          stockTemp = (this.consDrug[i].data.stock - this.consDrug[i].qty).toFixed(2)

          if (stockTemp < 0) {
            alert('qty telah melebihi stock')
            this.consDrug[i].qty = 0
          } else {
            this.consDrug[i].stock = stockTemp
          }
          this.consDrug[i].stock = (this.consDrug[i].data.stock - this.consDrug[i].qty).toFixed(2)
        },
      }
    }
  </script>
@endsection
