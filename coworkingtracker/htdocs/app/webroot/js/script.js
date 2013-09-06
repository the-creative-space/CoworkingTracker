(function ($, undefined) {
	$(document).ready(function() {
		
		$("#membership").ready(function() {		
			$('<input type="radio" name="data[Person][membership_id]" id="PersonMembershipId" value="create" required="required"><label for="PersonMembershipId">New Membership</label>').appendTo("#membership fieldset");
		});
		
		$(document).on("change", "input[name='data[Person][membership_id]']", function() {
			$("#people").show();
			if ($(this).val() != "create") {
				$("#membership input").prop('disabled', true);
				$(".editmembership").hide();
				$("input[name='data[Membership][type]']").val(" ");
				$("input[name='data[Membership][name]']").val(" ");
				$("input[name='data[Membership][address]']").val(" ");
				fillSelect($(this).val());				
			}
			else {
				$(".editmembership").show();
				$("input[name='data[Membership][type]']").val("");
				$("input[name='data[Membership][name]']").val("");
				$("input[name='data[Membership][address]']").val("");
				$("#people input").remove();
				$("#people label").remove();
				$('<input type="radio" name="data[Device][person_id]" id="DevicePersonId" value="create" required="required"><label for="DevicePersonId">New Person</label>').appendTo("#people fieldset");
			}					
		});
		
		$(document).on("change", "input[name='data[Device][person_id]']", function() {
			if ($(this).val() != "create"){
				$(".editperson").hide();
				$("input[name='data[Person][name]']").val(" ");
			}
			else {
				$(".editperson").show();
				$("input[name='data[Person][name]']").val("");
			}
		});
		
		$(document).on("change", "input[name='data[Device][person_id]']", function() {
				$("#membership input").prop('disabled', false);
		});
		
		$(document).on("submit", ".changeDate", function(event) {	
			var year = $("#MembershipYearYear").val();
			var month = $("#MembershipMonthMonth").val();
			var day = $("#MembershipDayDay").val();
			var memid = $("#MembershipMemberId").val();
			event.preventDefault;
			location.href = "/memberships/list_by_day/" + year + "-" + month + "-" + day + "/" + memid;
			return false;
		});	

		$(document).on("submit", ".changeDateMonth", function(event) {	
			var year = $("#MembershipYearYear").val();
			var month = $("#MembershipMonthMonth").val();
			var memid = $("#MembershipMemberId").val();
			event.preventDefault;
			location.href = "/memberships/list_by_month/" + year + "/" + month + "/" + memid;
			return false;
		});	
		
		$(document).on("submit", ".addFilter", function(event) {
			var id = $("#MembershipId").val();
			var niceTime = $("#MembershipTime").val();;
			event.preventDefault;
			location.href = "/memberships/list_by_day/" + niceTime + "/" + id;
			return false;
		});
		
		$(document).on("submit", ".addFilterMonth", function(event) {
			var id = $("#MembershipId").val();
			var year = $("#MembershipYear").val();
			var month = $("#MembershipMonth").val();
			event.preventDefault;
			location.href = "/memberships/list_by_month/" + year + "/" + month + "/" + id;
			return false;
		});
		
		$(document).on("click", "#back-month", function(event) {
			var id = $("#MembershipId").val();
			var year = $("#MembershipYear").val();
			var month = $("#MembershipMonth").val();
			event.preventDefault;
			month--;
			if (month < 1) {
				month = 12;
				year--;
			}
			if (month < 10) {
				month = '0' + month;
			}
			location.href = "/memberships/list_by_month/" + year + "/" + month + "/" + id;
			return false;
		});
		
		$(document).on("click", "#next-month", function(event) {
			var id = $("#MembershipId").val();
			var year = $("#MembershipYear").val();
			var month = $("#MembershipMonth").val();
			event.preventDefault;
			month++;
			if (month > 12) {
				month = 1;
				year++;
			}
			if (month < 10) {
				month = '0' + month;
			}
			location.href = "/memberships/list_by_month/" + year + "/" + month + "/" + id;
			return false;
		});
			
	function fillSelect(idval)
	{
		$("#people input").remove();
		$("#people label").remove();
		$.get("/people/get_membership/" + idval + ".json",function(data) {	
			for (var id in data.people) {
				$('<input type="radio" name="data[Device][person_id]" id="DevicePersonId' + id + '" value="' + id +'" required="required"><label for="DevicePersonId' + id + '">' + data.people[id] + '</label>').appendTo("#people fieldset");
			}
			$('<input type="radio" name="data[Device][person_id]" id="DevicePersonId" value="create" required="required"><label for="DevicePersonId">New Person</label>').appendTo("#people fieldset");
		},"json");
	}
		
	});
}) (jQuery);
