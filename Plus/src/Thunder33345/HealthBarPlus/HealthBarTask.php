<?php
namespace Thunder33345\HealthBarPlus;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\scheduler\PluginTask;
use pocketmine\Plugin;
use pocketmine\utils\TextFormat;

class HealthBarTask extends PluginTask
{
	var $data;

	public function __construct($plugin)
	{
		parent::__construct($plugin);
	}

	public function onRun($tick)
	{
		foreach ($this->getOwner()->getServer()->getOnlinePlayers() as $p) {
			$player = $p;
			$data = $this->data;
			$pmh = $player->getMaxHealth();
			$ph = (round($player->getHealth()));
			// 2 4 6 8 10
			 $math = $ph / $pmh;
			 $res = $math * 100;
			switch ($res) {
				case $res <= 100 && $res >= 80;
					$data = TextFormat::GREEN."[$ph/$pmh]";
					break;
				case $res <= 79 && $res >= 60;
					$data = TextFormat::DARK_GREEN."[$ph/$pmh]";
					break;
				case $res <= 59 && $res >= 40;
					$data = TextFormat::GOLD."[$ph/$pmh]";
					break;
				case $res <=39 && $res >= 20;
					$data = TextFormat::RED."[$ph/$pmh]";
					break;
				case $res <=19 && $res >=0;
					$data = TextFormat::DARK_RED."[$ph/$pmh]";
					break;
				default;
					$data = "[$ph/$pmh]";
					break;
			}
			$p->setNametag($p->getDisplayName().TextFormat::RESET."\n".$data);
		}
	}
}
