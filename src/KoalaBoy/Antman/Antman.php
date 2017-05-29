<?php

namespace KoalaBoy\Antman;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\entity\Entity;
use pocketmine\{Server, Player};

class Antman extends PluginBase{
	
    public function onEnable(){
        $this->getLogger()->info("§6» Antman v2.0.0 by KoalaBoy");
    }
    
   public function onCommand(CommandSender $sender, Command $cmd, $label, array $args) {
        if($sender instanceof Player) {
            switch ($cmd->getName()) {
                case "antman":
                    if(empty($args[0])) {
                    	if($sender->hasPermission("antman")) {
                        $sender->sendMessage("§bAntman Commands :");
                        $sender->sendMessage("§e/antman <antman:ant> Make you become Ant-Man.");
                        $sender->sendMessage("§e/antman <giantman:giant> Make you become Giant-Man.");
                        $sender->sendMessage("§e/antman <wasp> Make you become Wasp.");
                        $sender->sendMessage("§7/antman <normal:reset> Back to normal size.");
                    }else{
                 	   $sender->sendMessage("§c» You don't have permission to use this command.");
                    }
                    break;
                 }
                    switch (strtolower($args[0])) {
                        case "antman":
                        case "ant":
                            if($sender->hasPermission("antman")) {
                                $sender->sendMessage("§a» You become Ant-Man!");
								$sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 0.2);
								$sender->setAllowFlight(false);
                            }else{
                            	$sender->sendMessage("§c» You don't have permission to use this command.");
                                     }
                            break;
                        case "giant":
                        case "giantman":
                            if($sender->hasPermission("antman")) {
                                $sender->sendMessage("§a» You become Giant-Man!");
								$sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 10);
								$sender->setAllowFlight(false);
                            }else{
                            	$sender->sendMessage("§c» You don't have permission to use this command.");
                                     }
                            break;
                        case "wasp":
                            if($sender->hasPermission("antman")) {
                                $sender->sendMessage("§6» You become Wasp!");
								$sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 0.2);
								$sender->setAllowFlight(true);
                            }else{
                            	$sender->sendMessage("§c» You don't have permission to use this command.");
                                     }
                            break;
					    case "normal":
					    case "reset":
                            if($sender->hasPermission("antman")) {
                                $sender->sendMessage("§c» Now you are normal size!");
								$sender->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1);
								$sender->setAllowFlight(false);
                            }else{
                            	$sender->sendMessage("§c» You don't have permission to use this command.");
                                     }
                            break;
                }	
			}
		}
    }
}
