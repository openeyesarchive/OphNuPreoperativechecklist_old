
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

	$('input[type="checkbox"]').click(function() {
		readyCheck();
	});

	handleButton($('#et_print'),function(e) {
		do_print_checklist();
		e.preventDefault();
	});
});

// Checks that everything is ready and sets image accordingly
function readyCheck()
{
	// Get reference to sign
	var readySign = document.getElementById('readySign');
	var notreadySign = document.getElementById('notreadySign');

	// Check elements
	var ready = true;

	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[admit_to_hospital_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[admit_to_hospital_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[name_band_present_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[name_band_present_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[verbal_confirmation_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[verbal_confirmation_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[name_of_attendant_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[name_of_attendant_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[consent_signed_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[consent_signed_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[type_of_surgery_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[type_of_surgery_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[no_signs_of_infection_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[no_signs_of_infection_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[marked_with_x_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[marked_with_x_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[allergies_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[allergies_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[preop_drops_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[preop_drops_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[weight_kg_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[weight_kg_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[lab_hgb_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[lab_hgb_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[diagnostics_ordered_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[diagnostics_ordered_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[reviewed_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[reviewed_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[iol_measurements_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[iol_measurements_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[time_last_ate_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[time_last_ate_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[dentures_etc_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[dentures_etc_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[systemic_diseases_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[systemic_diseases_nurse]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[medications_physician]"]').is(':checked')) ready = false;
	if (!$('input[type="checkbox"][name="Element_OphNuPreoperativechecklist_Checks[medications_nurse]"]').is(':checked')) ready = false;

	if (ready)
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

function ucfirst(str) { str += ''; var f = str.charAt(0).toUpperCase(); return f + str.substr(1); }

function eDparameterListener(_drawing) {
	if (_drawing.selectedDoodle != null) {
		// handle event
	}
}

function do_print_checklist() {
	printIFrameUrl(OE_print_url, null);
}
