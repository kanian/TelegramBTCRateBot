<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commands;

use App\Commands\Command;
/**
 * Description of TelegramBotCommand
 *
 * @author Patrick Assoa Adou (patrick.assoa.adou@gmail.com)
 */
abstract class TelegramBotCommand extends Command implements  \Telegram\Bot\Commands\CommandInterface{
    
    private $_telegram = NULL;
    
    /**
     * The name of the Telegram command.
     * Ex: help - Whenever the user sends /help, this would be resolved.
     *
     * @var string
     */
    protected $name;

    /**
     * @var string The Telegram command description.
     */
    protected $description;


    /**
     * @var string Arguments passed to the command.
     */
    protected $arguments;

    /**
     * @var Update Holds an Update object.
     */
    protected $update;

    
    public function __construct(){
        $this->_telegram = app('App\Adapters\TelegramBotApiAdapter')->Instance();
        parent::__construct(API_URL);
    }
    
        /**
     * Get Command Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set Command Name.
     *
     * @param $name
     *
     * @return Command
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Command Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set Command Description.
     *
     * @param $description
     *
     * @return Command
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

     /**
     * Sets Original Update.
     *
     * @return Command
     */
     public function setUpdate($update)
    {
        $this->update = $update;
        
        return $this;
    }
    
    /**
     * Returns Original Update.
     *
     * @return Update
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * Get Arguments passed to the command.
     *
     * @return string
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Returns Telegram Instance.
     *
     * @return Api
     */
    public function getTelegram(){
        return $_telegam;
    }
    public function replyWithMessage($params){
        return $this->jsonPostRequest("sendMessage", $params);
    }
    
    public function replyWithChatAction($params){
        return $this->postRequest('sendChatAction', $params);
    }

    public function make($telegram, $arguments, $update)
    {
        $this->telegram = $telegram;
        $this->arguments = $arguments;
        $this->update = $update;

        return $this->handle($arguments);
    }
    
    /**
     * {@inheritdoc}
     */
    abstract public function handle($arguments);
    
    // Trigger another command dynamically from within this command
        // When you want to chain multiple commands within one or process the request further.
        // The method supports second parameter arguments which you can optionally pass, By default
        // it'll pass the same arguments that are received for this command originally.
        //$this->triggerCommand('subscribe');
}
