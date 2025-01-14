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
                        <th>Visa ID</th>
                        <th>Applicant Name</th>
                        <th>Jenis Visa</th>
                        <th>tujuan</th>
                        <th>status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @php($no = 1)
                    @foreach ($applications as $application)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $application->idVisa }}</td>
                        <td>{{ $application->applicant->name }}</td>
                        <td>{{ $application->jenisVisa }}</td>
                        <td>{{ $application->visaFee->jenisVisa }}</td> <!-- Purpose of visa type -->
                        <td>{{ $application->status }}</td> <!-- Visa status -->
                        <td>
                            <a href="{{ route('consultant.viewVisaApplicationDetails', $application->idVisa) }}" class="btn btn-info btn-sm">View Details</a>
                            <a href="{{ route('consultant.acceptVisa', $application->idVisa) }}" class="btn btn-success btn-sm">Accept</a>
                            <a href="{{ route('consultant.rejectVisa', $application->idVisa) }}" class="btn btn-danger btn-sm">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection