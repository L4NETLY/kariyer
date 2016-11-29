<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 28.11.2016
 * Time: 15:01
 * @author İbrahim Fidan
 */

## Kariyer.net Domain URL ##
$site = file_get_contents('http://www.kariyer.net/mysilo-tahil-depolama-sistemleri-a-s-is-ilanlari-c2007-p11055/');

## Bring advertisements from URL ##
preg_match_all('@<tr id="trIlanno">(.*?)</tr>@si', $site, $job);

## count job array ##
$count = count($job);

## From Kariyer.net Processes all job advertisements
foreach ($job[0] as $jobs => $j){
    $v = current($job[$jobs]);

    // clear items
    $search = array('<tr id="trIlanno">', '<td>','</td>','<td height="26">','<td id="tdsonIncelenen">','</tr>');
    $replace = array('','','','','','');

    $arr = str_replace($search, $replace, $v);

    $chars = preg_split('/(<[^>]*[^\/]>)/i', $arr, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    $quickJob = $chars[1].$chars[2].$chars[3];
    $quickCountry = $chars[5].$chars[6].$chars[7];
    $quickCompany = $chars[8];
    echo "İş Alanı : ".$quickJob."<br />";
    echo 'İl : '.$quickCountry."<br />";
    echo 'Şirket : '.$quickCompany."<br />";

}

?>

