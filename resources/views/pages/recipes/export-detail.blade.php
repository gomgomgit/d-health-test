<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Resep</title>

    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
      }
    </style>
</head>
<body>
    <div>
        <h2>Resep</h2>
        <div>
          <div class="">
            <h3 class="">Data Pembeli</h3>

            <table>
              <tr>
                <td>
                  <span>Nama</span>
                </td>
                <td>
                  : {{$recipe->buyer}}
                </td>
              </tr>
              <tr>
                <td>
                  <span>No Hp</span>
                </td>
                <td>
                  : {{$recipe->phone}}
                </td>
              </tr>
              <tr>
                <td>
                  <span>Tanggal</span>
                </td>
                <td>
                  : {{$recipe->date}}
                </td>
              </tr>
              <tr>
                <td>
                  <span>Tipe</span>
                </td>
                <td>
                  : {{$recipe->is_concoction ? 'Racikan' : 'Non Racikan'}}
                </td>
              </tr>
            </table>
          </div>
        </div>
  
      <div class="border-b-2 pb-6 mb-6">
        <h3 class="mb-4 text-xl font-semibold text-gray-700">{{$recipe->is_concoction ? $recipe->concoction_name : 'Obat'}}</h3>

        <table>
          <thead>
            <tr>
              <th>Obat</th>
              <th>Qty</th>
              <th>Signa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($recipe->recipeDetails as $detail)
              <tr>
                <td>{{$detail->drug->obatalkes_nama}}</td>
                <td>{{$detail->qty}}</td>
                <td>{{$detail->signa->signa_nama}}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</body>
</html>