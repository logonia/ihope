

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Localstorage - Task Manager</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js" type="text/javascript"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>

	<script src="https://cdn.awesomefunctions.com/awesome-functions.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
</head>



<script>
$(document).ready(function($)
{
	//Hide all
	$('.Screen').hide();

	//Localstorage name
	var LocalstorageName = 'TaskManager'; 


 	//--->Add - Start

 	//load new task screen 
 	$(document).on('click', '.BTN_Add_New', function(event) 
 	{
 		//Get data from template
 		var GetTemplateData = $('.Template_New_Task').html();

 		$('.Screen_Data').html(GetTemplateData);
 		$('.Screen_Data').find('.btn_Task').html('Save').addClass('BTN_Save_New_Task')
 		$('.Screen_Data').show();
 	});

 	//new task screen add button action
 	$('.Screen_Data').on('click', '.BTN_Save_New_Task', function(event) 
 	{	 
 		//To clear all old alerts
		bs.ClearError();

 		//Get values
 		var CallId = $('.Screen_Data').find('.CallId');
		var PId = $('.Screen_Data').find('.PId');
		var PName = $('.Screen_Data').find('.PName');
		var MedstayAmt = $('.Screen_Data').find('.MedstayAmt');
		var MedenAmt = $('.Screen_Data').find('.MedenAmt');
		var ImvacAmt = $('.Screen_Data').find('.ImvacAmt');
		var OthermcAmt = $('.Screen_Data').find('.OthermcAmt');
		var EmtransAmt = $('.Screen_Data').find('.EmtransAmt');
		var OutpdenAmt = $('.Screen_Data').find('.OutpdenAmt');
		var OtherpsAmt = $('.Screen_Data').find('.OtherpsAmt');
		var HerbmAmt = $('.Screen_Data').find('.HerbmAmt');
		var MedbanAmt = $('.Screen_Data').find('.MedbanAmt');
		var OthermpAmt = $('.Screen_Data').find('.OthermpAmt');
		var AssistpAmt = $('.Screen_Data').find('.AssistpAmt');
		var Code = $('.Screen_Data').find('.Code');
		var TaskDate = $('.Screen_Data').find('.TaskDate');
 		var TaskDesc = $('.Screen_Data').find('.TaskDesc');

 		if(frm.IsEmpty(CallId.val() ))
		{
			//Show alert
			bs.ShowError ("Call ID Missing",CallId)
		}
		else if(frm.IsEmpty(PId.val()))
		{
			//Show alert
			bs.ShowError ("Participant ID Missing",PId)
		}
		else if(frm.IsEmpty(PName.val()))
		{
			//Show alert
			bs.ShowError ("Participant Name Missing",PName)
		}
		else if(frm.IsEmpty(MedstayAmt.val()))
		{
			//Show alert
			bs.ShowError ("Medical Treatment Overnight Stay Amount Missing",MedstayAmt)
		}
		else if(frm.IsEmpty(MedenAmt.val()))
		{
			//Show alert
			bs.ShowError ("Inpatient Care Services Amount Missing",MedenAmt)
		}
		else if(frm.IsEmpty(ImvacAmt.val()))
		{
			//Show alert
			bs.ShowError ("Preventive Care Services Amount Missing",ImvacAmt)
		}
		else if(frm.IsEmpty(OthermcAmt.val()))
		{
			//Show alert
			bs.ShowError ("Other Preventive Care Services Amount Missing",OthermcAmt)
		}
		else if(frm.IsEmpty(EmtransAmt.val()))
		{
			//Show alert
			bs.ShowError ("Emergency Transportation Amount Missing",EmtransAmt)
		}
		else if(frm.IsEmpty(OutpdenAmt.val()))
		{
			//Show alert
			bs.ShowError ("Outpatient Dental Other Patient Services Amount Missing",OutpdenAmt)
		}
		else if(frm.IsEmpty(OtherpsAmt.val()))
		{
			//Show alert
			bs.ShowError ("Other Medical Consultation Amount Missing",OtherpsAmt)
		}
		else if(frm.IsEmpty(HerbmAmt.val()))
		{
			//Show alert
			bs.ShowError ("Herbal Medicines Amount Missing",HerbmAmt)
		}
		else if(frm.IsEmpty(MedbanAmt.val()))
			{
			//Show alert
			bs.ShowError ("Medicines (Branded,Generic) Amount Missing",MedbanAmt)
		}
		else if(frm.IsEmpty(OthermpAmt.val()))
			{
			//Show alert
			bs.ShowError ("Other Medical Products Amount Missing ",OthermpAmt)
		}
		else if(frm.IsEmpty(AssistpAmt.val()))
			{
			//Show alert
			bs.ShowError ("Assistive Products Amount Missing",AssistpAmt)
		}
		else if(frm.IsEmpty(Code.val()))
			{
			//Show alert
			bs.ShowError ("Your Staff Code is missing",Code)
		}
		else if(frm.IsEmpty(TaskDate.val()))
			{
			//Show alert
			bs.ShowError ("Date of Completion Missing",TaskDate)
		}
		else
		{			 
			var AddTask = 
			{ 
				'rec_id':js.MD5('',6),
				'CallId' : CallId.val(),
				'PId' : PId.val(),
				'PName' : PName.val(),
				'MedstayAmt' : MedstayAmt.val(),
				'MedenAmt' : MedenAmt.val(),
				'ImvacAmt' : ImvacAmt.val(),
				'OthermcAmt' : OthermcAmt.val(),
				'EmtransAmt' : EmtransAmt.val(),
				'OutpdenAmt' : OutpdenAmt.val(),
				'OtherpsAmt' : OtherpsAmt.val(),
				'HerbmAmt' : HerbmAmt.val(),
				'MedbanAmt' : MedbanAmt.val(),
				'OthermpAmt' : OthermpAmt.val(),
				'AssistpAmt' : AssistpAmt.val(),
				'Code' : Code.val(),
				'TaskDate' : TaskDate.val(), 
				'TaskDesc' : TaskDesc.val(), 
			};

			ls.AddArr(LocalstorageName,AddTask);
			
			var d = bs.AlertMsg("Successfully add your questionnaire", "success");
			$('.Screen_Data').html(d);

			//Show All tasks
			 
			$(".BTN_View").click();
		}
				
 
 	});
 	//--->Add - End



 	//--->View - Start
	$(document).on('click', '.BTN_View', function(event) 
 	{
 		//Get data  
 		var AllTasks = ls.GetAllArr(LocalstorageName);
 		 

 		if(js.Size(AllTasks) < 1 || js.Size(AllTasks)==0)
 		{ 
 			var d = bs.AlertMsg("Oppps...Looks like there are no tasks. <br><br> You should add a task first", "warning");
			$('.Screen_Data').html(d).show();
 			return false;
 		}

 		//console.table(AllTasks);

 		var strTableData = '';
 		strTableData +='<table class="table table-hover">';
 		strTableData += '<thead>';
 		//strTableData += '<tr>';
 		strTableData += '<th>Line Num</th>';
 		strTableData += '<th>Call ID</th>';
		strTableData += '<th>PID</th>';
		strTableData += '<th>PName</th>';
		strTableData += '<th>MedstayAmt</th>';
		strTableData += '<th>MedenAmt</th>';
		strTableData += '<th>ImvacAmt</th>';
		strTableData += '<th>OthermcAmt</th>';
		strTableData += '<th>EmtransAmt</th>';
		strTableData += '<th>OutpdenAmt</th>';
		strTableData += '<th>OtherpsAmt</th>';
		strTableData += '<th>HerbmAmt</th>';
		strTableData += '<th>MedbanAmt</th>';
		strTableData += '<th>OthermpAmt</th>';
		strTableData += '<th>AssistpAmt</th>';
		strTableData += '<th>Code</th>';
 		strTableData += '<th>Date</th>';
 		strTableData += '<th>Comments</th>';
 		strTableData += '<th>Options</th>';
 		//strTableData += '</tr>'; 		
 		strTableData += '</thead>';


 		strTableData += '<tbody>'
 		for (var i = 0; i < AllTasks.length; i++) 
 		{
 			var val = AllTasks[i];
 			var line_num = i+ 1;
 			
			strTableData += '<tr>';
		 	strTableData += '<td class="text-center">'+line_num +'</td>';
			strTableData += '<td class="text-center">'+val.CallId+'</td>';
			strTableData += '<td class="text-center">'+val.PId+'</td>';
			strTableData += '<td class="text-center">'+val.PName+'</td>';
			strTableData += '<td class="text-center">'+val.MedstayAmt+'</td>';
			strTableData += '<td class="text-center">'+val.MedenAmt+'</td>';
			strTableData += '<td class="text-center">'+val.ImvacAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OthermcAmt+'</td>';
			strTableData += '<td class="text-center">'+val.EmtransAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OutpdenAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OtherpsAmt+'</td>';
			strTableData += '<td class="text-center">'+val.HerbmAmt+'</td>';
			strTableData += '<td class="text-center">'+val.MedbanAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OthermpAmt+'</td>';
			strTableData += '<td class="text-center">'+val.AssistpAmt+'</td>';
			strTableData += '<td class="text-center">'+val.Code+'</td>';
			strTableData += '<td class="text-center">'+moment(val.TaskDate).format('M-D-Y')+'</td>';
			strTableData += '<td class="text-center">'+val.TaskDesc+'<td>'; 

			//Edit/Delete Options
			var Edit = '<a href="#" class="BTN_Edit_Entry" rec_id="'+val.rec_id+'"><div class="btn btn-success" class="text-center">Edit</div></a> / ';
			var Delete = '<a href="#" class="BTN_Delete_Entry" rec_id="'+val.rec_id+'" task_name="'+val.TaskName+'"><div class="btn btn-danger">Delete</div></a>';

			strTableData += '<td>'+Edit+Delete+'<td>'; 
			strTableData += '</tr>'; 
 			 
 		};
 		strTableData += '<tbody>'
 		strTableData += '</table>';

 		$('.Screen_Data').html(strTableData).show();

 	});
	//--->View - End

	
	
	
	//--->SubmitView - Start
	$(document).on('click', '.BTN_Sub', function(event) 
 	{
 		//Get data  
 		var AllTasks = ls.GetAllArr(LocalstorageName);
 		 

 		if(js.Size(AllTasks) < 1 || js.Size(AllTasks)==0)
 		{ 
 			var d = bs.AlertMsg("Oppps...Looks like there are no tasks. <br><br> You should add a task first", "warning");
			$('.Screen_Data').html(d).show();
 			return false;
 		}

 		//console.table(AllTasks);

 		var strTableData = '';
 		strTableData +='<table class="table table-hover">';
 		strTableData += '<thead>';
 		//strTableData += '<tr>';
 		strTableData += '<th>Line Num</th>';
 		strTableData += '<th>Call ID</th>';
		strTableData += '<th>PID</th>';
		strTableData += '<th>PName</th>';
		strTableData += '<th>MedstayAmt</th>';
		strTableData += '<th>MedenAmt</th>';
		strTableData += '<th>ImvacAmt</th>';
		strTableData += '<th>OthermcAmt</th>';
		strTableData += '<th>EmtransAmt</th>';
		strTableData += '<th>OutpdenAmt</th>';
		strTableData += '<th>OtherpsAmt</th>';
		strTableData += '<th>HerbmAmt</th>';
		strTableData += '<th>MedbanAmt</th>';
		strTableData += '<th>OthermpAmt</th>';
		strTableData += '<th>AssistpAmt</th>';
		strTableData += '<th>Code</th>';
 		strTableData += '<th>Date</th>';
 		strTableData += '<th>Comments</th>';
 		strTableData += '<th>Options</th>';
 		//strTableData += '</tr>'; 		
 		strTableData += '</thead>';


 		strTableData += '<tbody>'
 		for (var i = 0; i < AllTasks.length; i++) 
 		{
 			var val = AllTasks[i];
 			var line_num = i+ 1;
 			
			strTableData += '<tr>';
		 	strTableData += '<td class="text-center">'+line_num +'</td>';
			strTableData += '<td class="text-center">'+val.CallId+'</td>';
			strTableData += '<td class="text-center">'+val.PId+'</td>';
			strTableData += '<td class="text-center">'+val.PName+'</td>';
			strTableData += '<td class="text-center">'+val.MedstayAmt+'</td>';
			strTableData += '<td class="text-center">'+val.MedenAmt+'</td>';
			strTableData += '<td class="text-center">'+val.ImvacAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OthermcAmt+'</td>';
			strTableData += '<td class="text-center">'+val.EmtransAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OutpdenAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OtherpsAmt+'</td>';
			strTableData += '<td class="text-center">'+val.HerbmAmt+'</td>';
			strTableData += '<td class="text-center">'+val.MedbanAmt+'</td>';
			strTableData += '<td class="text-center">'+val.OthermpAmt+'</td>';
			strTableData += '<td class="text-center">'+val.AssistpAmt+'</td>';
			strTableData += '<td class="text-center">'+val.Code+'</td>';
			strTableData += '<td class="text-center">'+moment(val.TaskDate).format('M-D-Y')+'</td>';
			strTableData += '<tdclass="text-center">'+val.TaskDesc+'<td>'; 

			//Submit Options
			var edit = '<a href="" class="BTN_Sub" rec_id="'+val.rec_id+'"><div class="btn btn-success" class="text-center">Submit</div></a> ';

			strTableData += '<td>'+edit+'<td>'; 
			strTableData += '</tr>'; 
 			 
 		};
		
		$(document).on("click", ".BTN_Sub", function () {
		var AllTasks = ls.GetAllArr(LocalstorageName);
		var id = $(this).attr("rec_id");
		var result = $.grep(AllTasks, function(e){ return e.rec_id === id; });

		$.ajax({
        url: "www.ihopenavrongo.org/insertdata.php",
        type: 'post',
        data: result,
        done: function(response) {
            console.log(response);
        }
    });
});
 		strTableData += '<tbody>'
 		strTableData += '</table>';

 		$('.Screen_Data').html(strTableData).show();

 	});
	//--->submitView - End
	
	
	
	
	
	
	
	
	

	//--->Edit - Start	
	$(document).on('click', '.BTN_Edit_Entry', function(event) 
 	{
 		var rec_id  = $(this).attr('rec_id');

 		//Get data from template
 		var GetTemplateData = $('.Template_New_Task').html();

 		$('.Screen_Data').html(GetTemplateData);
 		$('.Screen_Data').find('.btn_Task').html('Update').addClass('BTN_Update_Task');
 		$('.Screen_Data').find('.btn_Task').attr('rec_id', rec_id);

 
 		var WhereValueEquals = {rec_id:rec_id}

		var data = ls.GetArr(LocalstorageName,WhereValueEquals)

		console.table(data);


 		var CallId = $('.Screen_Data').find('.CallId').val(data[0].CallId);
		var PId = $('.Screen_Data').find('.PId').val(data[0].PId);
		var PName = $('.Screen_Data').find('.PName').val(data[0].PName);
		var MedstayAmt = $('.Screen_Data').find('.MedstayAmt').val(data[0].MedstayAmt);
		var MedenAmt = $('.Screen_Data').find('.MedenAmt').val(data[0].MedenAmt);
		var ImvacAmt = $('.Screen_Data').find('.ImvacAmt').val(data[0].ImvacAmt);
		var OthermcAmt = $('.Screen_Data').find('.OthermcAmt').val(data[0].OthermcAmt);
		var EmtransAmt = $('.Screen_Data').find('.EmtransAmt').val(data[0].EmtransAmt);
		var OutpdenAmt = $('.Screen_Data').find('.OutpdenAmt').val(data[0].OutpdenAmt);
		var OtherpsAmt = $('.Screen_Data').find('.OtherpsAmt').val(data[0].OtherpsAmt);
		var HerbmAmt = $('.Screen_Data').find('.HerbmAmt').val(data[0].HerbmAmt);
		var MedbanAmt = $('.Screen_Data').find('.MedbanAmt').val(data[0].MedbanAmt);
		var OthermpAmt = $('.Screen_Data').find('.OthermpAmt').val(data[0].OthermpAmt);
		var AssistpAmt = $('.Screen_Data').find('.AssistpAmt').val(data[0].AssistpAmt);
		var Code = $('.Screen_Data').find('.Code').val(data[0].Code);
		var TaskDate = $('.Screen_Data').find('.TaskDate').val(data[0].TaskDate);
 		var TaskDesc = $('.Screen_Data').find('.TaskDesc').val(data[0].TaskDesc);
 
 		$('.Screen_Data').show();
 	});

 	//Update task
	$('.Screen_Data').on('click', '.BTN_Update_Task', function(event) 
 	{	 
 		//To clear all old alerts
		bs.ClearError();

 		//Get values
 		var CallId = $('.Screen_Data').find('.CallId');
		var PId = $('.Screen_Data').find('.PId');
		var PName = $('.Screen_Data').find('.PName');
		var MedstayAmt = $('.Screen_Data').find('.MedstayAmt');
		var MedenAmt = $('.Screen_Data').find('.MedenAmt');
		var ImvacAmt = $('.Screen_Data').find('.ImvacAmt');
		var OthermcAmt = $('.Screen_Data').find('.OthermcAmt');
		var EmtransAmt = $('.Screen_Data').find('.EmtransAmt');
		var OutpdenAmt = $('.Screen_Data').find('.OutpdenAmt');
		var OtherpsAmt = $('.Screen_Data').find('.OtherpsAmt');
		var HerbmAmt = $('.Screen_Data').find('.HerbmAmt');
		var MedbanAmt = $('.Screen_Data').find('.MedbanAmt');
		var OthermpAmt = $('.Screen_Data').find('.OthermpAmt');
		var AssistpAmt = $('.Screen_Data').find('.AssistpAmt');
		var Code = $('.Screen_Data').find('.Code');
		var TaskDate = $('.Screen_Data').find('.TaskDate');
 		var TaskDesc = $('.Screen_Data').find('.TaskDesc');

 		 		if(frm.IsEmpty(CallId.val() ))
		{
			//Show alert
			bs.ShowError ("Call ID Missing",CallId)
		}
		else if(frm.IsEmpty(PId.val()))
		{
			//Show alert
			bs.ShowError ("Participant ID Missing",PId)
		}
		else if(frm.IsEmpty(PName.val()))
		{
			//Show alert
			bs.ShowError ("Participant Name Missing",PName)
		}
		else if(frm.IsEmpty(MedstayAmt.val()))
		{
			//Show alert
			bs.ShowError ("Medical Treatment Overnight Stay Amount Missing",MedstayAmt)
		}
		else if(frm.IsEmpty(MedenAmt.val()))
		{
			//Show alert
			bs.ShowError ("Inpatient Care Services Amount Missing",MedenAmt)
		}
		else if(frm.IsEmpty(ImvacAmt.val()))
		{
			//Show alert
			bs.ShowError ("Preventive Care Services Amount Missing",ImvacAmt)
		}
		else if(frm.IsEmpty(OthermcAmt.val()))
		{
			//Show alert
			bs.ShowError ("Other Preventive Care Services Amount Missing",OthermcAmt)
		}
		else if(frm.IsEmpty(EmtransAmt.val()))
		{
			//Show alert
			bs.ShowError ("Emergency Transportation Amount Missing",EmtransAmt)
		}
		else if(frm.IsEmpty(OutpdenAmt.val()))
		{
			//Show alert
			bs.ShowError ("Outpatient Dental Other Patient Services Amount Missing",OutpdenAmt)
		}
		else if(frm.IsEmpty(OtherpsAmt.val()))
		{
			//Show alert
			bs.ShowError ("Other Medical Consultation Amount Missing",OtherpsAmt)
		}
		else if(frm.IsEmpty(HerbmAmt.val()))
		{
			//Show alert
			bs.ShowError ("Herbal Medicines Amount Missing",HerbmAmt)
		}
		else if(frm.IsEmpty(MedbanAmt.val()))
			{
			//Show alert
			bs.ShowError ("Medicines (Branded,Generic) Amount Missing",MedbanAmt)
		}
		else if(frm.IsEmpty(OthermpAmt.val()))
			{
			//Show alert
			bs.ShowError ("Other Medical Products Amount Missing ",OthermpAmt)
		}
		else if(frm.IsEmpty(AssistpAmt.val()))
			{
			//Show alert
			bs.ShowError ("Assistive Products Amount Missing",AssistpAmt)
		}
		else if(frm.IsEmpty(Code.val()))
			{
			//Show alert
			bs.ShowError ("Your Staff Code is Missing",Code)
		}
		else if(frm.IsEmpty(TaskDate.val()))
			{
			//Show alert
			bs.ShowError ("Date of Completion Missing",TaskDate)
		}
		else
		{		
			var rec_id  = $(this).attr('rec_id');

			var FieldObjArrToUpdatValue = 
			{ 				 
				'CallId' : CallId.val(),
				'PId' : PId.val(),
				'PName' : PName.val(),
				'MedstayAmt' : MedstayAmt.val(),
				'MedenAmt' : MedenAmt.val(),
				'ImvacAmt' : ImvacAmt.val(),
				'OthermcAmt' : OthermcAmt.val(),
				'EmtransAmt' : EmtransAmt.val(),
				'OutpdenAmt' : OutpdenAmt.val(),
				'OtherpsAmt' : OtherpsAmt.val(),
				'HerbmAmt' : HerbmAmt.val(),
				'MedbanAmt' : MedbanAmt.val(),
				'OthermpAmt' : OthermpAmt.val(),
				'AssistpAmt' : AssistpAmt.val(),
				'Code' : Code.val(),
				'TaskDate' : TaskDate.val(), 
				'TaskDesc' : TaskDesc.val(), 
			};

			var WhereObjArr = { 'rec_id' : rec_id}

			//Update value
			ls.UpdateArr (LocalstorageName,FieldObjArrToUpdatValue,WhereObjArr) 

			var d = bs.AlertMsg("Successfully update your records", "success");
			$('.Screen_Data').html(d);

			//Show All tasks
			 
			$(".BTN_View").click();
		}
				
 
 	});

	//--->Edit - End


	//--->Delete - Start
	$(document).on('click', '.BTN_Delete_Entry', function(event) 
 	{
 		var rec_id  = $(this).attr('rec_id');
 		var task_name = $(this).attr('task_name');

 		var ObjArrOptions = 
		{
		  text: "Are you sure you want to delete Task Name (<b>"+task_name+"<b>) ?",
		  title: "Confirmation required",
		  confirm: function(button) 
		  {
			var WhereValueEquals = {rec_id:rec_id}

			var data = ls.DeleteArr (LocalstorageName,WhereValueEquals)

			//Show All tasks			 
			$(".BTN_View").click();

		  },
		  cancel: function(button) 
		  {
		    // nothing to do
		  },
		  confirmButton: "Yes I am",
		  cancelButton: "No",                       
		  confirmButtonClass: "btn-danger",    //Bootstrap button class
		  cancelButtonClass: "btn-default",    //Bootstrap button class
		  dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
		}

		//Call is like this
		bs.confirm(ObjArrOptions);

 	});
	
	$(document).on('click', '.BTN_Delete_All', function(event)  	
 	{
 		var AllTasks = _.sortBy(ls.GetAllArr(LocalstorageName), ['TaskDate']);
 		
 		if(js.Size(AllTasks) < 1 || js.Size(AllTasks)==0)
 		{ 
 			var d = bs.AlertMsg("Oppps...Looks like there are no tasks. <br><br> You should add a task first", "warning");
			$('.Screen_Data').html(d).show();
 			return false;
 		}


 		var ObjArrOptions = 
		{
		  text: "Are you sure you want to delete All Tasks ?",
		  title: "Confirmation required",
		  confirm: function(button) 
		  {
			ls.Delete(LocalstorageName);
			//Show All tasks			 
			$(".BTN_View").click();

		  },
		  cancel: function(button) 
		  {
		    // nothing to do
		  },
		  confirmButton: "Yes I am",
		  cancelButton: "No",                       
		  confirmButtonClass: "btn-danger",    //Bootstrap button class
		  cancelButtonClass: "btn-default",    //Bootstrap button class
		  dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
		}

		//Call is like this
		bs.confirm(ObjArrOptions);
 		
 	});


	//--->Delete - End

	

	
});
</script>




<body>

<h1 class="text-center">iHope Survey</h1>

<!--[Menu - Start]-->
<div class="text-center">

	<div class="btn btn-success BTN_Add_New"> Add New</div>
	
	<div class="btn btn-primary BTN_View"> View All</div>
	
	<div class="btn btn-warning BTN_Sub"> Submission</div>

	<div class="btn btn-danger BTN_Delete_All"> Delete All</div>

</div>
<!--[Menu - End]-->
<br><br>



<!--[Screen Data - Start]-->
<div class=" container Screen Screen_Data  "  >  </div>
<!--[Screen Data - End]-->



<!--[New Task Template - Start]-->
<div class="Screen Template_New_Task" style="display:none;"  >

	<div class="panel panel-primary  center-block" style="max-width:400px;">
	  
	  	<div class="panel-heading text-center">Expenditure Questionnaire</div>

	  	<!--[New Task Body - Start]-->
		<div class="panel-body"> 
		<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">Call ID</span>
				<select class="form-control CallId">
					<option value="1">First Call</option>
					<option value="2">Second Call</option>
					<option value="2">Third Call</option>
				</select>
			</div>
			<br><br>
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">Participant ID</span>
				<input   type="text" class="form-control PId"  placeholder="Type Participant ID"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<div class="input-group">
				<span class="input-group-addon">Name</span>
				<input   type="text" class="form-control PName"  placeholder="Type Participant Name"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">1. Medical Treatment Overnight Stay</span>
				<input   type="text" class="form-control MedstayAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">2. Inpatient Care Services</span>
				<input   type="text" class="form-control MedenAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">3. Preventive Care Services</span>
				<input   type="text" class="form-control ImvacAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">4. Other Preventive Care Services</span>
				<input   type="text" class="form-control OthermcAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">5. Emergency Transportation</span>
				<input   type="text" class="form-control EmtransAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">6. Outpatient Dental Other Patient Services</span>
				<input   type="text" class="form-control OutpdenAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">7. Other Medical Consultation</span>
				<input   type="text" class="form-control OtherpsAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">8. Herbal Medicines</span>
				<input   type="text" class="form-control HerbmAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">9. Medicines (Branded,Generic)</span>
				<input   type="text" class="form-control MedbanAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]--><!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">10. Other Medical Products</span>
				<input   type="text" class="form-control OthermpAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">11. Assistive Products</span>
				<input   type="text" class="form-control AssistpAmt"  placeholder="Amount"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->
			<!--[Task Name - Start]-->
			<div class="input-group">
				<span class="input-group-addon">Staff Code</span>
				<input   type="text" class="form-control Code"  placeholder="Enter your code"   >
			</div>
			<br><br>
			<!--[Task Name - End]-->

			<!--[Completion Date - Start]-->
			<div class="input-group">
				<span class="input-group-addon">Task Completion Date</span>
				<input   type="date" class="form-control TaskDate"  >
			</div>
			<br><br>
			<!--[Completion Date - End]-->


			<!--[Task description - Start]-->
			<div class="input-group">
				<span class="input-group-addon">Comments if any</span>
				<textarea class="form-control TaskDesc" rows="5" placeholder="Type In Any Comment here"></textarea>
			</div>
			<br><br>
			<!--[Task description - End]-->

			<div class="btn btn-primary text-center btn_Task"> View All Tasks</div>

		</div>
	  <!--[New Task Body - Start]-->
	</div>
</div>
<!--[New Task Template - Start]-->





</body>
</html>