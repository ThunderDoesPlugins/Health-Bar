<?php
namespace Thunder33345\HealthBarLite;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener
{
	function onEnable()
	{
		$this->getServer()->getLogger()->info("[HealthBarLite] HealthBarLite by Thunder33345 Loaded");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getServer()->getScheduler()->scheduleRepeatingTask(new HealthBarTask($this), 10);
	}

	public function onDisable()
	{
	}

	public function onJoin(PlayerJoinEvent $event)
	{
	}

}
