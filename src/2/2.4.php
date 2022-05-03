<?php
// プレイヤーの攻撃力を合算する
function sumUpPlayerAttackPower(int $playerArmPower, int $playerWeaponPower): int
{
    return $playerArmPower + $playerWeaponPower;
}

// 敵の攻撃力を合算する
function sumUpEnemyDefence(int $enemyBodyDefence, int $enemyArmorDefence): int
{
    return $enemyBodyDefence + $enemyBodyDefence;
}

// ダメージ量を評価する
function estimateDamage(int $totalPlayerPower, int $totalEnemyDefence): int
{
    $damegeAmount = $totalPlayerPower - ($totalEnemyDefence / 2);
    if ($damegeAmount < 0) {
        return 0;
    }

    return $damegeAmount;
}
