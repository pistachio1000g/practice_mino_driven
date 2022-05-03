<?php
class Money
{
    private int $amount;
    // 本ではCurrencyクラスだけど、phpにはちょうどいいクラスはないのでとりあえずString
    private string $currency;

    public function __construct(int $amount, int $currency)
    {
        if ($amount < 0) {
            throw new \InvalidArgumentException('金額が0以上でありません');
        }
        // 本ではnullかどうかしか見ていないけど、空文字は間違いなく不正な値
        if ($currency == null || strlen($currency) < 0) {
            throw new \InvalidArgumentException('通貨を指定してください');
        }
    }
}
