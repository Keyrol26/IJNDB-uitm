<div class="card-body">
    <div class="container" style="align-items: center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Perhubungan</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subinfo->subsidydpd as $data)
                <tr>
                    <td>{{$data->name}}</td>
                    <td>{{$data->umur}}</td>
                    <td>{{$data->perhubungan}}</td>
                    <td>{{$data->pekerjaan}}</td>
                    <td>{{$data->catatan}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>
