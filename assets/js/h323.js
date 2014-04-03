$("#bindaddr_check_yes").click(function() { 
$("#bindaddr").attr("disabled", false);});
$("#bindaddr_check_no").click(function() {  
$("#bindaddr").attr("disabled", true);});
if (document.getElementById("bindaddr_check_no").checked) {
$(".bindaddr-no").hide();
}else{
$(".bindaddr-yes").hide ();
$(".bindaddr-no").show();
$("#bindaddr").attr("disabled", false);
}

$("#bindaddr_check_yes").click(function(){
$(".bindaddr-no").show();
$(".bindaddr-yes").hide();
});
$("#bindaddr_check_no").click(function(){
$(".bindaddr-yes").show();
$(".bindaddr-no").hide();
});

$("#tos_audio_check_yes").click(function() { $("#tos_audio").attr("disabled", false);});
$("#tos_audio_check_no").click(function() {  $("#tos_audio").attr("disabled", true);});
if (document.getElementById("tos_audio_check_no").checked) {
$(".tos_audio-no").hide();
}else{
$(".tos_audio-yes").hide ();
$(".tos_audio-no").show();
$("#tos_audio").attr("disabled", false);
}
$("#tos_audio_check_yes").click(function(){
$(".tos_audio-no").show();
$(".tos_audio-yes").hide();
});
$("#tos_audio_check_no").click(function(){
$(".tos_audio-yes").show();
$(".tos_audio-no").hide();
});


$("#cos_audio_check_yes").click(function() {$("#cos_audio").attr("disabled", false);});
$("#cos_audio_check_no").click(function() {$("#cos_audio").attr("disabled", true);});
if (document.getElementById("cos_audio_check_no").checked) {
$(".cos_audio-no").hide();
}else{
$(".cos_audio-yes").hide ();
$(".cos_audio-no").show();
$("#cos_audio").attr("disabled", false);
}
$("#cos_audio_check_yes").click(function(){
$(".cos_audio-no").show();
$(".cos_audio-yes").hide();
});
$("#cos_audio_check_no").click(function(){
$(".cos_audio-yes").show();
$(".cos_audio-no").hide();
});



$("#amaflags_check_yes").click(function() {  $("#amaflags").attr("disabled", false);});
$("#amaflags_check_no").click(function() {   $("#amaflags").attr("disabled", true);});
if (document.getElementById("amaflags_check_no").checked) {
$(".amaflags-no").hide();
}else{
$(".amaflags-yes").hide ();
$(".amaflags-no").show();
$("#amaflags").attr("disabled", false);
}
$("#amaflags_check_yes").click(function(){
$(".amaflags-no").show();
$(".amaflags-yes").hide();
});
$("#amaflags_check_no").click(function(){
$(".amaflags-yes").show();
$(".amaflags-no").hide();
});

$("#accountcode_check_yes").click(function() { $("#accountcode").attr("disabled", false);});
$("#accountcode_check_no").click(function() { $("#accountcode").attr("disabled", true);});
if (document.getElementById("accountcode_check_no").checked) {
$(".accountcode-no").hide();
}else{
$(".accountcode-yes").hide ();
$(".accountcode-no").show();
$("#accountcode").attr("disabled", false);
}
$("#accountcode_check_yes").click(function(){
$(".accountcode-no").show();
$(".accountcode-yes").hide();
});
$("#accountcode_check_no").click(function(){
$(".accountcode-yes").show();
$(".accountcode-no").hide();
});




function SetCodecAllowEnable(bool){
    $("#ulaw_allow").attr("disabled", bool);
    $("#alaw_allow").attr("disabled", bool);
    $("#gsm_allow").attr("disabled", bool);
    $("#siren14_allow").attr("disabled", bool);
    $("#lpc10_allow").attr("disabled", bool);
    $("#speex_allow").attr("disabled", bool);
    $("#g722_allow").attr("disabled", bool);
    $("#adpcm_allow").attr("disabled", bool);
    $("#siren7_allow").attr("disabled", bool);
    $("#g723_allow").attr("disabled", bool);
    $("#slin_allow").attr("disabled", bool);
    $("#g726_allow").attr("disabled", bool);
    $("#g729_allow").attr("disabled", bool);
    $("#ilbc_allow").attr("disabled", bool);
    $("#g726aal2_allow").attr("disabled", bool);
}
function SetCodecDisallowEnable(bool){
    $("#ulaw_disallow").attr("disabled", bool);
    $("#alaw_disallow").attr("disabled", bool);
    $("#gsm_disallow").attr("disabled", bool);
    $("#siren14_disallow").attr("disabled", bool);
    $("#lpc10_disallow").attr("disabled", bool);
    $("#speex_disallow").attr("disabled", bool);
    $("#g722_disallow").attr("disabled", bool);
    $("#adpcm_disallow").attr("disabled", bool);
    $("#siren7_disallow").attr("disabled", bool);
    $("#g723_disallow").attr("disabled", bool);
    $("#slin_disallow").attr("disabled", bool);
    $("#g726_disallow").attr("disabled", bool);
    $("#g729_disallow").attr("disabled", bool);
    $("#ilbc_disallow").attr("disabled", bool);
    $("#g726aal2_disallow").attr("disabled", bool);
}
function SetCodecAllowChecked(bool){
    $("#ulaw_allow").attr("checked", bool);
    $("#alaw_allow").attr("checked", bool);
    $("#gsm_allow").attr("checked", bool);
    $("#siren14_allow").attr("checked", bool);
    $("#lpc10_allow").attr("checked", bool);
    $("#speex_allow").attr("checked", bool);
    $("#g722_allow").attr("checked", bool);
    $("#adpcm_allow").attr("checked", bool);
    $("#siren7_allow").attr("checked", bool);
    $("#g723_allow").attr("checked", bool);
    $("#slin_allow").attr("checked", bool);
    $("#g726_allow").attr("checked", bool);
    $("#g729_allow").attr("checked", bool);
    $("#ilbc_allow").attr("checked", bool);
    $("#g726aal2_allow").attr("checked", bool);
}
function SetCodecDisallowChecked(bool){
//true - check false - uncheck
    $("#ulaw_disallow").attr("checked", bool);
    $("#alaw_disallow").attr("checked", bool);
    $("#gsm_disallow").attr("checked", bool);
    $("#siren14_disallow").attr("checked", bool);
    $("#lpc10_disallow").attr("checked", bool);
    $("#speex_disallow").attr("checked", bool);
    $("#g722_disallow").attr("checked", bool);
    $("#adpcm_disallow").attr("checked", bool);
    $("#siren7_disallow").attr("checked", bool);
    $("#g723_disallow").attr("checked", bool);
    $("#slin_disallow").attr("checked", bool);
    $("#g726_disallow").attr("checked", bool);
    $("#g729_disallow").attr("checked", bool);
    $("#ilbc_disallow").attr("checked", bool);
    $("#g726aal2_disallow").attr("checked", bool);
}

$("#codec_check_enall").click(function() {
    SetCodecAllowEnable(true);
    SetCodecDisallowEnable(false);
});
$("#codec_check_disall").click(function() {
    SetCodecDisallowEnable(true);
    SetCodecAllowEnable(false);
});


if (document.getElementById("codec_check_no").checked) {
	$(".codec_check-no").hide();
//	$("#codec_check_enall").attr("checked", false);
//	$("#codec_check_disall").attr("checked", false);
	$("#codec_check_enall").attr("disabled", true);
	$("#codec_check_disall").attr("disabled", true);
//	SetCodecAllowEnable(true)
//	SetCodecDisallowEnable(true);
}else{
    $(".codec_check-yes").hide ();
    $(".codec_check-no").show();
	if (document.getElementById("codec_check_enall").checked) {
		SetCodecAllowEnable(true);
		SetCodecDisallowEnable(false);
	}else{
		SetCodecAllowEnable(false);
		SetCodecDisallowEnable(true);
	}
}


$("#codec_check_yes").click(function(){
	$(".codec_check-no").show();
	$(".codec_check-yes").hide();
	if (document.getElementById("codec_check_enall").checked) {
		SetCodecAllowEnable(true);
		SetCodecDisallowEnable(false);
	}else{
		SetCodecAllowEnable(false);
		SetCodecDisallowEnable(true);
	}
	$("#codec_check_enall").attr("disabled", false);
	$("#codec_check_disall").attr("disabled", false);
});

$("#codec_check_no").click(function(){
	$(".codec_check-yes").show();
	$(".codec_check-no").hide();
	$("#codec_check_enall").attr("disabled", true);
	$("#codec_check_disall").attr("disabled", true);
	SetCodecAllowEnable(true)
	SetCodecDisallowEnable(true);
});



$("#dtmfmode_check_yes").click(function() {  $("#dtmfmode").attr("disabled", false);});
$("#dtmfmode_check_no").click(function() {  $("#dtmfmode").attr("disabled", true);});
if (document.getElementById("dtmfmode_check_no").checked) {
$(".dtmfmode-no").hide();
}else{
$(".dtmfmode-yes").hide ();
$(".dtmfmode-no").show();
$("#dtmfmode").attr("disabled", false);
}
$("#dtmfmode_check_yes").click(function(){
$(".dtmfmode-no").show();
$(".dtmfmode-yes").hide();
});
$("#dtmfmode_check_no").click(function(){
$(".dtmfmode-yes").show();
$(".dtmfmode-no").hide();
});

$("#payload_type_check_yes").click(function() {  $("#payload_type").attr("disabled", false);
});
$("#payload_type_check_no").click(function() {  $("#payload_type").attr("disabled", true);
});
if (document.getElementById("payload_type_check_no").checked) {
$(".payload_type-no").hide();
}else{
$(".payload_type-yes").hide ();
$(".payload_type-no").show();
$("#payload_type").attr("disabled", false);
}
$("#payload_type_check_yes").click(function(){
$(".payload_type-no").show();
$(".payload_type-yes").hide();
});
$("#payload_type_check_no").click(function(){
$(".payload_type-yes").show();
$(".payload_type-no").hide();
});




$("#gate_disable").click(function() {
    $("#ip_host").attr("disabled", true);
});
$("#gate_discover").click(function() {
    $("#ip_host").attr("disabled", true);
});

$("#gate_ip").click(function() {
    $("#ip_host").attr("disabled", false);
    $("#ip_host").focus();
    $("#ip_host").val("");
});

$("#gate_host").click(function() {
    $("#ip_host").attr("disabled", false);
    $("#ip_host").focus();
    $("#ip_host").val("");
});

$("#gate_iphost_check_yes").click(function() {
    $("#gate_disable").attr("disabled", false);
    $("#gate_discover").attr("disabled", false);
    $("#gate_ip").attr("disabled", false);
    $("#gate_host").attr("disabled", false);
    if ($('#gate_ip').attr('checked')||$('#gate_host').attr('checked')) {
	$("#ip_host").attr("disabled", false);
    }else{
	$("#ip_host").attr("disabled", true);
    }
});



$("#gate_iphost_check_no").click(function() {
	$("#gate_disable").attr("disabled", true);
	$("#gate_discover").attr("disabled", true);
	$("#gate_ip").attr("disabled", true);
	$("#gate_host").attr("disabled", true);
	$("#ip_host").attr("disabled", true);
	$("#allowgkrouted").attr("disabled", true);
	$("#acceptanonymous").attr("disabled", true);

});


if (document.getElementById("gate_iphost_check_no").checked) {
	$(".gate_iphost-no").hide();
	$("#gate_disable").attr("disabled", true);
	$("#gate_discover").attr("disabled", true);
	$("#gate_ip").attr("disabled", true);
	$("#gate_host").attr("disabled", true);
	$("#ip_host").attr("disabled", true);
}else{
	$(".gate_iphost-yes").hide ();
	$(".gate_iphost-no").show();
	if ($('#gate_ip').attr('checked')||$('#gate_host').attr('checked')) {
		$("#ip_host").attr("disabled", false);
	}else{
		$("#ip_host").attr("disabled", true);
	}
}

$("#gate_iphost_check_yes").click(function(){
$(".gate_iphost-no").show();
$(".gate_iphost-yes").hide();
});
$("#gate_iphost_check_no").click(function(){
$(".gate_iphost-yes").show();
$(".gate_iphost-no").hide();
});




$("#allowgkrouted_check_yes").click(function() {    $("#allowgkrouted").attr("disabled", false);});
$("#allowgkrouted_check_no").click(function() {    $("#allowgkrouted").attr("disabled", true);});
if (document.getElementById("allowgkrouted_check_no").checked) {
$(".allowgkrouted-no").hide();
}else{
$(".allowgkrouted-yes").hide ();
$(".allowgkrouted-no").show();
$("#allowgkrouted").attr("disabled", false);
}
$("#allowgkrouted_check_yes").click(function(){
$(".allowgkrouted-no").show();
$(".allowgkrouted-yes").hide();
});
$("#allowgkrouted_check_no").click(function(){
$(".allowgkrouted-yes").show();
$(".allowgkrouted-no").hide();
});


$("#acceptanonymous_check_yes").click(function() {    $("#acceptanonymous").attr("disabled", false);});
$("#acceptanonymous_check_no").click(function() {    $("#acceptanonymous").attr("disabled", true);});
if (document.getElementById("acceptanonymous_check_no").checked) {
$(".acceptanonymous-no").hide();
}else{
$(".acceptanonymous-yes").hide ();
$(".acceptanonymous-no").show();
$("#acceptanonymous").attr("disabled", false);
}
$("#acceptanonymous_check_yes").click(function(){
$(".acceptanonymous-no").show();
$(".acceptanonymous-yes").hide();
});
$("#acceptanonymous_check_no").click(function(){
$(".acceptanonymous-yes").show();
$(".acceptanonymous-no").hide();
});


$("#userbyalias_check_yes").click(function() {    $("#userbyalias").attr("disabled", false);});
$("#userbyalias_check_no").click(function() {    $("#userbyalias").attr("disabled", true);});
if (document.getElementById("userbyalias_check_no").checked) {
$(".userbyalias-no").hide();
}else{
$(".userbyalias-yes").hide ();
$(".userbyalias-no").show();
$("#userbyalias").attr("disabled", false);
}
$("#userbyalias_check_yes").click(function(){
$(".userbyalias-no").show();
$(".userbyalias-yes").hide();
});
$("#userbyalias_check_no").click(function(){
$(".userbyalias-yes").show();
$(".userbyalias-no").hide();
});


$("#context_check_yes").click(function() {    $("#context").attr("disabled", false);});
$("#context_check_no").click(function() {    $("#context").attr("disabled", true);});
if (document.getElementById("context_check_no").checked) {
$(".context-no").hide();
}else{
$(".context-yes").hide ();
$(".context-no").show();
$("#context").attr("disabled", false);
}
$("#context_check_yes").click(function(){
$(".context-no").show();
$(".context-yes").hide();
});
$("#context_check_no").click(function(){
$(".context-yes").show();
$(".context-no").hide();
});

$("#faststart_check_yes").click(function() {
    $("#faststart").attr("disabled", false);
});
$("#faststart_check_no").click(function() {
    $("#faststart").attr("disabled", true);
});
if (document.getElementById("faststart_check_no").checked) {
$(".faststart-no").hide();
}else{
$(".faststart-yes").hide ();
$(".faststart-no").show();
$("#faststart").attr("disabled", false);
}
$("#faststart_check_yes").click(function(){
$(".faststart-no").show();
$(".faststart-yes").hide();
});
$("#faststart_check_no").click(function(){
$(".faststart-yes").show();
$(".faststart-no").hide();
});


$("#h245tunneling_check_yes").click(function() {
    $("#h245tunneling").attr("disabled", false);
});
$("#h245tunneling_check_no").click(function() {
    $("#h245tunneling").attr("disabled", true);
});
if (document.getElementById("h245tunneling_check_no").checked) {
$(".h245tunneling-no").hide();
}else{
$(".h245tunneling-yes").hide ();
$(".h245tunneling-no").show();
$("#h245tunneling").attr("disabled", false);
}
$("#h245tunneling_check_yes").click(function(){
$(".h245tunneling-no").show();
$(".h245tunneling-yes").hide();
});
$("#h245tunneling_check_no").click(function(){
$(".h245tunneling-yes").show();
$(".h245tunneling-no").hide();
});



$("#progress_setup_check_yes").click(function() {    $("#progress_setup").attr("disabled", false);});
$("#progress_setup_check_no").click(function() {    $("#progress_setup").attr("disabled", true);});
if (document.getElementById("progress_setup_check_no").checked) {
$(".progress_setup-no").hide();
}else{
$(".progress_setup-yes").hide ();
$(".progress_setup-no").show();
$("#progress_setup").attr("disabled", false);
}
$("#progress_setup_check_yes").click(function(){
$(".progress_setup-no").show();
$(".progress_setup-yes").hide();
});
$("#progress_setup_check_no").click(function(){
$(".progress_setup-yes").show();
$(".progress_setup-no").hide();
});


$("#progress_alert_check_yes").click(function() {    $("#progress_alert").attr("disabled", false);});
$("#progress_alert_check_no").click(function() {    $("#progress_alert").attr("disabled", true);});
if (document.getElementById("progress_alert_check_no").checked) {
$(".progress_alert-no").hide();
}else{
$(".progress_alert-yes").hide ();
$(".progress_alert-no").show();
$("#progress_alert").attr("disabled", false);
}
$("#progress_alert_check_yes").click(function(){
$(".progress_alert-no").show();
$(".progress_alert-yes").hide();
});
$("#progress_alert_check_no").click(function(){
$(".progress_alert-yes").show();
$(".progress_alert-no").hide();
});

$("#progress_audio_check_yes").click(function() {
    $("#progress_audio").attr("disabled", false);
});
$("#progress_audio_check_no").click(function() {
    $("#progress_audio").attr("disabled", true);
});
if (document.getElementById("progress_audio_check_no").checked) {
$(".progress_audio-no").hide();
}else{
$(".progress_audio-yes").hide ();
$(".progress_audio-no").show();
$("#progress_audio").attr("disabled", false);
}
$("#progress_audio_check_yes").click(function(){
$(".progress_audio-no").show();
$(".progress_audio-yes").hide();
});
$("#progress_audio_check_no").click(function(){
$(".progress_audio-yes").show();
$(".progress_audio-no").hide();
});


$("#tunneling_check_yes").click(function() {   $("#tunneling").attr("disabled", false);});
$("#tunneling_check_no").click(function() {    $("#tunneling").attr("disabled", true);});
if (document.getElementById("tunneling_check_no").checked) {
	$(".tunneling-no").hide();
}else{
	$(".tunneling-yes").hide ();
	$(".tunneling-no").show();
	$("#tunneling").attr("disabled", false);
}

$("#tunneling_check_yes").click(function(){
$(".tunneling-no").show();
$(".tunneling-yes").hide();
});
$("#tunneling_check_no").click(function(){
$(".tunneling-yes").show();
$(".tunneling-no").hide();
});



$("#hold_check_yes").click(function() {  $("#hold").attr("disabled", false);});
$("#hold_check_no").click(function() {    $("#hold").attr("disabled", true);});
if (document.getElementById("hold_check_no").checked) {
	$(".hold-no").hide();
}else{
	$(".hold-yes").hide ();
	$(".hold-no").show();
	$("#hold").attr("disabled", false);
}
$("#hold_check_yes").click(function(){
$(".hold-no").show();
$(".hold-yes").hide();
});
$("#hold_check_no").click(function(){
$(".hold-yes").show();
$(".hold-no").hide();
});

$("#jbenable_check_yes").click(function() {
    $("#jbenable").attr("disabled", false);
});
$("#jbenable_check_no").click(function() {
    $("#jbenable").attr("disabled", true);
});
if (document.getElementById("jbenable_check_no").checked) {
$(".jbenable-no").hide();
}else{
$(".jbenable-yes").hide ();
$(".jbenable-no").show();
$("#jbenable").attr("disabled", false);
}

$("#jbenable_check_yes").click(function(){
$(".jbenable-no").show();
$(".jbenable-yes").hide();

});
$("#jbenable_check_no").click(function(){
$(".jbenable-yes").show();
$(".jbenable-no").hide();
SetEnable(true);
});


var objSel = document.getElementById("jbenable");
if (objSel.options[objSel.selectedIndex].value=="yes"){
SetEnable(false);
}else{
    SetEnable(true);
}

function SetEnable(bool){
if (bool) {
    $("#jbforce").attr("disabled", true);
    $("#jbmaxsize").attr("disabled", true);
    $("#jbresyncthreshold").attr("disabled", true);
    $("#jbimpl").attr("disabled", true);
    $("#jblog").attr("disabled", true);
}else{
    $("#jbforce").attr("disabled", false);
    $("#jbmaxsize").attr("disabled", false);
    $("#jbresyncthreshold").attr("disabled", false);
    $("#jbimpl").attr("disabled", false);
    $("#jblog").attr("disabled", false);
}

}

/*
$('input[name="bindaddr_check_yes"]').click(function () {
	var selection=$(this).val();
	alert("Radio button selection changed. Selected: "+selection);
	
});

$('input[name="bindaddr_check_no"]').click(function () {
	var selection=$(this).val();
	alert("Radio button selection changed. Selected: "+selection);
	
});

*/
