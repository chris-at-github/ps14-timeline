<?php
// ---------------------------------------------------------------------------------------------------------------------
// Weitere Felder fuer Elements

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_foundation_domain_model_elements', [
	'tx_timeline_date' => [
		'exclude' => true,
		'l10n_mode' => 'exclude',
		'label' => 'LLL:EXT:ps14_timeline/Resources/Private/Language/locallang_tca.xlf:elements.date',
		'config' => [
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim',
		]
	],
]);