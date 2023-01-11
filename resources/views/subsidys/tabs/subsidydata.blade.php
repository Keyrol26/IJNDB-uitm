<div class="card-body">
    <div class="container" style="align-items: center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Episode NUmber</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Bayaran</th>
                    <th scope="col">Subsidi</th>
                    <th scope="col">Kounsel</th>
                    <th scope="col">Tarikh Masuk</th>
                    <th scope="col">Tarikh Keluar</th>
                    <th scope="col">Operator</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subinfo->subsidydata as $data)
                <tr>
                    <td>{{$data->episode_no}}</td>
                    <td>{{$data->invoice}}</td>
                    <td>{{$data->bayaran}}</td>
                    <td>{{$data->subsidi}}</td>
                    <td>{{$data->kounsel}}</td>
                    <td>{{$data->tarikh_masuk}}</td>
                    <td>{{$data->tarikh_keluar}}</td>
                    <td>{{$data->operator}}</td>
                    <td>{{$data->catatan}}</td>
                    <td>{{$data->status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>