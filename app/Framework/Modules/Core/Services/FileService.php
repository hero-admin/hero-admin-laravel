<?php


namespace App\Framework\Modules\Core\Services;


class FileService

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
	 * @return FileService
	 */
	public function from(string $from): static
	{
		$this->from = $from;
		return $this;
	}

	/**
	 * @param string $to
	 *
	 * @return FileService
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