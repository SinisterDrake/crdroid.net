<?php
// Devices.xml reader by Gabriel Lup
$branch="8.1";
$GitHub_devices="https://raw.githubusercontent.com/crdroidandroid/android_vendor_crDroidOTA/" . $branch . "/update.xml";
file_put_contents("data", fopen($GitHub_devices, 'r'));
if (filesize('data') > 0) {
    rename('data','update.xml');
}

//echo "<h1>Parsing info from GitHub (branch " . $branch . ")</h2>";
if (file_exists('update.xml')) {
    $xml = simplexml_load_file('update.xml');
    foreach($xml as $manufacturer){
        //manufacturer
        echo "
            <div class='manufacturer'>
                <span class='ti-folder'> " . $manufacturer['id'] . "</span>
            </div>";
        
        //devices
        foreach ($manufacturer as $k => $v) {
            $build_date = explode("-", $v->filename);
            $maintainer_arr = $v->maintainer;
            $maintainer = explode("(", $maintainer_arr);
            if (isset($maintainer[1])) {
                $nick = str_replace(")","",$maintainer[1]);
            }else{
                $nick = null;
            }
            echo"<div class='device'>
                    <div class='main' id='" . $k . "'>
                        <span class='ti-mobile'> Device name: " . $v->devicename . "</span><br>
                        <span class='ti-receipt'> Device codename: " . $k . "</span></br>
                        <span class='ti-user'> Maintainer: " . $maintainer[0] . "</span><br>";
            if (!empty($nick)) {
                echo "<span class='ti-id-badge'> Nickname: " . $nick . "<span><br>";
            }
            echo "
                        <span class='ti-android'> crDroid version: " . $build_date[4] . "</span><br>
                        <span class='ti-calendar'> Last build: " . $build_date[2] . "</span><br>
                        <span class='ti-pencil-alt'> Build type: " . $v->buildtype . "<span><br>
                    </div>
                    <div class='dl'>";
            if (empty($v->download)) {
                echo "<a href='#downloads' class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Download crDroid</a>";
            }else{
                echo "<a href='" . $v->download . "' class='btn btn-dark' target='_blank' title='" . $v->filename . "'><span class='ti-import'></span> Download crDroid</a>";
            }
            if (empty($v->gapps)) {
                echo "<a href='#downloads' class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Google Apps</a>";
            }else{
                echo "<a href='" . $v->gapps . "' class='btn btn-orange' target='_blank'><span class='ti-package'></span> Google Apps</a>";
            }
            if (empty($v->forum)) {
                echo "<a href='#downloads' class='btn btn-disabled' title='Unavailable'><span class='ti-face-sad'></span> Support Forum</a>";
            }else{
                echo "<a href='" . $v->forum . "' class='btn btn-light' target='_blank'><span class='ti-comments-smiley'></span> Support Forum</a>";
            }
            echo "
                    </div>
                </div>";
        }
    }
} else {
    exit('Failed to read xml info.');
}
?>