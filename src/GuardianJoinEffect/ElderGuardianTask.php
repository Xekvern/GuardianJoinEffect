<?php

namespace GuardianJoinEffect;

use pocketmine\scheduler\Task as PluginTask;
use pocketmine\Server;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\math\Vector3;
use pocketmine\level\Level;
use pocketmine\level\Position;
use pocketmine\network\mcpe\protocol\LevelEventPacket;

class ElderGuardianTask extends PluginTask {

	private $player;
	private $plugin;

	public function __construct(Main $plugin, Player $player){
        $this->plugin = $plugin;
		    $this->player = $player;
	}
	
	public function onRun(int $currentTick){
		$pk = new LevelEventPacket();
		$pk->evid = LevelEventPacket::EVENT_GUARDIAN_CURSE;
		$pk->data = 0;
		$pk->position = $this->player->asVector3();
		$this->player->dataPacket($pk);
	}
}
