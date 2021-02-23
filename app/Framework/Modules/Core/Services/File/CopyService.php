<?php

namespace App\Framework\Modules\Core\Services\File;

class CopyService
{
	/**
	 * @var string
	 */
	private string $from;

	/**
	 * @var string
	 */
	private string $to;

	/**
	 * @param string $from
	 *
	 * @return CopyService
	 */
	public function from(string $from): static
	{
		$this->from = $from;
		return $this;
	}

	/**
	 * @param string $to
	 *
	 * @return CopyService
	 */
	public function to(string $to): static
	{
		$this->to = $to;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function copy(): bool
	{
		return copy($this->from, $this->to);
	}
}