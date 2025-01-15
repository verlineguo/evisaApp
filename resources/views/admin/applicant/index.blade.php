@extends('admin.layouts.app')
@section('title', 'Data Applicant')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Applicant</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>No</th>
                    <th>ID Applicant</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Email Address</th>
                    <th>Address</th>
                    <th>Mother's Name</th>
                    <th>Gender</th>
                    <th>Profession</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($applicant as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row['idApplicant'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['username'] }}</td>
                        <td>{{ $row['dob'] }}</td>
                        <td>{{ $row['phoneNo'] }}</td>
                        <td>{{ $row['emailAddress'] }}</td>
                        <td>{{ $row['address'] }}</td>
                        <td>{{ $row['motherName'] }}</td>
                        <td>{{ $row['gender'] }}</td>
                        <td>{{ $row['profession'] }}</td>
                        <td>
                            <a href="{{ route('admin.applicant.create.update', $row['idApplicant']) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.applicant.delete', $row['idApplicant']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            <a href="{{ route('admin.applicant.detail', $row['idApplicant']) }}" class="btn btn-info">View</a>

                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection