@extends('consultant.layouts.app')
@section('title', 'Data document per applicant')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Applicant</h6>
    </div>
    <div class="card-body">
        <!-- <a href="{{ route('applicant.add') }}" class="btn btn-primary mb-3">Add applicant</a> -->
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th>Document No</th>
                    <th>File Path</th>
                    <th>Uploaded Date</th>
                    <th>Document Type</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($data as $row)
                    <tr>
                        <td>{{ $document->documentNo }}</td>
                        <td><a href="{{ asset('storage/' . $document->filePath) }}" target="_blank">View Document</a></td>
                        <td>{{ $document->uploadedDate }}</td>
                        <td>{{ $document->documentType }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection