<?php

return [
	
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	
	'font_path' => base_path('resources/fonts/'),
	'font_data' => [
		'bangla' => [
			'R'  => 'kalpurush.ttf',    // regular font
			'B'  => 'SolaimanLipi_22-02-2012.ttf',       // optional: bold font
			'I'  => 'SolaimanLipi_22-02-2012.ttf',     // optional: italic font
			'BI' => 'SolaimanLipi_22-02-2012.ttf' // optional: bold-italic font 
			//'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			//'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
		]
	]
	
];
