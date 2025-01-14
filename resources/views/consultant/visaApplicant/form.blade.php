@extends('layouts.app')
@section('title', 'Form add applicant')

@section('contents')
<form action=" {{isset($applicant) ?route(name: 'applicant.add.save', parameters: $applicant->id) : route('applicant.add.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($applicant) ? 'Form Edit applicant' : 'Form add Applicant' }}</h6>
          </div>
          <div class="card-body">

            <div class="form-group">
                    <label for="idApplicant">ID Applicant</label>
                    <input type="text" class="form-control" id="idApplicant" name="idApplicant" value="{{ old('idApplicant', isset($applicant) ? $applicant->idApplicant : '') }}">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($applicant) ? $applicant->name : '') }}">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', isset($applicant) ? $applicant->username : '') }}" >
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ old('dob', isset($applicant) ? $applicant->dob : '') }}" >
                </div>

                <div class="form-group">
                    <label for="phoneNo">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNo" name="phoneNo" value="{{ old('phoneNo', isset($applicant) ? $applicant->phoneNo : '') }}" >
                </div>

                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" name="emailAddress" value="{{ old('emailAddress', isset($applicant) ? $applicant->emailAddress : '') }}" >
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address', isset($applicant) ? $applicant->address : '') }}" >
                </div>

                <div class="form-group">
                    <label for="motherName">Mother's Name</label>
                    <input type="text" class="form-control" id="motherName" name="motherName" value="{{ old('motherName', isset($applicant) ? $applicant->motherName : '') }}" >
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ old('gender', isset($applicant) ? $applicant->gender : '') }}" >
                </div>

                <div class="form-group">
                    <label for="profession">Profession</label>
                    <input type="text" class="form-control" id="profession" name="profession" value="{{ old('profession', isset($applicant) ? $applicant->profession : '') }}" >
                </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">save</button>
          </div>
        </div>
      </div>
    </div>
</form>
@endsection