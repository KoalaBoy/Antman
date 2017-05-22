<?php

namespace KoalaBoy\Antman;

use pocketmine\plugin\PluginBase;
use pocketmine\command\{Command, CommandSender};
use pocketmine\entity\Entity;
use pocketmine\{Server, Player};

class Antman extends PluginBase{
    
    public $b = array();
    public function onEnable(){
        $this->getLogger()->info("§6» Antman v1.1 by KoalaBoy");
        $this->getServer()->getCommandMap()->register("antman", new Cmd($this));
    }
    
    public function respawn(PlayerRespawnEvent $e){
        $o = $e->getPlayer();
        if(!empty($this->b[$o->getName()])){
            $size = $this->b[$o->getName()];
            $o->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, $size);
        }
    }
}

class Cmd extends Command{
    
    private $p;
    public function __construct($plugin){
        $this->p = $plugin;
        parent::__construct("antman", "Antman by KoalaBoy");
    }
    
    public function execute(CommandSender $g, $label, array $args){
        if($g->hasPermission("antman")){
            if(isset($args[0])){
                if($args[0] == "on"){
                    $this->p->b[$g->getName()] = $args[0];
                    $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 0.2);
                    $g->sendMessage("§a» Antman turn on");
                }elseif($args[0] == "off"){
                    if(!empty($this->p->b[$g->getName()])){
                        unset($this->p->b[$g->getName()]);
                        $g->setDataProperty(Entity::DATA_SCALE, Entity::DATA_TYPE_FLOAT, 1);
                        $g->sendMessage("§c» Antman turn off");
                    }else{
                        $g->sendMessage("§a» Antman turn on");
                    }
                }else{
                    $g->sendMessage("§c» Use /antman <on:off>");
                }
            }
        }
    }
}