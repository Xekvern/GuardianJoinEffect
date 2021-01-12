<?php

namespace GuardianJoinEffect;

use pocketmine\event\Listener;
use pocketmine\utils\Config;
use pocketmine\plugin\PluginBase;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }
    
    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $this->getScheduler()->scheduleDelayedTask(new ElderGuardianTask($this, $player), 30);
    }
}
