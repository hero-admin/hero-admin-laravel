<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UserRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	#[ArrayShape(['email' => "required|string", 'password' => "required|string"])]
	public function rules(): array
	{
		return ['email' => 'required|string|email', 'password' => 'required|string'];
	}
}
