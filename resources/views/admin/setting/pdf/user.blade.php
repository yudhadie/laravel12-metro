<html>

<head>
    <title>{{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
    @include('admin.setting.pdf.partials.css-border')

    <p class="right">{{ Carbon\Carbon::now()->format('d/m/Y') }}</p>

    <div class="bold center">
        <span class="title">All Users</span>
    </div>

    <div class="space"></div>


    <table class="quarter">
        <tr>
            <td class="label">Bulan</td>
            <td class="bold">: {{ Carbon\Carbon::now()->format('F') }}</td>
        </tr>
        <tr>
            <td class="label">Tahun</td>
            <td class="bold">: {{ Carbon\Carbon::now()->format('Y') }}</td>
        </tr>
    </table>

    <table class='table'>
        <tbody>
            <tr class="head">
                <td class="small">No.</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Role</td>
                <td>Active</td>
            </tr>
            @foreach ($data as $dt)
                <tr>
                    <td class="center vtop">{{ $loop->iteration }}</td>
                    <td class="vtop">{{ $dt->name }}</td>
                    <td class="center vtop">{{ $dt->email }}</td>
                    <td class="center vtop">{{ $dt->role }}</td>
                    @if ($dt->active == 1)
                        <td class="center vtop success">active</td>
                    @else
                        <td class="center vtop danger">disabled</td>
                    @endif
                </tr>
            @endforeach
            <tr class="head">
                <td class="center small" colspan="4">Total</td>
                <td>{{ $data->count() }}</td>
            </tr>
        </tbody>
    </table>

    <div class="space"></div>

    <table>
        <tr class="noborder center">
            <td></td>
            <td class="quarter">{{ Carbon\Carbon::now()->format('d F Y') }}</td>
        </tr>
        <tr class="noborder">
            <td class="ttd"></td>
            <td></td>
        </tr>
        <tr class="noborder center">
            <td></td>
            <td>( {{ Auth::user()->name }} )</td>
        </tr>
    </table>

    <div class="page-break"></div>

</body>

</html>
