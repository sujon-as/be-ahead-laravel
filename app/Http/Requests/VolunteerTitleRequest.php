<?php

namespace App\Http\Requests;

use App\Models\VolunteerTitle;
use Illuminate\Foundation\Http\FormRequest;

class VolunteerTitleRequest extends FormRequest
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

        if ($routeName === 'volunteer-titles.update') {
            return VolunteerTitle::updateRules();
        }

        return VolunteerTitle::rules($id);
    }
}
