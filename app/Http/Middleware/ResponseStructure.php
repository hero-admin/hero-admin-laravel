<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ResponseStructure
{
	/**
	 * Handle an incoming request.
	 *
	 * @param Request $request
	 * @param Closure $next
	 *
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next): mixed
	{
		$response = $next($request);

		$newContent = [
			'message' => $response->getOriginalContent(),
			'context' => [
				'code' => $response->getStatusCode(),
			],
		];

		return $response->setContent(collect($newContent)->toJson());
	}
}
