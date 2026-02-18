<?php

namespace App\Http\Requests;

use App\Models\Volunteer;
use Illuminate\Foundation\Http\FormRequest;

class VolunteerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Get the route name and apply null-safe operator
        $routeName = $this->route()?->getName();

        $data = $this->route('slider');
        $id = $data?->id ?? null;

        if ($routeName === 'slider-status-update') {
            return Volunteer::serviceStausUpdateRules();
        }

        return Volunteer::rules($id);
    }
}
