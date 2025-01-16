@extends('admin.layouts.app')
@section('title', 'Data document')

@section('content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Dokumen</h6>
        <a href="{{ route('admin.document.create') }}" class="btn btn-primary">Add document</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>no document</th>
                        <th>ID Applicant</th>
                        <th>Document Type</th>
                        <th>File Path</th>
                        <th>Uploaded Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($document as $row)
                    <tr>
                        <th>{{ $no++ }}</th>
                        <td>{{ $row['documentNo'] }}</td>
                        <td>{{ $row['idApplicant'] }}</td>
                        <td>{{ $row['documentType'] }}</td>
                        <td>{{ $row['filePath'] }}</td>
                        <td>{{ $row['uploadedDate'] }}</td>
                        <td>
                            <a href="{{ route('admin.document.create.update', $row['documentNo']) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('admin.document.delete', $row['documentNo']) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            <a href="{{ route('admin.document.detail', $row['documentNo']) }}" class="btn btn-info">View</a>

                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection