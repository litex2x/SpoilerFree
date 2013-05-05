$(document).ready(function() {
	$('#season-ddl').change(seasonChange);
});

function seasonChange(){
	$('#episode-ddl').find('option:selected').removeAttr('selected');
	$('#selection-form').submit();
}