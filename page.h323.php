<?php /* $Id */
if (!defined('FREEPBX_IS_AUTH')) { die('No direct script access allowed'); }
/* 
 * Copyright (C) 2012 Nikolay Nikolaev (3ABXO3)
 * Email: evrinoma@gmail.com
 * 
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of version 2 the GNU General Public
 * License as published by the Free Software Foundation.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 */

$form = array('1'     => 'UnComment','2'     => 'Comment','3'     => 'Disallow all','4'     => 'Allow all');
$tabindex =0;
if (isset($_REQUEST['save'])  &&  $_REQUEST['save'] == 'Save'){
	$H323=OnClickH323Save($H323);
	needreload();
}elseif(isset($_REQUEST['default'])  &&  $_REQUEST['default'] == 'Default') {
	$H323=GetH323DefaultSettings($H323);
}else{
	$H323=GetH323CurrentSettings($H323);
}
?>

<h2><?php echo _("The NuFone Network's Open H.323 driver configuration")?></h2>
<form autocomplete="off" name="edith323" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
	<table id="h323optionstable">
		<body>
			<tr><td colspan="3"><h5><?php echo _("General settings")?><hr/></h5></td></tr>
			<tr>
				<td><a href="#" class="info"><?php echo _("Port")?>:<span><?php echo _("Default value 1720")?></span></a></td>
				<td><input size="30" type="text" name="port" id="port" value=<?php echo $H323['port'];?> tabindex="<?php echo ++$tabindex;?>"></td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Bind Address")?>:<span><?php echo _("This SHALL contain a single, valid IP address for this machine")?></span></a></td>
				<td><input class="bindaddr-no" size="30" type="text" name="bindaddr" id="bindaddr" value=<?php echo $H323['bindaddr'];?> disabled  tabindex="<?php echo ++$tabindex;?>">
				<div  class="bindaddr-yes"><?php echo "[ ;" . $H323['bindaddr'] ." ]";?></div>
				</td>
				<td>
				<input class="bindaddr-yes" name="bindaddr_check_yes" type="button" id="bindaddr_check_yes" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['bindaddr'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="bindaddr-no" name="bindaddr_check_no" type="button" id="bindaddr_check_no" value="<?php echo $form[2];?>" 
				<?php echo (($H323['commentmap']['bindaddr'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr> 
			<tr>
			<td><a href="#" class="info"><?php echo _("TOS audio")?>:<span><?php echo _("Sets TOS for RTP audio packets.")?></span></a></td>
				<td><select class="tos_audio-no" name="tos_audio" id="tos_audio" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="cs3"  <?php echo (($H323['tos_audio'] == "cs3")?'selected="yes"':'');?>  >cs3</option>
					<option value="ef"   <?php echo (($H323['tos_audio'] == "ef")?'selected="yes"':'');?>  >ef</option>
					<option value="af41" <?php echo (($H323['tos_audio'] == "af41")?'selected="yes"':'');?>  >af41</option>
				</select>
				<div  class="tos_audio-yes"><?php echo "[ ;" . $H323['tos_audio'] ." ]" ;?></div>
				</td>
				<td>
				<input class="tos_audio-yes" name="tos_audio_check_yes" type="button" id="tos_audio_check_yes" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['tos_audio'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="tos_audio-no" name="tos_audio_check_no" type="button" id="tos_audio_check_no" value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['tos_audio'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("COS audio")?>:<span><?php echo _("Sets 802.1p priority for RTP audio packets.")?></span></a></td>
				<td><select class="cos_audio-no" name="cos_audio" id="cos_audio" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="3"  <?php echo (($H323['cos_audio'] == "3")?'selected="yes"':'');?>  >3</option>
					<option value="4"  <?php echo (($H323['cos_audio'] == "4")?'selected="yes"':'');?>  >4</option>
					<option value="5"  <?php echo (($H323['cos_audio'] == "5")?'selected="yes"':'');?>  >5</option>
				</select>
				<div  class="cos_audio-yes"><?php echo "[ ;" . $H323['cos_audio'] ." ]" ;?></div>
				</td>
				<td>
				<input class="cos_audio-yes" name="cos_audio_check_yes" id="cos_audio_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['cos_audio'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="cos_audio-no" name="cos_audio_check_no" id="cos_audio_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['cos_audio'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Amaflags")?>:<span><?php echo _("You may specify a global default AMA flag for iaxtel calls.</br> It must be one of 'default', 'omit', 'billing', or 'documentation'.</br>These flags are used in the generation of call detail records.")?></span></a></td>
				<td><select class="amaflags-no" name="amaflags" id="amaflags" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="default"		<?php echo (($H323['amaflags'] == "default")?'selected="yes"':'');?>  >default</option>
					<option value="omit"		<?php echo (($H323['amaflags'] == "omit")?'selected="yes"':'');?>  >omit</option>
					<option value="billing"		<?php echo (($H323['amaflags'] == "billing")?'selected="yes"':'');?>  >billing</option>
					<option value="documentation"	<?php echo (($H323['amaflags'] == "documentation")?'selected="yes"':'');?>  >documentaion</option>
				</select>
				<div  class="amaflags-yes"><?php echo "[ ;" . $H323['amaflags'] ." ]" ;?></div>
				</td>
				<td>
				<input class="amaflags-yes" name="amaflags_check_yes" id="amaflags_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['amaflags'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="amaflags-no" name="amaflags_check_no" id="amaflags_check_no" type="button"  value="<?php echo $form[2];?>"
				<?php echo (($H323['commentmap']['amaflags'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
				<td><a href="#" class="info"><?php echo _("Accountcode")?>:<span><?php echo _("You may specify a default account for Call Detail Records in addition to specifying on a per-user basis")?></span></a></td>
				<td><input class="accountcode-no" size="30" type="text" name="accountcode" id="accountcode" value=<?php echo $H323['accountcode'];?> disabled tabindex="<?php echo ++$tabindex;?>">
				<div  class="accountcode-yes"><?php echo "[ ;" . $H323['accountcode'] ." ]" ;?></div>
				</td>
				<td>
				<input class="accountcode-yes" name="accountcode_check_yes" id="accountcode_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['accountcode'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="accountcode-no" name="accountcode_check_no" id="accountcode_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['accountcode'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td colspan="3"><h5><?php echo _("Audio codecs settings")?><hr/></h5></td></tr>
				<td><a href="#" class="info"><?php echo _("Codecs")?>:<span><?php echo _("Check the desired codecs, all others will be disabled unless explicitly enabled in a device or trunks configuration.</br> Drag to re-order.")?></span></a></td>
				<td><table><tr class="codec_check-no"><td>
				<!-- <span class="radioset" > -->
				<input name="codec_setter" class="h323_button" type="radio" id="codec_check_disall"  value="disallow_all" 
				<?php echo (($H323['codecs'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<label for="codec_check_disall"><?php echo _($form[3])?></label>
				<input name="codec_setter" type="radio" id="codec_check_enall"  value="allow_all" 
				<?php echo (($H323['codecs'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<label for="codec_check_enall"><?php echo _($form[4])?></label>
				<!-- </span> -->
				</td></tr></table></td>
				<td ><input class="codec_check-yes" name="codec_check_yes" id="codec_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['codecs'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="codec_check-no" name="codec_check_no" id="codec_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['codecs'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
				<tr  class="codec_check-no"><td></td><td>
				<table><tr><td>
				<ul class="sortable">
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="ulaw_disallow" name="ulaw_disallow" id="ulaw_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>" 
				<?php echo (($H323['codecs_disallow'][ulaw_disallow] == 1)?'checked':'');?> disabled/>
				<label for="ulaw_disallow"> <small>ulaw</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" />
				<input type="checkbox" value="alaw_disallow" name="alaw_disallow" id="alaw_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>" 
				<?php echo (($H323['codecs_disallow'][alaw_disallow] == 1)?'checked':'');?> disabled/>
				<label for="alaw_disallow"> <small>alaw</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="gsm_disallow" name="gsm_disallow" id="gsm_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][gsm_disallow] == 1)?'checked':'');?> disabled/>
				<label for="gsm_disallow"> <small>gsm</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="siren14_disallow" name="siren14_disallow" id="siren14_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][siren14_disallow] == 1)?'checked':'');?> disabled/>
				<label for="siren14_disallow"> <small>siren14</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="lpc10_disallow"  name="lpc10_disallow" id="lpc10_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][lpc10_disallow] == 1)?'checked':'');?> disabled/>
				<label for="lpc10_disallow"> <small>lpc10</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox"  value="speex_disallow" name="speex_disallow" id="speex_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][speex_disallow] == 1)?'checked':'');?> disabled/>
				<label for="speex_disallow"> <small>speex</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g722_disallow" name="g722_disallow" id="g722_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][g722_disallow] == 1)?'checked':'');?> disabled/>
				<label for="g722_disallow"> <small>g722</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="adpcm_disallow" name="adpcm_disallow" id="adpcm_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][adpcm_disallow] == 1)?'checked':'');?> disabled/>
				<label for="adpcm_disallow"> <small>adpcm</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="siren7_disallow" name="siren7_disallow" id="siren7_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][siren7_disallow] == 1)?'checked':'');?> disabled/>
				<label for="siren7_disallow"> <small>siren7</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g723_disallow" name="g723_disallow" id="g723_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][g723_disallow] == 1)?'checked':'');?> disabled/>
				<label for="g723_disallow"> <small>g723</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="slin_disallow" name="slin_disallow" id="slin_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][slin_disallow] == 1)?'checked':'');?> disabled/>
				<label for="slin_disallow"> <small>slin</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g726_disallow" name="g726_disallow" id="g726_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][g726_disallow] == 1)?'checked':'');?> disabled/>
				<label for="g726_disallow"> <small>g726</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g729_disallow" name="g729_disallow" id="g729_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][g729_disallow] == 1)?'checked':'');?> disabled/>
				<label for="g729_disallow"> <small>g729</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" />
				<input type="checkbox" value="ilbc_disallow" name="ilbc_disallow" id="ilbc_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][ilbc_disallow] == 1)?'checked':'');?> disabled/>
				<label for="ilbc_disallow"> <small>ilbc</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g726aal2_disallow" name="g726aal2_disallow" id="g726aal2_disallow" class="audio-codecs_disallow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_disallow'][g726aal2_disallow] == 1)?'checked':'');?> disabled/>
				<label for="g726aal2_disallow"> <small>g726aal2</small> </label>
				</li>
				</ul>
				</td>
				<td>
				<ul class="sortable">
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="ulaw_allow" name="ulaw_allow" id="ulaw_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>" 
				<?php echo (($H323['codecs_allow'][ulaw_allow] == 1)?'checked':'');?> disabled/>
				<label for="ulaw_allow"> <small>ulaw</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" />
				<input type="checkbox" value="alaw_allow" name="alaw_allow" id="alaw_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>" 
				<?php echo (($H323['codecs_allow'][alaw_allow] == 1)?'checked':'');?> disabled/>
				<label for="alaw_allow"> <small>alaw</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="gsm_allow" name="gsm_allow" id="gsm_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][gsm_allow] == 1)?'checked':'');?> disabled/>
				<label for="gsm_allow"> <small>gsm</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="siren14_allow" name="siren14_allow" id="siren14_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][siren14_allow] == 1)?'checked':'');?> disabled/>
				<label for="siren14_allow"> <small>siren14</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="lpc10_allow"  name="lpc10_allow" id="lpc10_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][lpc10_allow] == 1)?'checked':'');?> disabled/>
				<label for="lpc10_allow"> <small>lpc10</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox"  value="speex_allow" name="speex_allow" id="speex_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][speex_allow] == 1)?'checked':'');?> disabled/>
				<label for="speex_allow"> <small>speex</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g722_allow" name="g722_allow" id="g722_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][g722_allow] == 1)?'checked':'');?> disabled/>
				<label for="g722_allow"> <small>g722</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="adpcm_allow" name="adpcm_allow" id="adpcm_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][adpcm_allow] == 1)?'checked':'');?> disabled/>
				<label for="adpcm_allow"> <small>adpcm</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="siren7_allow" name="siren7_allow" id="siren7_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][siren7_allow] == 1)?'checked':'');?> disabled/>
				<label for="siren7_allow"> <small>siren7</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g723_allow" name="g723_allow" id="g723_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][g723_allow] == 1)?'checked':'');?> disabled/>
				<label for="g723_allow"> <small>g723</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="slin_allow" name="slin_allow" id="slin_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][slin_allow] == 1)?'checked':'');?> disabled/>
				<label for="slin_allow"> <small>slin</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g726_allow" name="g726_allow" id="g726_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][g726_allow] == 1)?'checked':'');?> disabled/>
				<label for="g726_allow"> <small>g726</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g729_allow" name="g729_allow" id="g729_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][g729_allow] == 1)?'checked':'');?> disabled/>
				<label for="g729_allow"> <small>g729</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" />
				<input type="checkbox" value="ilbc_allow" name="ilbc_allow" id="ilbc_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][ilbc_allow] == 1)?'checked':'');?> disabled/>
				<label for="ilbc_allow"> <small>ilbc</small> </label></li>
				<li>
				<img src="assets/h323/images/arrow_up_down.png" height="16" width="16" border="0" alt="move" style="float:none; margin-left:-6px; margin-bottom:-3px;cursor:move" /> 
				<input type="checkbox" value="g726aal2_allow" name="g726aal2_allow" id="g726aal2_allow" class="audio-codecs_allow" tabindex="<?php echo ++$tabindex;?>"
				<?php echo (($H323['codecs_allow'][g726aal2_allow] == 1)?'checked':'');?> disabled/>
				<label for="g726aal2_allow"> <small>g726aal2</small> </label>
				</li>
				</ul></td></tr><tr><td align=center>Disallow</td><td align=center>Allow</td></tr></table>
				</td>
				<td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("User-Input Mode (DTMF)")?><hr/></h5></td></tr>
			<td><a href="#" class="info"><?php echo _("DTMF mode")?>:<span><?php echo _("Default RTP Payload to send RFC2833 DTMF on.</br>Valid entries are:   rfc2833, inband, cisco, h245-signal")?></span></a></td>
				<td><select class="dtmfmode-no"  name="dtmfmode" id="dtmfmode" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="rfc2833"		<?php echo (($H323['dtmfmode'] == "rfc2833")?'selected="yes"':'');?>  >rfc2833</option>
					<option value="inband"		<?php echo (($H323['dtmfmode'] == "inband")?'selected="yes"':'');?>  >inband</option>
					<option value="cisco"		<?php echo (($H323['dtmfmode'] == "cisco")?'selected="yes"':'');?>  >cisco</option>
					<option value="h245-signal"	<?php echo (($H323['dtmfmode'] == "h245-signal")?'selected="yes"':'');?>  >h245-signal</option>
				</select>
				<div class="dtmfmode-yes"><?php echo "[ ;" . $H323['dtmfmode'] ." ]" ;?></div>
				</td>
				<td>
				<input class="dtmfmode-yes" name="dtmfmode_check_yes" id="dtmfmode_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['dtmfmode'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="dtmfmode-no" name="dtmfmode_check_no" id="dtmfmode_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['dtmfmode'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
				<td><a href="#" class="info"><?php echo _("Payload type")?>:<span><?php echo _("This is used to interoperate with broken gateways which cannot successfully</br>negotiate a RFC2833 payload type in the TerminalCapabilitySet.</br>To specify required payload type, put it after colon in dtmfmode</br>option like dtmfmode=rfc2833:101 or dtmfmode=cisco:12")?></span></a></td>
				<td><input class="payload_type-no" input size="30" type="text" name="payload_type" id="payload_type" value=<?php echo $H323['payload_type'];?>  disabled tabindex="<?php echo ++$tabindex;?>">
				<div class="payload_type-yes"><?php echo "[ ;" . $H323['payload_type'] ." ]" ;?></div>
				</td>
				<td>
				<input class="payload_type-yes" name="payload_type_check_yes" id="payload_type_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['payload_type'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="payload_type-no" name="payload_type_check_no" id="payload_type_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['payload_type'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("Gatekeeper settings")?><hr/></h5></td></tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Gatekeeper")?>:<span><?php echo _("
			Set the gatekeeper</br>
			DISCOVER			- Find the Gk address using multicast</br>
			DISABLE				- Disable the use of a GK</br>");
			echo _(htmlspecialchars("
			<IP address> or <Host name>	- The acutal IP address or hostname of your GK
			"))?></span></a></td>
				<td>
				
				<div class="gate_iphost-yes"><?php echo "[ ;" . $H323['gatekeeper'] ." ]" ;?></div>
				<table><tr class="gate_iphost-no"><td>
				<input name="gatekeeper" type="radio"  id="gate_discover" value="DISCOVER" <?php echo (($H323['gatekeeper'] == "DISCOVER")?'checked':'');?> tabindex="<?php echo ++$tabindex;?>"/>
				<label for="gate_discover"><?php echo _("Discover")?></label>
				<br>
				<input name="gatekeeper" type="radio" id="gate_disable" value="DISABLE" <?php echo (($H323['gatekeeper'] == "DISABLE")?'checked':'');?>  tabindex="<?php echo ++$tabindex;?>"/>
				<label for="gate_disable"><?php echo _("Disable")?></label>
				<br>
				<input name="gatekeeper" type="radio" id="gate_ip" value="IP" <?php echo ((($H323['gatekeeper'] != "DISABLE" && $H323['gatekeeper'] != "DISCOVER") && H323ValidIP($H323['gatekeeper']))?'checked':'');?>  tabindex="<?php echo ++$tabindex;?>"/>
				<label for="gate_iphost"><?php echo _("Input IP")?></label>
				<br>
				<input name="gatekeeper" type="radio" id="gate_host" value="HOST" <?php echo ((($H323['gatekeeper'] != "DISABLE" && $H323['gatekeeper'] != "DISCOVER") && !H323ValidIP($H323['gatekeeper']))?'checked':'');?>  tabindex="<?php echo ++$tabindex;?>"/>
				<label for="gate_iphost"><?php echo _("Input Host")?></label>
				</td></tr></table></td>
				</td>
				<td>
				<input class="gate_iphost-yes" name="gate_iphost_check_yes" id="gate_iphost_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['gatekeeper'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="gate_iphost-no" name="gate_iphost_check_no" id="gate_iphost_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['gatekeeper'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr class="gate_iphost-no">
			<td><a href="#" class="info"><?php echo _("IP/HOST name")?>:<span><?php echo _("
				")?></span></a></td>
				<td><input size="30" type="text" name="ip_host" id="ip_host" value="<?php echo $H323['gatekeeper'];?>" disabled tabindex="<?php echo ++$tabindex;?>"></td>
			</tr>
			<tr class="gate_iphost-no">
			<td><a href="#" class="info"><?php echo _("Allow GK Routed")?>:<span><?php echo _("Tell Asterisk whether or not to accept Gatekeeper</br>routed calls or not. Normally this should always</br> be set to yes, unless you want to have finer control</br>over which users are allowed access to Asterisk.")?></span></a></td>
				<td><select class="allowgkrouted-no" name="allowgkrouted" id="allowgkrouted" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['allowgkrouted'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['allowgkrouted'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="allowgkrouted-yes"><?php echo "[ ;" . $H323['allowgkrouted'] ." ]" ;?></div>
				</td>
				<td>
				<input class="allowgkrouted-yes" name="allowgkrouted_check_yes" id="allowgkrouted_check_yes"  type="button" value="<?php echo $form[1];?>"
				<?php echo (($H323['commentmap']['allowgkrouted'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="allowgkrouted-no" name="allowgkrouted_check_no" id="allowgkrouted_check_no" type="button"  value="<?php echo $form[2];?>"
				<?php echo (($H323['commentmap']['allowgkrouted'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr class="gate_iphost-no">
			<td><a href="#" class="info"><?php echo _("Accept Anonymous")?>:<span><?php echo _("When the channel works without gatekeeper, there is possible to reject calls from anonymous (not listed in users) callers.</br> Default is to allow anonymous calls.")?></span></a></td>
				<td><select class="acceptanonymous-no"  name="acceptanonymous" id="acceptanonymous" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['acceptanonymous'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['acceptanonymous'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="acceptanonymous-yes"><?php echo "[ ;" . $H323['acceptanonymous'] ." ]" ;?></div>
				</td>
				<td>
				<input class="acceptanonymous-yes" name="acceptanonymous_check_yes" id="acceptanonymous_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['acceptanonymous'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="acceptanonymous-no" name="acceptanonymous_check_no" id="acceptanonymous_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['acceptanonymous'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("Other settings")?><hr/></h5></td></tr>
			<td><a href="#" class="info"><?php echo _("User by alias")?>:<span><?php echo _("Optionally you can determine a user by Source IP versus its H.323 alias.</br>Default behavour is to determine user by H.323 alias.")?></span></a></td>
				<td><select class="userbyalias-no" name="userbyalias" id="userbyalias" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['userbyalias'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['userbyalias'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="userbyalias-yes"><?php echo "[ ;" . $H323['userbyalias'] ." ]" ;?></div>
				</td>
				<td>
				<input class="userbyalias-yes" name="userbyalias_check_yes" id="userbyalias_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['userbyalias'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="userbyalias-no" name="userbyalias_check_no" id="userbyalias_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['userbyalias'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Context")?>:<span><?php echo _("
			Default context gets used in siutations where you are using</br>
			the GK routed model or no type=user was found. This gives you</br>
			the ability to either play an invalid message or to simply not</br>
			use user authentication at all.
			")?></span></a></td>
				<td><input class="context-no" size="30" type="text" name="context" id="context" value="<?php echo $H323['context'];?>" disabled tabindex="<?php echo ++$tabindex;?>">
				<div class="context-yes"><?php echo "[ ;" . $H323['context'] ." ]" ;?></div>
				</td>
				<td>
				<input class="context-yes" name="context_check_yes" id="context_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['context'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="context-no" name="context_check_no" id="context_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['context'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Fast start")?>:<span><?php echo _("Fast start")?></span></a></td>
				<td><select class="faststart-no"  name="faststart" id="faststart" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['faststart'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['faststart'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="faststart-yes"><?php echo "[ ;" . $H323['faststart'] ." ]" ;?></div>
				</td>
				<td>
				<input class="faststart-yes" name="faststart_check_yes" id="faststart_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['faststart'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="faststart-no" name="faststart_check_no" id="faststart_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['faststart'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("h245 tunneling")?>:<span><?php echo _("h245 tunneling")?></span></a></td>
				<td><select class="h245tunneling-no" name="h245tunneling" id="h245tunneling" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['h245tunneling'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['h245tunneling'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="h245tunneling-yes"><?php echo "[ ;" . $H323['h245tunneling'] ." ]" ;?></div>
				</td>
				<td>
				<input class="h245tunneling-yes" name="h245tunneling_check_yes" id="h245tunneling_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['h245tunneling'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="h245tunneling-no" name="h245tunneling_check_no" id="h245tunneling_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['h245tunneling'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("Gateways settings")?><hr/></h5></td></tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Progress setup")?>:<span><?php echo _("
			Add PROGRESS information element to SETUP message sent on outbound calls to notify about required backward voice path.</br>
			Valid values are:</br>
			0 - don't add PROGRESS information element (default); </br>
			1 - call is not end-end ISDN, further call progress information can possibly be available in-band; </br>
			3 - origination address is non-ISDN (Cisco accepts this value only); </br>
			8 - in-band information or an appropriate pattern is now available; </br>
			")?></span></a></td>
				<td><select class="progress_setup-no" name="progress_setup" id="progress_setup" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="0"		<?php echo (($H323['progress_setup'] == "0")?'selected="yes"':'');?>  >0</option>
					<option value="1"		<?php echo (($H323['progress_setup'] == "1")?'selected="yes"':'');?>  >1</option>
					<option value="3"		<?php echo (($H323['progress_setup'] == "3")?'selected="yes"':'');?>  >3</option>
					<option value="8"		<?php echo (($H323['progress_setup'] == "8")?'selected="yes"':'');?>  >8</option>
				</select>
				<div class="progress_setup-yes"><?php echo "[ ;" . $H323['progress_setup'] ." ]" ;?></div>
				</td>
				<td>
				<input class="progress_setup-yes" name="progress_setup_check_yes" id="progress_setup_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['progress_setup'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="progress_setup-no" name="progress_setup_check_no" id="progress_setup_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['progress_setup'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Progress Alert")?>:<span><?php echo _("
			Add PROGRESS information element (IE) to ALERT message sent on incoming
			calls to notify about required backwared voice path. Valid values are:</br>
			0 - don't add PROGRESS IE (default);</br>
			8 - in-band information or an appropriate pattern is now available;
			")?></span></a></td>
				<td><select class="progress_alert-no" name="progress_alert" id="progress_alert" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="0"		<?php echo (($H323['progress_alert'] == "0")?'selected="yes"':'');?>  >0</option>
					<option value="8"		<?php echo (($H323['progress_alert'] == "8")?'selected="yes"':'');?>  >8</option>
				</select>
				<div class="progress_alert-yes"><?php echo "[ ;" . $H323['progress_alert'] ." ]" ;?></div>
				</td>
				<td>
				<input class="progress_alert-yes" name="progress_alert_check_yes" id="progress_alert_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['progress_alert'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="progress_alert-no" name="progress_alert_check_no" id="progress_alert_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['progress_alert'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Progress Audio")?>:<span><?php echo _("
			Generate PROGRESS message when H.323 audio path has established to create </br>
			backward audio path at other end of a call.
			")?></span></a></td>
				<td><select class="progress_audio-no" name="progress_audio" id="progress_audio" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['progress_audio'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['progress_audio'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="progress_audio-yes"><?php echo "[ ;" . $H323['progress_audio'] ." ]" ;?></div>
				</td>
				<td>
				<input class="progress_audio-yes" name="progress_audio_check_yes" id="progress_audio_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['progress_audio'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="progress_audio-no" name="progress_audio_check_no" id="progress_audio_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['progress_audio'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("H.323 messages")?><a href="#" class="info"><span><?php echo _("
			Specify how to inject non-standard information into H.323 messages. When</br>
			the channel receives messages with tunneled information, it automatically</br>
			enables the same option for all further outgoing messages independedly on </br>
			options has been set by the configuration. This behavior is required, for </br>
			example, for Cisco CallManager when Q.SIG tunneling is enabled for a </br>
			gateway where Asterisk lives.
			")?></span></a> <hr/></h5></td></tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Tunneling")?>:<span><?php echo _("
			The option can be used multiple times, one option per line.</br>
			none - Totally disable tunneling (default)</br>
			cisco - Enable Cisco-specific tunneling</br>
			qsig - Enable tunneling via Q.SIG messages</br>
			")?></span></a></td>
				<td><select class="tunneling-no" name="tunneling" id="tunneling" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="none"		<?php echo (($H323['tunneling'] == "none")?'selected="yes"':'');?>  >none</option>
					<option value="cisco"		<?php echo (($H323['tunneling'] == "cisco")?'selected="yes"':'');?>  >cisco</option>
					<option value="qsig"		<?php echo (($H323['tunneling'] == "qsig")?'selected="yes"':'');?>  >qsig</option>
				</select>
				<div class="tunneling-yes"><?php echo "[ ;" . $H323['tunneling'] ." ]" ;?></div>
				</td>
				<td>
				<input class="tunneling-yes" name="tunneling_check_yes" id="tunneling_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['tunneling'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="tunneling-no" name="tunneling_check_no" id="tunneling_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['tunneling'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
			</tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Hold")?>:<span><?php echo _("
			Specify how to pass hold notification to remote party.</br>
			Default is to use H.450.4 supplementary service message.</br>
			")?></span></a></td>
				<td><select class="hold-no" name="hold" id="hold" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="none"		<?php echo (($H323['hold'] == "none")?'selected="yes"':'');?>  >none</option>
					<option value="notify"		<?php echo (($H323['hold'] == "notify")?'selected="yes"':'');?>  >notify</option>
					<option value="q931only"	<?php echo (($H323['hold'] == "q931only")?'selected="yes"':'');?>  >q931only</option>
					<option value="h450"		<?php echo (($H323['hold'] == "h450")?'selected="yes"':'');?>  >h450</option>
				</select>
				<div class="hold-yes"><?php echo "[ ;" . $H323['hold'] ." ]" ;?></div>
				</td>
				<td>
				<input class="hold-yes" name="hold_check_yes" id="hold_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['hold'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="hold-no" name="hold_check_no" id="hold_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['hold'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				</td>
			</tr>
			<tr><td colspan="3"><h5><?php echo _("Jitter buffer settings")?><hr/></h5></td></tr>
			<tr>
			<td><a href="#" class="info"><?php echo _("Enable Jitter buffer")?>:<span><?php echo _("
			Enables the use of a jitterbuffer on the receiving side of a H323 channel.</br>
			An enabled jitterbuffer will be used only if the sending side can create and the receiving side can not accept jitter.</br>
			The H323 channel can accept jitter, thus an enabled jitterbuffer </br>
			on the receive H323 side will only be used if the sending side </br>
			can create jitter and jbforce is also set to yes.
			")?></span></a></td>
				<td><select class="jbenable-no" name="jbenable" id="jbenable" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"	onclick="SetEnable(false);"	<?php echo (($H323['jbenable'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"	onclick="SetEnable(true);"	<?php echo (($H323['jbenable'] == "no")?'selected="yes"':'');?>  >no</option>
				</select>
				<div class="jbenable-yes"><?php echo "[ ;" . $H323['jbenable'] ." ]" ;?></div>
				</td>
				<td>
				<input class="jbenable-yes" name="jbenable_check_yes" id="jbenable_check_yes"  type="button" value="<?php echo $form[1];?>" 
				<?php echo (($H323['commentmap']['jbenable'] == 0)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
				<input class="jbenable-no" name="jbenable_check_no" id="jbenable_check_no" type="button"  value="<?php echo $form[2];?>"  
				<?php echo (($H323['commentmap']['jbenable'] == 1)?'checked':''); ?>
				tabindex="<?php echo ++$tabindex;?>"/>
			</tr>
			<tr class="jbenable-no">
			<td><a href="#" class="info"><?php echo _("Force")?>:<span><?php echo _("
			Forces the use of a jitterbuffer on the receive side of a H323 channel.
			")?></span></a></td>
				<td><select name="jbforce" id="jbforce" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['jbforce'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['jbforce'] == "no")?'selected="yes"':'');?>  >no</option>
				</select></td>
			</tr>
			<tr class="jbenable-no">
			<td><a href="#" class="info"><?php echo _("Max size")?>:<span><?php echo _("
			Max length of the jitterbuffer in milliseconds
			")?></span></a></td>
				<td><input size="30" type="text" name="jbmaxsize" id="jbmaxsize" value="<?php echo $H323['jbmaxsize'];?>" disabled tabindex="<?php echo ++$tabindex;?>"></td>
			</tr>
			<tr class="jbenable-no">
			<td><a href="#" class="info"><?php echo _("Resync threshold")?>:<span><?php echo _("
			This SHALL contain a single, valid IP address for this machine
			")?></span></a></td>
				<td><input size="30" type="text" name="jbresyncthreshold" id="jbresyncthreshold" value="<?php echo $H323['jbresyncthreshold'];?>" disabled tabindex="<?php echo ++$tabindex;?>"></td>
			</tr>
			<tr class="jbenable-no">
			<td><a href="#" class="info"><?php echo _("Impl")?>:<span><?php echo _("
			Jitterbuffer implementation, used on the receiving side of a H323 channel.</br>
			Two implementations are currenlty available - 'fixed' (with size always equals to jbmax-size)
			and 'adaptive' (with variable size, actually the new jb of IAX2). Defaults to fixed.
			")?></span></a></td>
				<td><select name="jbimpl" id="jbimpl" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="fixed"		<?php echo (($H323['jbimpl'] == "fixed")?'selected="yes"':'');?>  >fixed</option>
					<option value="adaptive"	<?php echo (($H323['jbimpl'] == "adaptive")?'selected="yes"':'');?>  >adaptive</option>
				</select></td>
			</tr>
			<tr class="jbenable-no">
			<td><a href="#" class="info"><?php echo _("Log")?>:<span><?php echo _("
			Enables jitterbuffer frame logging.
			")?></span></a></td>
				<td><select name="jblog" id="jblog" disabled tabindex="<?php echo ++$tabindex;?>">
					<option value="yes"		<?php echo (($H323['jblog'] == "yes")?'selected="yes"':'');?>  >yes</option>
					<option value="no"		<?php echo (($H323['jblog'] == "no")?'selected="yes"':'');?>  >no</option>
				</select></td>
			</tr>
			<tr><td></br></br></td></tr>
	</tbody>
	</table>
	<input type="submit" name='save' value='Save' />
	<input type="submit" name='default' value='Default'/> 
	<br/>
</form>


