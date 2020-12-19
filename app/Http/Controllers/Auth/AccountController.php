<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return JsonResponse|string
	 */
	public function index(): JsonResponse|null
	{
		return User::all();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 *
	 * @return Model|array|Collection|Response|Builder
	 */
	public function store(Request $request): Model|array|Collection|Response|Builder
	{
		return User::query()
		           ->create($request->all())
		           ->get();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int $id
	 *
	 * @return Builder|Builder[]|Collection|Model|Response
	 */
	public function show(int $id): Model|Collection|Response|Builder|array
	{
		return User::query()
		           ->findOrFail($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param int     $id
	 *
	 * @return bool|Response|int
	 */
	public function update(Request $request, int $id): Response|bool|int
	{
		return User::query()
		           ->findOrFail($id)
		           ->update($request->all());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int $id
	 *
	 * @return Response|int
	 */
	public function destroy(int $id): Response|int
	{
		return User::destroy($id);
	}
}
