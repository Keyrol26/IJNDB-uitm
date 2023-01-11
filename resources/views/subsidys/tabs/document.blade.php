<div class="card-body">
    <div class="container" style="align-items: center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Document</th>
                    <th scope="col">Tarikh</th>
                    <th scope="col">Rujukan/Komen</th>
                    <th scope="col">Negeri</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subinfo->subsidydocs as $data)
                <tr>
                    <td>{{$data->document}}</td>
                    <td>{{$data->tarikh}}</td>
                    <td>{{$data->rujukan}}</td>
                    <td>{{$data->negeri}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table with stripped rows -->
    </div>
</div>
