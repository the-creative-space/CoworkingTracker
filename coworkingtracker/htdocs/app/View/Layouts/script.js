function DisplayForm(){
	$("#DeviceMembershipId").change(function(){
		if($("DeviceMembershipId").val() != null){
			$(".editmembership").hide();
		}
		else{
			$(".editmembership").show();
		}
	}

}