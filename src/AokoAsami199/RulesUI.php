<?php
declare(strict_types=1);
namespace AokoAsami199;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\utils\Config;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacketV2;
use pocketmine\level\sound\PopSound;
use jojoe77777\FormAPI;
use jojoe77777\FormAPI\SimpleForm;

class RulesUI extends PluginBase implements Listener {
	
	public function onEnable() : void
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        
        @mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
       
	}
	
	public function onCommand(CommandSender $sender, Command $cmd, string $label,array $args): bool{
		switch($cmd->getName()){
			case "rules":
			if(!$sender instanceof Player){
                 $this->mainFrom($sender);
                }else{
                 $this->mainFrom($sender);
              }
                 break;
          }
		return true;
	}
	
	public function mainFrom($sender){
		$form = new SimpleForm(function (Player $sender, ?int $data){
		$result = $data;
		if($result === null){
			return true;
			}
			switch($result){
				case 0:
				break;
			}
		});					
		$form->setTitle($this->getConfig()->get("Title"));
		$form->setContent($this->getConfig()->get("Content"));
		$form->addButton($this->getConfig()->get("Button"), 0, "textures/ui/cancel");
		$form->sendToPlayer($sender);
	}
}
