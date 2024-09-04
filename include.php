<?php
CModule::AddAutoloadClasses(
    'idea10.telegram.activity',
    [
        'Idea10\Helpers\HelperUser'     => 'lib/Helpers/HelperUser.php',
        'Idea10\Helpers\HelperDeal'     => 'lib/Helpers/HelperDeal.php',
        'Idea10\Helpers\HelperTelegram' => 'lib/Helpers/HelperTelegram.php',
    ]
);
