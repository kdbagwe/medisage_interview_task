<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\SearchStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function index(SearchStudentRequest $request, Student $students)
    {
        $students = $students->newQuery();

        $students = $students->when($request->has('searchInput'), function($query) use($request) {

            $query->where('name', 'LIKE', "%{$request->searchInput}%")
                ->orWhere('phone_number', 'LIKE', "%{$request->searchInput}%")
                ->orWhere('email', 'LIKE', "%{$request->searchInput}%")
                ->orWhere('country', 'LIKE', "%{$request->searchInput}%")
                ->orWhere('country_code', 'LIKE', "%{$request->searchInput}%");
        });

        $students = $students->latest()->get();

        return StudentResource::collection($students);
    }

    public function store(AddStudentRequest $request)
    {
        $countryName = $this->getCountryName($request->countryCode);

        $student = Student::create([
            'name' => $request->name,
            'phone_number' => $request->phoneNumber,
            'email' => $request->email,
            'country' => $countryName,
            'country_code' => $request->countryCode
        ]);

        return new StudentResource($student);
    }

    public function getCountryName($countryCode)
    {
        $countryDetails = Http::get("https://restcountries.com/v2/callingcode/{$countryCode}");

        if ($countryDetails->status() !== 200) {

            Log::error("Failed to get country data for country code: {$countryCode} \n {$countryDetails}");

            throw ValidationException::withMessages([
                'country_code' => 'Invalid Country Code.'
            ]);
        }

        return $countryDetails->json()[0]['name'];
    }
}
