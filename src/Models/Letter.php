<?php

namespace CTSoft\Laravel\LetterXpress\Models;

use Illuminate\Support\Carbon;

class Letter
{
    /**
     * The document.
     *
     * @var string
     */
    protected $document = null;

    /**
     * The receiver address.
     *
     * @var string
     */
    protected $address = null;

    /**
     * If the letter should be printed in color.
     *
     * @var bool
     */
    protected $color = false;

    /**
     * If the letter should be printed with duplex.
     *
     * @var bool
     */
    protected $duplex = false;

    /**
     * If the letter should be shipped international.
     *
     * @var bool
     */
    protected $international = false;

    /**
     * If the letter should be shipped in a C4 shipping bag.
     *
     * @var bool
     */
    protected $c4ShippingBag = false;

    /**
     * The dispatch date.
     *
     * @var Carbon
     */
    protected $dispatchDate = null;

    /**
     * The job id.
     *
     * @var int
     */
    protected $jobId = null;

    /**
     * The amount of pages.
     *
     * @var int|null
     */
    protected $pages = null;

    /**
     * The price of the job.
     *
     * @var float
     */
    protected $price = null;

    /**
     * The status of the job.
     *
     * @var string
     */
    protected $status = null;

    /**
     * The balance notice.
     *
     * @var string|null
     */
    protected $balanceNotice = null;

    /**
     * The timer notice.
     *
     * @var string|null
     */
    protected $timerNotice = null;

    /**
     * Set the document (file path).
     *
     * @param string $file
     * @return Letter
     */
    public function setFile(string $file): Letter
    {
        return $this->setDocument(file_get_contents($file));
    }

    /**
     * Get the document (file path or binary).
     *
     * @return string|null
     */
    public function getDocument(): ?string
    {
        return $this->document;
    }

    /**
     * Set the document (binary).
     *
     * @param string $document
     * @return Letter
     */
    public function setDocument(string $document): Letter
    {
        $this->document = $document;
        return $this;
    }

    /**
     * Get the receiver address.
     *
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Set the receiver address.
     *
     * @param string $address
     * @return Letter
     */
    public function setAddress(string $address): Letter
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Get if the letter should be printed in color.
     *
     * @return bool
     */
    public function isColor(): bool
    {
        return $this->color;
    }

    /**
     * Set if the letter should be printed in color.
     *
     * @param bool $color
     * @return Letter
     */
    public function setColor(bool $color): Letter
    {
        $this->color = $color;
        return $this;
    }

    /**
     * Get if the letter should be printed with duplex.
     *
     * @return bool
     */
    public function isDuplex(): bool
    {
        return $this->duplex;
    }

    /**
     * set if the letter should be printed with duplex.
     *
     * @param bool $duplex
     * @return Letter
     */
    public function setDuplex(bool $duplex): Letter
    {
        $this->duplex = $duplex;
        return $this;
    }

    /**
     * Get if the letter should be shipped international.
     *
     * @return bool
     */
    public function isInternational(): bool
    {
        return $this->international;
    }

    /**
     * Set if the letter should be shipped international.
     *
     * @param bool $international
     * @return Letter
     */
    public function setInternational(bool $international): Letter
    {
        $this->international = $international;
        return $this;
    }

    /**
     * Get if the letter should be shipped in a C4 shipping bag.
     *
     * @return bool
     */
    public function isC4ShippingBag(): bool
    {
        return $this->c4ShippingBag;
    }

    /**
     * Set if the letter should be shipped in a C4 shipping bag.
     *
     * @param bool $c4ShippingBag
     * @return Letter
     */
    public function setC4ShippingBag(bool $c4ShippingBag): Letter
    {
        $this->c4ShippingBag = $c4ShippingBag;
        return $this;
    }

    /**
     * Get the dispatch date.
     *
     * @return Carbon|null
     */
    public function getDispatchDate(): ?Carbon
    {
        return $this->dispatchDate;
    }

    /**
     * Set the dispatch date.
     *
     * @param Carbon|null $dispatchDate
     * @return Letter
     */
    public function setDispatchDate(?Carbon $dispatchDate): Letter
    {
        $this->dispatchDate = $dispatchDate;
        return $this;
    }

    /**
     * Get the job id.
     *
     * @return int|null
     */
    public function getJobId(): ?int
    {
        return $this->jobId;
    }

    /**
     * Set the job id.
     *
     * @param int $jobId
     * @return Letter
     */
    public function setJobId(int $jobId): Letter
    {
        $this->jobId = $jobId;
        return $this;
    }

    /**
     * Get the amount of pages.
     *
     * @return int|null
     */
    public function getPages(): ?int
    {
        return $this->pages;
    }

    /**
     * Set the amount of pages.
     *
     * @param int $pages
     * @return Letter
     */
    public function setPages(int $pages): Letter
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * Get the price of the job.
     *
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * Set the price of the job.
     *
     * @param float $price
     * @return Letter
     */
    public function setPrice(float $price): Letter
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get the status of the job.
     *
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Set the status of the job.
     *
     * @param string $status
     * @return Letter
     */
    public function setStatus(string $status): Letter
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Get the balance notice.
     *
     * @return string|null
     */
    public function getBalanceNotice(): ?string
    {
        return $this->balanceNotice;
    }

    /**
     * Set the balance notice.
     *
     * @param string $balanceNotice
     * @return Letter
     */
    public function setBalanceNotice(string $balanceNotice): Letter
    {
        $this->balanceNotice = $balanceNotice;
        return $this;
    }

    /**
     * Get the timer notice.
     *
     * @return string|null
     */
    public function getTimerNotice(): ?string
    {
        return $this->timerNotice;
    }

    /**
     * Set the timer notice.
     *
     * @param string $timerNotice
     * @return Letter
     */
    public function setTimerNotice(string $timerNotice): Letter
    {
        $this->timerNotice = $timerNotice;
        return $this;
    }
}
