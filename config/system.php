<?php

return [
    'pictures' => [
	    'mimes'         => 'jpeg,bmp,png,gif,svg',
	    'size'          => 2, //in MB
	    'message'       => 'Extensões permitidas: jpeg, png, bmp, gif ou svg. Tamanho máximo 2MB.',
    ],
    'documents' => [
	    'mimes'         => 'doc,docx,odt,pdf',
	    'size'          => 5, //in MB
	    'message'       => 'Extensões permitidas: doc, docx, odt, pdf. Tamanho máximo 5MB.',
    ],
    'spreadsheets' => [
	    'mimes'         => 'xlsx,xls,ods,csv',
	    'size'          => 5, //in MB
	    'message'       => 'Extensões permitidas: xlsx, xls, ods, csv. Tamanho máximo 1MB.',
    ],
];
