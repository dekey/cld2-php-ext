<?php

$cld2 = new \CLD2Detector();

$cld2->setTldHint('it'); // optional, hints about the Top level domain (it: italian, fr: french, de: german etc..)
$cld2->setLanguageHint(CLD2Language::GERMAN); // optional, hints about the language.
$cld2->setEncodingHint(CLD2Encoding::UTF8); // optional, hints about text encoding

var_dump($cld2->detect('My name is Melissa'));
