<?php
class HitPoint
{
    private const MIN = 0;
    private const MAX = 999;

    private int $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN) {
            throw new \InvalidArgumentException(intval(self::MIN) . '以上を指定してください');
        }
        if ($value > self::MAX) {
            throw new \InvalidArgumentException(intval(self::MAX) . '以下を指定してください');
        }

        $this->value = $value;
    }

    /**
     * ダメージを受ける
     *
     * @param integer $damageAmount
     * @return HitPoint
     */
    public function damage(int $damageAmount): HitPoint
    {
        $damaged = $this->value - $damageAmount;
        $corrected = $damaged < self::MIN ? self::MIN : $damaged;
        return new HitPoint($corrected);
    }

    /**
     * 回復する
     *
     * @param integer $damageAmount
     * @return HitPoint
     */
    public function recover(int $recoverAmount): HitPoint
    {
        $recovered = $this->value + $recoverAmount;
        $corrected = $recovered < self::MAX ? self::MAX : $recovered;
        return new HitPoint($corrected);
    }
}
