@extends('admin_master')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Appointment</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointment</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Appointment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
{{--                <a href="{{route('volunteers.create')}}" class="btn btn-primary add-new mb-2">Add Slider</a>--}}
                <div class="fetch-data table-responsive">
                    <table id="table-data" class="table table-bordered table-striped data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="conts">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- User View Modal -->
    <div class="modal fade" id="userViewModal" tabindex="-1" role="dialog" aria-labelledby="userViewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userViewModalLabel">Appointment Details</h5>
                    <!-- Bootstrap 4 Close Button -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="userViewModalContent">
                    <!-- AJAX দিয়ে কনটেন্ট এখানে আসবে -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

</div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function(){
            let data_id;
            var table = $('#table-data').DataTable({
                searching: true,
                processing: true,
                serverSide: true,
                ordering: false,
                responsive: true,
                stateSave: true,
                ajax: {
                    url: "{{ url('/appointments') }}",
                },

                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'phone', name: 'phone'},
                    {data: 'date', name: 'date'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $(document).on('click', '.delete-data', function(e){

                e.preventDefault();

                data_id = $(this).data('id');

                if(confirm('Do you want to delete this?'))
                {
                    $.ajax({

                        url: "{{url('/appointments')}}/"+data_id,
                        type:"DELETE",
                        dataType:"json",
                        success:function(data) {
                            if (data.status) {
                                toastr.success(data.message);

                                $('.data-table').DataTable().ajax.reload(null, false);
                            } else {
                                toastr.error(data.message);
                            }
                        },
                    });
                }
            });

            $(document).on('click', '#status-update', function(){

                const id = $(this).data('id');
                var isDataChecked = $(this).prop('checked');
                var status_val = isDataChecked ? 'Active' : 'Inactive';
                $.ajax({
                    url: "{{ url('/volunteer-status-update') }}",

                    type: "POST",
                    data:{ 'id': id, 'status': status_val },
                    dataType: "json",
                    success:function(data) {
                        if (data.status) {
                            toastr.success(data.message);

                            $('.data-table').DataTable().ajax.reload(null, false);
                        } else {
                            toastr.error(data.message);
                        }
                    },
                });
            });

        });

        $(document).on('click', '.view-data', function(e) {
            e.preventDefault();
            let userId = $(this).data('id');

            $.ajax({
                url: "{{ url('/appointments') }}/" + userId,
                type: 'GET',
                success: function(response) {
                    $('#userViewModalContent').html(response);
                    $('#userViewModal').modal('show');
                },
                error: function() {
                    alert('Failed to load data.');
                }
            });
        });
    </script>

@endpush
