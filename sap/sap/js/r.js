$(document).ready(function(){
$('#gekko').jrumble({
x: 0,
y: 0,
rotation: 5
});

$('#gekko').hover(function(){
$(this).trigger('startRumble');
}, function(){
$(this).trigger('stopRumble');
});
}