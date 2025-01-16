@extends('layouts.app')
@section('title', 'Form add applicant')

@section('content')
<form action=" {{isset($applicant) ?route('applicant.add.save', $applicant->id) : route('applicant.add.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($applicant) ? 'Form Edit applicant' : 'Form add Applicant' }}</h6>
          </div>
          <div class="card-body">

          <div class="form-group">
                <label for="idApplicant">Applicant ID</label>
                <input type="text" class="form-control" id="idApplicant" name="idApplicant" value="{{ old('idApplicant', isset($visaApplicant) ? $visaApplicant->idApplicant : '') }}">
            </div>

            <div class="form-group">
                <label for="idFee">Visa Fee ID</label>
                <input type="text" class="form-control" id="idFee" name="idFee" value="{{ old('idFee', isset($visaApplicant) ? $visaApplicant->idFee : '') }}">
            </div>

            <div class="form-group">
                <label for="jenisVisa">Visa Type</label>
                <input type="text" class="form-control" id="jenisVisa" name="jenisVisa" value="{{ old('jenisVisa', isset($visaApplicant) ? $visaApplicant->jenisVisa : '') }}">
            </div>

            <div class="form-group">
                <label for="dateOfArrival">Date of Arrival</label>
                <input type="date" class="form-control" id="dateOfArrival" name="dateOfArrival" value="{{ old('dateOfArrival', isset($visaApplicant) ? $visaApplicant->dateOfArrival : '') }}">
            </div>

            <div class="form-group">
                <label for="dateOfDeparture">Date of Departure</label>
                <input type="date" class="form-control" id="dateOfDeparture" name="dateOfDeparture" value="{{ old('dateOfDeparture', isset($visaApplicant) ? $visaApplicant->dateOfDeparture : '') }}">
            </div>

            <div class="form-group">
                <label for="lengthOfStay">Length of Stay (in days)</label>
                <input type="number" class="form-control" id="lengthOfStay" name="lengthOfStay" value="{{ old('lengthOfStay', isset($visaApplicant) ? $visaApplicant->lengthOfStay : '') }}">
            </div>

            <div class="form-group">
                <label for="prevCountry">Previous Country Visited</label>
                <input type="text" class="form-control" id="prevCountry" name="prevCountry" value="{{ old('prevCountry', isset($visaApplicant) ? $visaApplicant->prevCountry : '') }}">
            </div>

            <div class="form-group">
                <label for="expDate">Expiration Date</label>
                <input type="date" class="form-control" id="expDate" name="expDate" value="{{ old('expDate', isset($visaApplicant) ? $visaApplicant->expDate : '') }}">
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