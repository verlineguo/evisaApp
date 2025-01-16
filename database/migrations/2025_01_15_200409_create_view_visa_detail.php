<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateViewVisaDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW viewVisaDetail AS
            SELECT 
                va.idVisa AS VisaID,
                a.name AS ApplicantName,
                a.dob AS DateOfBirth,
                v.jenisVisa AS VisaType,
                c.countryName AS destinationCountry,
                v.fee AS VisaFee,
                va.dateOfArrival AS ArrivalDate,
                va.dateOfDeparture AS DepartureDate,
                va.lengthOfStay AS LengthOfStay,
                va.prevCountry AS PreviousCountry,
                va.expDate AS ExpirationDate
            FROM 
                visa_applicant va
            INNER JOIN 
                applicant a ON va.idApplicant = a.idApplicant
            INNER JOIN 
                visa v ON va.idFee = v.idFee
            INNER JOIN 
                country c ON v.idCountry = c.idCountry
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS viewVisaDetail");
    }
}