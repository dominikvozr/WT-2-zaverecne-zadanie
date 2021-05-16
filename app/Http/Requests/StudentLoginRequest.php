<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use mysql_xdevapi\Exception;

class StudentLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'required|string',
            'surname' => 'required|string',
            'ais'     => 'required|string',
            'code'    => 'required|string',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function authenticate() : Student {

        $student = Student::firstOrCreate([
            "ais_id" => $this->ais
        ]);

        if ($student->firstname === null) $student->firstname = $this->name;
        if ($student->lastname === null) $student->lastname = $this->surname;
        if ($student->firstname !== $this->name || $student->lastname !== $this->surname)
            throw ValidationException::withMessages([
                'test' => __('auth.ais_id_mismatch'),
            ]);


        $student->save();

        session(['student_name'    => $this->name]);
        session(['student_surname' => $this->surname]);
        session(['student_id'      => $student->id]);
        session(['ais_id'          => $this->ais]);

        return $student;
    }
}
