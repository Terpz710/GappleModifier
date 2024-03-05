<?php

declare(strict_types=1);

namespace Terpz710\GappleModifier;

use pocketmine\plugin\PluginBase;
use pocketmine\item\GoldenAppleEnchanted;
use pocketmine\entity\effect\EffectInstance;
use pocketmine\entity\effect\VanillaEffects;

class Loader extends PluginBase {

    public function onEnable() : void {
        $config = $this->getConfig()->getAll();

        $regenerationDuration = $config['regeneration_duration'] ?? 600;
        $regenerationAmplifier = $config['regeneration_amplifier'] ?? 4;
        $absorptionDuration = $config['absorption_duration'] ?? 2400;
        $absorptionAmplifier = $config['absorption_amplifier'] ?? 3;
        $resistanceDuration = $config['resistance_duration'] ?? 6000;
        $fireResistanceDuration = $config['fire_resistance_duration'] ?? 6000;

        GoldenAppleEnchanted::$effects = [
            new EffectInstance(VanillaEffects::REGENERATION(), $regenerationDuration, $regenerationAmplifier),
            new EffectInstance(VanillaEffects::ABSORPTION(), $absorptionDuration, $absorptionAmplifier),
            new EffectInstance(VanillaEffects::RESISTANCE(), $resistanceDuration),
            new EffectInstance(VanillaEffects::FIRE_RESISTANCE(), $fireResistanceDuration)
        ];
    }
}