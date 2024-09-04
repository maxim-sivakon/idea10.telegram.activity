<?php
defined('B_PROLOG_INCLUDED') || die;

use Bitrix\Main\Application;
use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

IncludeModuleLangFile(__FILE__);

class idea10_telegram_activity extends CModule
{
    const MODULE_ID = 'idea10.telegram.activity';
    var $MODULE_ID = self::MODULE_ID;
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $MODULE_CSS;
    var $strError  = '';

    function __construct()
    {
        $arModuleVersion = [];
        include(dirname(__FILE__).'/version.php');
        $this->MODULE_VERSION = $arModuleVersion[ 'VERSION' ];
        $this->MODULE_VERSION_DATE = $arModuleVersion[ 'VERSION_DATE' ];

        $this->MODULE_NAME = Loc::GetMessage("IDEA10_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::GetMessage("IDEA10_MODULE_DESCRIPTION");

        $this->PARTNER_NAME = Loc::GetMessage("IDEA10_PARTNER_NAME");
        $this->PARTNER_URI = Loc::GetMessage("IDEA10_PARTNER_URI");
    }

    function DoInstall()
    {
        ModuleManager::registerModule(self::MODULE_ID);

        $this->InstallActivity();
    }

    function DoUninstall()
    {
        $this->UnInstallActivity();

        ModuleManager::unRegisterModule(self::MODULE_ID);
    }

    function InstallActivity()
    {
//        $documentRoot = Application::getDocumentRoot();
//
//        CopyDirFiles(
//            __DIR__.'/components',
//            $documentRoot.'/local/components',
//            true,
//            true
//        );
    }

    function UnInstallActivity()
    {
//        DeleteDirFilesEx('/local/components/');
    }
}