<?php
namespace Thunder33345\HealthBarLite;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\Plugin;

class HealthBarTask extends PluginTask
{
	public function __construct($plugin)
	{
		parent::__construct($plugin);
	}

	public function onRun($tick)
	{
		foreach ($this->getOwner()->getServer()->getOnlinePlayers() as $p) {
			$player = $p;
			$insert = "\nHealth: " . (round($player->getHealth())) . "/" . $player->getMaxHealth();
			$p->setNametag($p->getDisplayName().$insert);
		}
	}
}
