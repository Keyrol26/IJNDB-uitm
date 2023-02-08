<div class="modal-body">
    <div class="container" style="border-style: inset; padding: 20px;">
        {{-- <div class="container rounded" style="background-color: rgb(185, 224, 224)"> --}} {{-- <br> --}}
        {{-- <div class="row"> <div class="col">MRN</div> <div class="col-5">NAME</div> <div class="col">SEX</div> <div class="col">DOB</div> </div> --}}
        <div class="row">
            <div class="col col-sm-2"><b>{{ $labresult[0]->mrn }}</b></div>
            <div class="col-5"><b>{{ $labresult[0]->name }}</b></div>
            <div class="col"><b>{{ $labresult[0]->sex }}</b></div>
            <div class="col"><b>{{ $labresult[0]->dob }}</b></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6 col-sm-2">{{ $labresult[0]->lab_no }}</div>
            <div class="col-6 col-sm-2">
                {{-- @if(!empty($labresult[0]->order_date))
                {{{ \Carbon\Carbon::createFromFormat('Y-m-d', $labresult[0]->order_date)->format('d/m/Y') }}} @endif --}}
                {{ $labresult[0]->order_date }}
             </div>
            <div class="col-6 col-sm-2">{{ $labresult[0]->episode_no }}</div>
            <div class="col-6 col-sm-2">{{ $labresult[0]->episode_date }}</div>
        </div>
    </div> <br><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width:450px">Test Item</th>
                <th style="width:235px">Reference Range</th>
                <th style="width:200px">Unit</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>
            <table class="table table-striped">
                <thead> @foreach ($testset AS $data) <tr>
                        <th scope="col">{{ $data->test_set }}</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody> @foreach ($labresult AS $item) @if ($item->test_set == $data->test_set) <tr>
                        <td style="width:270px">&nbsp&nbsp&nbsp&nbsp{{ $item->test_item }}</td>
                        <td style="width:100px">{{ $item->ref_range }}</td>
                        <td style="width:100px">{{ $item->unit }}</td>
                        <td style="width:100px">{{ $item->value }}</td>
                    </tr> @endif @endforeach </tbody> @endforeach
            </table>
        </tbody>
    </table> <br>
    <div class="col">{{ $date }}</div>
</div>
