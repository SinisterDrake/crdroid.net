<?php
# this code is to simply get XML from GitHub address defined by branch name below
$branch="8.1";
$GitHub_devices="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crDroidOTA/" . $branch . "/update.xml";

function Parse ($url) {
	$fileContents= file_get_contents($url);
	$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
	$fileContents = trim(str_replace('"', "'", $fileContents));
	$simpleXml = simplexml_load_string($fileContents);
	$json = json_encode($simpleXml);
	return $json;
}
print Parse($GitHub_devices);
?>