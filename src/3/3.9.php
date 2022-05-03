<?php

class Money
{
    private int $amount;
    // 本ではCurrencyクラスだけど、phpにはちょうどいいクラスはないのでとりあえずString
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
    }

    /**
     * 変更値を持ったMoneyクラスのインスタンスを作成する
     *
     * @param integer $other
     * @return Money
     */
    public function add(int $other) : Money
    {
        $added = $this->amount += $other;
        return new Money($added, $this->currency);
    }
}
