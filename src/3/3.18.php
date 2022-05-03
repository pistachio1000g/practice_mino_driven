<?php

class Money
{
    private int $amount;
    private string $currency;

    public function __construct(int $amount, string $currency)
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException('金額が0以上でありません');
        }
        // 本ではnullかどうかしか見ていないけど、空文字は間違いなく不正な値
        if ($currency == null || strlen($currency) < 0) {
            throw new \InvalidArgumentException('通貨を指定してください');
        }

        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * 変更値を持ったMoneyクラスのインスタンスを作成する
     *
     * @param Money $other
     * @return Money
     */
    public function add(Money $other) : Money
    {
        if ($this->currency !== $other->getCurrency()) {
            throw new \InvalidArgumentException('通貨単位が違います');
        }
        $added = $this->amount += $other->getAmount;
        return new Money($added, $this->currency);
    }

    // 本当はreadonlyにしたいけど......
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
