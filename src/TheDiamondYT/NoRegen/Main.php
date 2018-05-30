<?php

namespace TheDiamondYT\NoRegen;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\EntityRegainHealthEvent;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->saveDefaultConfig();
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    public function onRegainHealth(EntityRegainHealthEvent $ev) {
        $reason = $ev->getRegainReason();
        $bypass = $ev->getPlayer()->hasPermission("noregen.bypass");
        
        if($reason === EntityRegainHealthEvent::CAUSE_REGEN && !$bypass) {
            $ev->setCancelled(true);
        }
        if($reason === EntityRegainHealthEvent::CAUSE_MAGIC && !$bypass) {
            $ev->setCancelled(true);
        }
        if($reason === EntityRegainHealthEvent::CAUSE_CUSTOM && !$bypass) {
            $ev->setCancelled(true);
        }
        if($reason === EntityRegainHealthEvent::CAUSE_SATURATION && !$bypass) {
            $ev->setCancelled(true);
        }
    }
}
