
/* Module-specific javascript can be placed here */

$(document).ready(function() {
	$('#et_save').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			
			return true;
		}
		return false;
	});

	$('#et_cancel').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/update\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/update/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		}
		return false;
	});

	$('#et_deleteevent').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();
			return true;
		}
		return false;
	});

	$('#et_canceldelete').unbind('click').click(function() {
		if (!$(this).hasClass('inactive')) {
			disableButtons();

			if (m = window.location.href.match(/\/delete\/[0-9]+/)) {
				window.location.href = window.location.href.replace('/delete/','/view/');
			} else {
				window.location.href = baseUrl+'/patient/episodes/'+et_patient_id;
			}
		} 
		return false;
	});

	$('select.populate_textarea').unbind('change').change(function() {
		if ($(this).val() != '') {
			var cLass = $(this).parent().parent().parent().attr('class').match(/Element.*/);
			var el = $('#'+cLass+'_'+$(this).attr('id'));
			var currentText = el.text();
			var newText = $(this).children('option:selected').text();

			if (currentText.length == 0) {
				el.text(ucfirst(newText));
			} else {
				el.text(currentText+', '+newText);
			}
		}
	});
	
	// Javascript runs when page is ready. If in edit mode, set value NB for Orbis demo only
	
	// Determine whether view mode or update mode
	var mode = (document.title.indexOf('View') === -1)?'edit':'view';

	if (mode == 'edit')
	{	
		// Preset consent
		var consent = document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[consent_signed]")[1];
		if (consent != null)
		{
			//consent.setAttribute('checked', 'checked');
			consent.addEventListener('change', listener = function (event) {readyCheck();},false);
		}

		// Preset IOLpower
		var IOLpower = document.getElementById("Element_OphNuPreoperativechecklist_Checks_iol");
		if (IOLpower != null)
		{
			IOLpower.value = "19D";
		}

		// Preset refractive outcome
		var refractiveOutcome = document.getElementById("Element_OphNuPreoperativechecklist_Checks_refractive_outcome");
		if (refractiveOutcome != null)
		{
			refractiveOutcome.value = -0.36;
		}

		// Add event listeners to other elements
		var el;
		el = document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[name_band_present]")[1];
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);
		var el = document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[eye_marked]")[1];
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);
		var el = document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[verbal_confirmation]")[1];
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);
		var el = document.getElementById("Element_OphNuPreoperativechecklist_Checks_last_time_npo");
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);
		var el = document.getElementById("Element_OphNuPreoperativechecklist_Checks_iol");
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);	
		var el = document.getElementById("Element_OphNuPreoperativechecklist_Checks_refractive_outcome");
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);		
		var el = document.getElementById("pre_op_drops");
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);
		var el = document.getElementById("Element_OphNuPreoperativechecklist_Checks_pre_op_drops");
		if(el != null) el.addEventListener('change', listener = function (event) {readyCheck();},false);

		// Adjust flag
		readyCheck();
	}
	else
	{
		// Get value of hidden element in view
		var proceed = document.getElementById("proceed").innerHTML;

		// Set banner accordingly
		if (proceed == 'Yes')
		{
			readySign.style.display="block";
			notreadySign.style.display="none";
		}
		else
		{
			readySign.style.display="none";
			notreadySign.style.display="block";
		}		
	}
	
});

// Checks that everything is ready and sets image accordingly
function readyCheck()
{
	// Get reference to sign
	var readySign = document.getElementById('readySign');
	var notreadySign = document.getElementById('notreadySign');

	// Check elements
	var ready = true;
	
	if (!document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[consent_signed]")[1].checked) ready = false;
	if (!document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[name_band_present]")[1].checked) ready = false;
	if (!document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[eye_marked]")[1].checked) ready = false;
	if (!document.getElementsByName("Element_OphNuPreoperativechecklist_Checks[verbal_confirmation]")[1].checked) ready = false;
	if (document.getElementById("Element_OphNuPreoperativechecklist_Checks_last_time_npo").value.length == 0) ready = false;
	if (document.getElementById("Element_OphNuPreoperativechecklist_Checks_iol").value.length == 0) ready = false;
	if (document.getElementById("Element_OphNuPreoperativechecklist_Checks_refractive_outcome").value.length == 0) ready = false;
	if (document.getElementById("Element_OphNuPreoperativechecklist_Checks_pre_op_drops").value.length == 0) ready = false;
	
	if (ready)
	{
		readySign.style.display="block";
		notreadySign.style.display="none";
		document.getElementById("Element_OphNuPreoperativechecklist_Checks_proceed").value = 1;
	}
	else
	{
		readySign.style.display="none";
		notreadySign.style.display="block";
		document.getElementById("Element_OphNuPreoperativechecklist_Checks_proceed").value = 0;
	}
}

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}
