@extends('admin.layouts.app')
@section('title', 'Form Add Document')

@section('content')
<form action="{{ isset($document) ? route('admin.document.create.update', $document->documentNo) : route('admin.document.create.save') }}" method="post">
    @csrf
    @if (isset($document))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($document) ? 'Form Edit Document' : 'Form Add Document' }}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="idApplicant">ID Applicant</label>
                        <input type="text" class="form-control" id="idApplicant" name="idApplicant" value="{{ old('idApplicant', isset($document) ? $document->idApplicant : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="documentType">Document Type</label>
                        <select class="form-control" id="documentType" name="documentType" required>
                            <option value="">Select Document Type</option>
                            @foreach($docType as $row)
                                <option value="{{ $row->idDoc }}" {{ old('documentType', isset($document) ? $document->documentType : '') == $row->idDoc ? 'selected' : '' }}>
                                    {{ $row->dType }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="filePath">File Path</label>
                            <input type="file" class="form-control" id="filePath" name="filePath" required>
                            @if(isset($document))
                                <small>Current File: {{ $document->filePath }}</small>
                            @endif
                    </div>

                    <div class="form-group">
                        <label for="uploadedDate">Uploaded Date</label>
                        <input type="datetime-local" class="form-control" id="uploadedDate" name="uploadedDate" value="{{ isset($document) ? $document->uploadedDate: '' }}" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection