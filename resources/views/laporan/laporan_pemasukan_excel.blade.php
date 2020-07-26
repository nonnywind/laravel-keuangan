<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <h3><i><b>Laporan Pemasukan</b></i></h3>
        <table id="table-pemasukan" class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="sort" data-sort="name">#</th>
                <th scope="col" class="sort" data-sort="completion">Tanggal</th>
                <th scope="col" class="sort" data-sort="status">Nominal</th>
                <th scope="col" class="sort" data-sort="budget">Sumber</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pemasukan as $index=>$ps)
            <tr>
                <td>{{$index+1}}</td>
                <td>{{date('d M Y', strtotime($ps->tanggal))}}</td>
                <td>Rp. {{number_format($ps->nominal, 0)}}</td>
                <td>{{$ps->nama}}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td>Total Pemasukan</td>
                <td><b><i>Rp. {{number_format($total_pemasukan, 0)}}</i></b></td>
            </tr>
        </tbody>
        </table>
</body>
</html>