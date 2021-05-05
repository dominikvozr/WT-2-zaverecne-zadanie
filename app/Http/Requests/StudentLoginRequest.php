<?php

namespace App\Http\Requests;

use App\Models\Student;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

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
            'name' => 'required|string',
            'surname' => 'required|string',
            'aisid' => 'required|string',
            'code' => 'required|string',
        ];
    }

    public function authenticate() : Student {

        $student = Student::firstOrCreate([
            "name" => $this->name,
            "surname" => $this->surname,
            "ais_id" => $this->aisid
        ]);

        session(['student_name'    => $this->name]);
        session(['student_surname' => $this->surname]);
        session(['ais_id'       => $this->aisid]);

        return $student;
    }
}
