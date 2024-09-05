<?php
defined('B_PROLOG_INCLUDED') || die;

use Bitrix\Main\{Loader, Localization\Loc};

IncludeModuleLangFile(__FILE__);

global $APPLICATION, $USER;

if (!$USER->IsAdmin()) {
    return;
}

$module_id = 'idea10.telegram.activity';
Loader::includeModule($module_id);

$tabs = [
    [
        'DIV'   => 'general',
        'TAB'   => Loc::GetMessage("IDEA10_GENERAL_TAB"),
        'TITLE' => Loc::GetMessage("IDEA10_GENERAL_TITLE")
    ]
];

$options = [
    'general' => [
        ["bot_name", GetMessage("IDEA10_BOT_NAME"), ["text", 15]],
        ["bot_token", GetMessage("IDEA10_BOT_TOKEN"), ["text", 15]]
    ]
];

if (check_bitrix_sessid() && strlen($_POST[ 'save' ]) > 0) {
    foreach ($options as $option) {
        __AdmSettingsSaveOptions($module_id, $option);
    }
    LocalRedirect($APPLICATION->GetCurPageParam());
}
$tabControl = new CAdminTabControl('tabControl', $tabs);
$tabControl->Begin();
?>
<form method="POST"
      action="<?php echo $APPLICATION->GetCurPage() ?>?lang=<?= LANGUAGE_ID ?>">
    <?php $tabControl->BeginNextTab(); ?>
    <?php __AdmSettingsDrawList($module_id, $options[ 'general' ]); ?>
    <?php $tabControl->Buttons(['btnApply' => false, 'btnCancel' => false, 'btnSaveAndAdd' => false]); ?>
    <?= bitrix_sessid_post(); ?>
    <?php $tabControl->End(); ?>
</form>
