<?php

namespace App\Framework\Modules\Core\Services;

use Endroid\QrCode\QrCode;

class QrCodeService
{

	/**
	 * @var QrCode
	 */
	private QrCode $qrcode;

	/**
	 * @param string $data
	 *
	 * @return $this
	 */
	public function generate(string $data): static
	{
		$this->qrcode = new QrCode($data);
		return $this;
	}

	/**
	 * @param int $size
	 *
	 * @return $this
	 */
	public function size(int $size): static
	{
		$this->qrcode->setSize($size);
		return $this;
	}

	/**
	 * @param string $format
	 *
	 * @return $this
	 */
	public function format(string $format): static
	{
		$this->qrcode->setWriterByName($format);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getByImage(): string
	{
		return $this->qrcode->writeString();
	}

	/**
	 * @return string
	 */
	public function getByUrl(): string
	{
		return $this->qrcode->writeDataUri();
	}
}