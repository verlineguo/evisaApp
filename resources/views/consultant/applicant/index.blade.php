@extends('consultant.layouts.app')
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
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row->idApplicant }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->dob }}</td>
                        <td>{{ $row->phoneNo }}</td>
                        <td>{{ $row->emailAddress }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->motherName }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->profession }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection