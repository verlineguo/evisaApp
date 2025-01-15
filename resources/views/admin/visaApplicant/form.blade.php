@extends('admin.layouts.app')
@section('title', 'Form add Visa Application')

@section('content')
<form action="{{ isset($visaApplicant) ? route('admin.visaApplicant.create.update', $visaApplicant->idVisa) : route('admin.visaApplicant.create.save') }}" method="post">
    @csrf
    @if (isset($visaApplicant))
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ isset($visaApplicant) ? 'Form Edit Visa Application' : 'Form Add Visa Application' }}</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="idApplicant">Applicant ID</label>
                        <input type="text" class="form-control" id="idApplicant" name="idApplicant" value="{{ old('idApplicant', isset($visaApplicant) ? $visaApplicant->idApplicant : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenisVisa">Visa Type</label>
                        <input type="text" class="form-control" id="jenisVisa" name="jenisVisa" value="{{ old('jenisVisa', isset($visaApplicant) ? $visaApplicant->jenisVisa : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dateOfArrival">Date of Arrival</label>
                        <input type="date" class="form-control" id="dateOfArrival" name="dateOfArrival" value="{{ old('dateOfArrival', isset($visaApplicant) ? $visaApplicant->dateOfArrival : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="dateOfDeparture">Date of Departure</label>
                        <input type="date" class="form-control" id="dateOfDeparture" name="dateOfDeparture" value="{{ old('dateOfDeparture', isset($visaApplicant) ? $visaApplicant->dateOfDeparture : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="lengthOfStay">Length of Stay (in days)</label>
                        <input type="number" class="form-control" id="lengthOfStay" name="lengthOfStay" value="{{ old('lengthOfStay', isset($visaApplicant) ? $visaApplicant->lengthOfStay : '') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="prevCountry">Previous Country</label>
                        <input type="text" class="form-control" id="prevCountry" name="prevCountry" value="{{ old('prevCountry', isset($visaApplicant) ? $visaApplicant->prevCountry : '') }}">
                    </div>

                    <div class="form-group">
                        <label for="expDate">Expiry Date</label>
                        <input type="date" class="form-control" id="expDate" name="expDate" value="{{ old('expDate', isset($visaApplicant) ? $visaApplicant->expDate : '') }}" required>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ isset($visa) ? 'Update' : 'Create' }}</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
