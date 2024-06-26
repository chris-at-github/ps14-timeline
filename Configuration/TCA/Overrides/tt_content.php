<?php

// ---------------------------------------------------------------------------------------------------------------------
// Modul in TYPO3 tt_content registrieren
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'LLL:EXT:ps14_timeline/Resources/Private/Language/locallang_tca.xlf:title',
		'ps14_timeline',
		'ps14-module-timeline'
	),
	'CType',
	'ps14_timeline'
);

// ---------------------------------------------------------------------------------------------------------------------
// Modul TCA anpassen

// Felddefinitionen
$GLOBALS['TCA']['tt_content']['types']['ps14_timeline']['showitem'] = \Ps14\Site\Service\TcaService::getShowitem(
	['general', 'appearance', 'language', 'access', 'categories', 'notes', 'extended'],
	[
		'general' => '--palette--;;general, --palette--;;headers, --palette--;;foundation_identifier, bodytext, tx_foundation_elements,'
	]
);

// Bodytext mit CKEditor rendern
$GLOBALS['TCA']['tt_content']['types']['ps14_timeline']['columnsOverrides']['bodytext']['config'] = [
	'enableRichtext' => true,
	'richtextConfiguration' => 'ps14Default',
];

// ---------------------------------------------------------------------------------------------------------------------
// Elements TCA anpassen

// Definition Record
$GLOBALS['TCA']['tt_content']['types']['ps14_timeline']['columnsOverrides']['tx_foundation_elements']['config']['overrideChildTca'] = [
	'columns' => [
		'record_type' => [
			'config' => [
				'items' => [
					[
						'label' => 'LLL:EXT:ps14_timeline/Resources/Private/Language/locallang_tca.xlf:elements.record-type.default',
						'value' => 'ps14_timeline_default'
					],
				],
				'default' => 'ps14_timeline_default'
			]
		],
		'description' => [
			'config' => [
				'richtextConfiguration' => 'ps14Minimal'
			]
		],
		'media' => [
			'config' => [
				'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
				'maxitems' => 3
			]
		],
	],
	'types' => [
		'ps14_timeline_default' => [
			'showitem' => \Ps14\Site\Service\TcaService::getShowitem(
				['general', 'appearance', 'access'],
				[
					'general' => '--palette--;;general, tx_timeline_date, --palette--;;header, description, media,'
				],
				'tx_foundation_domain_model_elements'
			)
		],
	]
];