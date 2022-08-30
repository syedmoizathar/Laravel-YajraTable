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
                <th>Number</th>
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
                        {data: 'user_number', name: 'getContact.user_number'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                });
                console.log(table);
            });
        </script>
    @endpush
@endsection
