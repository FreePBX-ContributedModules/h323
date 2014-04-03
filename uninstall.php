<?php
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }

global $amp_conf;

$name_conf = "#include h323_additional.conf";

if (unlink($amp_conf['ASTETCDIR'].'/h323_additional.conf')){
	out(sprintf(_("File %s deleted"),  $amp_conf['ASTETCDIR'].'/h323_additional.conf'));
}


if (file_exists($amp_conf['ASTETCDIR'].'/h323.conf')){
	$file = fopen($amp_conf['ASTETCDIR'].'/h323.conf', "r"); 
	$out = fopen($amp_conf['ASTETCDIR'].'/h323.conf.buff', "w"); 
	if ($file) { 
		if($out){
		while (!feof($file)) { 
			$ch = fgetc ($file);
			if ($ch=='#'){
			    $buff= fgets ($file,29);
			    $buff = $ch.$buff;
			    if($buff!=$name_conf) fwrite($out,$buff);
			}else
			fwrite($out,$ch);
			
		    }
		fclose($out);
		}
		fclose ($file);
	}
}

if(unlink($amp_conf['ASTETCDIR'].'/h323.conf')){
    rename ($amp_conf['ASTETCDIR'].'/h323.conf.buff',$amp_conf['ASTETCDIR'].'/h323.conf');
}

?>
