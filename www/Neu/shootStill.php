<?php
$lastImgNum = file_get_contents('/var/www/html/share/www/lastImgNum.txt');
echo "lastImgNum read for this use is ".$lastImgNum."<br>";

//up the number by one
$lastImgNum+=1;
//write the new last used number
file_put_contents('/var/www/html/share/www/lastImgNum.txt', $lastImgNum);
echo "lastImgNum written for next use is ".$lastImgNum."<br>";

//construct file name with leading zeros
$imgName=str_pad($lastImgNum,6,"0",STR_PAD_LEFT);
echo "imgName for this use is ".$imgName."<br>";

//take still image with PiCamera and store it in '/var/www/img' directory
//edit the raspistill command here to taste but make sure not to remove the double quotes!
shell_exec("raspistill -t 1000 -o /var/www/html/share/www/img/".$imgName.".jpg");
echo "Shot image ".$imgName.".jpg<br>";

//write the filename to 'ajax_info.txt' so it will be shown in the browser using Ajax
$imgName="/img/".$imgName;
file_put_contents('/var/www/html/share/www/ajax_info.txt', $imgName);
echo "Saved ".imgName." to /var/www/html/share/www/ajax_info.txt <br>";

?>
