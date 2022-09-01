@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Laravel 8 Datatables</h1>
        <table class="table table-bordered data-table">
            <thead>
            <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Fees</th>
                <th>Number</th>
                <th>Contact Status</th>
                <th>Contact Created At</th>
                <th>Status</th>
                <th width="100px">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    @push('js')
        <script type="text/javascript">
            $(function () {
                var table = $('.data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('getUser') }}",
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'fees_price', name: 'getFees.price'},
                        {data: 'user_number', name: 'getContact.user_number'},
                        {data: 'contact_status', name: 'getContact.status'},
                        {data: 'contact_created_at', name: 'getContact.created_at'},
                        {data: 'status', name: 'status'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ],createdRow: function ( row, data, index ) {
                        console.log(data['contact_status']);

                        if (data['contact_status'] === 'Active') {
                            $('td', row).eq(5).css('background-color', '#e0ede0');
                            $('td', row).eq(5).css('color','#008000');
                        } else {
                            $('td', row).eq(5).css('background-color', '#fbfbdd');
                            $('td', row).eq(5).css('color','#b4b411');
                        }
                        if (data['status'] === 'Succeeded') {
                            $('td', row).eq(7).css('background-color', '#e0ede0');
                            $('td', row).eq(7).css('color','#008000');
                        } else {
                            $('td', row).eq(7).css('background-color', '#fbfbdd');
                            $('td', row).eq(7).css('color','#b4b411');
                        }
                        $('td', row).eq(6).addClass('text-right');
                    }
                });
                // console.log(table);
            });
        </script>
    @endpush
@endsection
