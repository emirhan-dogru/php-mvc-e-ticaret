@extends('backend.layout')

@section('content')
    <div class="container-fluid">

        @include('backend.default.alert')

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name and Surname</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Date of registration</th>
                                <th>Status</th>
                                <th>Process</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name and Surname</th>
                                <th>Email</th>
                                <th>Date of birth</th>
                                <th>Date of registration</th>
                                <th>Status</th>
                                <th>Process</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach (App\Models\Users::orderBy('id' , 'DESC')->get() as $user)
                                <tr>
                                    <td>{{ $user->name_surname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ format_date($user->birth_date , 'd F Y' ) }}</td>
                                    <td>{{ format_date($user->created_at , 'd F Y | H:i' ) }}</td>
                                    <td>{!! $user->status == 1 ? '<span class="text-success font-weight-bold">Aktif</span>' : '<span class="text-danger font-weight-bold">Pasif</span>' !!}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm btnEdit"
                                            data-id="{{ $user->id }}">Edit</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ base_url('admin/update-user') }}" method="POST" id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" readonly>
                        </div>

                        <div class="form-group">
                            <label>Name and Surname</label>
                            <input type="text" required class="form-control" placeholder="Name and Surname"
                                name="name_surname">
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" 
                                name="birth_date">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.btnEdit').on('click', function() {
            const id = $(this).data('id')

            $.get("{{ base_url('api/getUserById/') }}" + id, function(response) {
                if (response.status) {
                    $('#editModal').modal('show');
                    $('#editForm').find('[name="id"]').val(id);

                    $('#editForm').find('[type="email"]').val(response.data.email);
                    $('#editForm').find('[name="name_surname"]').val(response.data.name_surname);
                    $('#editForm').find('[name="birth_date"]').val(response.data.birth_date);
                    $('#editForm').find('[name="status"]').val(response.data.status);

                } else {
                    alert(response.message);
                }
            });
        });
    </script>
@endpush
