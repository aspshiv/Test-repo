 <?php 
	$fmt = new NumberFormatter('en-IN', NumberFormatter::CURRENCY);
	$fmt->setAttribute(NumberFormatter::FRACTION_DIGITS, 2);
	$fmt->setSymbol(NumberFormatter::CURRENCY_SYMBOL, '');	     					
 ?>
<?php echo $this->Form->create($projectFinancialSanction, ['id' => 'FormID', 'class' => 'form-horizontal', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-topline-aqua">
            <div class="card-head">
                <header style="font-size:18px;">Abstract Estimate / Technical Sanction Approval</header>
            </div>
			     <div class="form-group" style="padding-top: 5px">
					 <div class="offset-md-1 col-md-2">
					 <button type="button" class = 'btn btn-outline-primary btn-sm' onclick='toggledetail()'><i class="fa fa-eye"></i>View Project Details</button>  
					 </div>
				  </div>
				 <div id ="project" style="display:none;">     
				   
				 </div>
			    <div class="card-body">			  
			  
				 <h4 class = "sub-tile">Abstract Estimate List</h4> 
				 <div class="btn-group pull-right">
					<button class="mdl-button mdl-js-button mdl-js-ripple-effect m-b-10 deepPink-bgcolor btn btn-outline dropdown-toggle btn-sm" data-bs-toggle="dropdown">Download
						<i class="fa fa-angle-down"></i>
					</button>
					<ul class="dropdown-menu pull-right">
						<li>
							<a onClick="print_receipt('div_vc')">
								<i class="fa fa-print"></i> Print </a>
						</li>
						<li>
							<a id="export_excel_button">
								<i class="fa fa-file-excel-o"></i> Export to Excel </a>
						</li>
					</ul>
				</div><br>
				 <div class="table-scrollable">
					 <table class="table  table-bordered table-checkable order-column" style="width: 100%" id="example4">
						<thead>
							<tr class="text-center">
								<th style="width:1%">S.no</th>
								<th style="width:7%">Item code</th>
								<th style="width:45%">Item Description</th>
								<th style="width:10%">Quantity</th>
								<th style="width:10%">Rate</th>
								<th style="width:10%">Amount</th>
								<!--th style="width:5%"> Actions </th-->
							</tr>
						</thead>
						<tbody>
							<?php $sno = 1;
								foreach ($abstract_subdetails  as $abstract_subdetail) : ?>
								<tr class="odd gradeX">
									<td class="text-center"><?php echo $sno; ?></td>
									<td class="title" style="text-align:center;"><?php echo ($abstract_subdetail['new_item_code'])?$abstract_subdetail['new_item_code']:'' ?></td>
									<td class="title"><?php echo $abstract_subdetail['new_item_description'] ?></td>
									<td class="title" style="text-align:right;"><?php echo $abstract_subdetail['quantity'] ?></td>
									<td class="title" style="text-align:right;"><?php echo $abstract_subdetail['rate'] ?></td>
									<td class="title" style="text-align:right;"><?php echo $abstract_subdetail['amount'] ?></td>									
								</tr>
							<?php 
							if($abstract_subdetail['amount'] != ''){
							 $tot_amount += $abstract_subdetail['amount'];   
							}
							  $sno++;
								endforeach; ?>
						</tbody>
						<tfoot>
						   <tr>
						      <th colspan="5" style="text-align:right;">SUB TOTAL I (in Rs.) &nbsp;</th>
							  <th style="text-align:right;"><?php echo ($tot_amount)?ltrim($fmt->formatCurrency((float)$tot_amount,'INR'),'₹'):'0.00';  ?></th>						
							  <!--th></th-->
						  </tr>
					   </tfoot>
					</table>
					<table class="table  table-bordered table-checkable order-column" style="width: 100%" >
				  <tr>
					 <th style="width:80%;">GST at 18% (SGST at 9%+ CGST at 9%)</th>
					 <td style="width:20%;text-align:right;">
						 <?php echo ($abstract_detail['gst_at_18'])?ltrim($fmt->formatCurrency((float)$abstract_detail['gst_at_18'],'INR'),'₹'):ltrim($fmt->formatCurrency((float)$technical['gst'],'INR'),'₹'); ?>
					 </td>
				  </tr>
				  <tr>
				   <th style="text-align:right;width:80%;"><b>SUB TOTAL II (in Rs.)</b>&nbsp;&nbsp;</th>
				   <td style="text-align:right;width:20%;text-align:right;">
						 <?php echo ($abstract_detail['sub_total_2'])?ltrim($fmt->formatCurrency((float)$abstract_detail['sub_total_2'],'INR'),'₹'):ltrim($fmt->formatCurrency((float)$tot_amount,'INR'),'₹'); ?>
				  
				  </td>
				  </tr>
				</table>
				<!--center><button type="button" class="btn btn-danger btn-xs" onclick="addnorms();"><i class="fa fa-plus-circle"></i>Add Description / Amount</button></center><br-->
				<table class="table  table-bordered table-checkable order-column" style="width: 100%" >
				  <tbody class="adding_norms">
				  <?php if($additional_count > 0){  
				   foreach($additional_details as $key1 =>$additional){										  
				   ?>										  
					<tr>  
						
						<td style="width:5%;"><?php echo $key1 + 1; ?></td>
						<td style="width:75%;">
							<?php echo $additional['description']; ?>  
						</td>	
						<td style="width:20%;text-align:right;">
							<?php echo ($additional['amount'])?ltrim($fmt->formatCurrency((float)$additional['amount'],'INR'),'₹'):'0.00'; ?>
						</td>   
					</tr>										        
				   <?php  } } ?>
				  </tbody>
				  <tr>
				   <th style="text-align:right;width:80%;" colspan="2"><b>SUB TOTAL III (in Rs.)</b>&nbsp;&nbsp;</th>
				   <td style="text-align:right;width:20%;text-align:right;">
						 <?php echo ($abstract_detail['sub_total_3'])?ltrim($fmt->formatCurrency((float)$abstract_detail['sub_total_3'],'INR'),'₹'):ltrim($fmt->formatCurrency((float)$tot_amount,'INR'),'₹'); ?>
				   </td>
				  </tr>
				</table>
				<table class="table  table-bordered table-checkable order-column" style="width: 100%" >
				  <tr>
					 <td style="width:60%;">Labour Welfare fund at 1%</td>
					 <td style="width:20%;">As Per PWD Norms</td>
					 <td style="width:20%;text-align:right;">
						<?php echo ($abstract_detail['labour_welfare'])?ltrim($fmt->formatCurrency((float)$abstract_detail['labour_welfare'],'INR'),'₹'):'0.00'; ?>
					</td>
				  </tr>
				  <tr>
					 <td style="width:60%;">Provision for Contigency Petty Supervision Charge at 2.5%</td>  
					 <td style="width:20%;">As Per PWD Norms</td>
					 <td style="width:20%;text-align:right;">
						<?php echo ($abstract_detail['contigency_petty_supervision_1'])?ltrim($fmt->formatCurrency((float)$abstract_detail['contigency_petty_supervision_1'],'INR'),'₹'):'0.00'; ?>
					</td>
				  </tr>
				  <tr>
					 <td style="width:60%;">Supervision Charge at 7.5%</td>
					 <td style="width:20%;">As Per PWD Norms</td>
					 <td style="width:20%;text-align:right;">
						<?php echo ($abstract_detail['supervision_2'])?ltrim($fmt->formatCurrency((float)$abstract_detail['supervision_2'],'INR'),'₹'):'0.00'; ?>
					</td>
				  </tr>
				  <tr>
					 <td style="width:60%;">GST at 18% for Supervision Charges 7.5%</td>
					 <td style="width:20%;"></td>
					 <td style="width:20%;text-align:right;">
						<?php echo ($abstract_detail['gst_supervision_2'])?ltrim($fmt->formatCurrency((float)$abstract_detail['gst_supervision_2'],'INR'),'₹'):'0.00'; ?>
					</td>
				  </tr>
				  <tr>
				   <th colspan="2" style="text-align:right;width:80%;"><b>TOTAL (in Rs.)</b>&nbsp;&nbsp;</th>
				   <td style="text-align:right;width:20%;">
				   	 <?php echo ($abstract_detail['total'])?ltrim($fmt->formatCurrency((float)$abstract_detail['total'],'INR'),'₹'):ltrim($fmt->formatCurrency((float)$tot_amount,'INR'),'₹'); ?>
				   </td>
				  </tr>
				</table>
				<table class="table  table-bordered table-checkable order-column" style="width: 100%" >
				  <tr>
					 <td style="width:80%;">Advertisement Charges</td>
					 <td style="width:20%;text-align:right;">
						<?php echo ($abstract_detail['advertisement'])?ltrim($fmt->formatCurrency((float)$abstract_detail['advertisement'],'INR'),'₹'):'0.00'; ?>

					</td>
				  </tr>
				  <tr>
				   <th style="text-align:right;width:80%;"><b>Grand TOTAL (in Rs.)</b>&nbsp;&nbsp;</th>
				   <td style="text-align:right;width:20%;text-align:right;">
					 <?php echo ($abstract_detail['grand_total'])?ltrim($fmt->formatCurrency((float)$abstract_detail['grand_total'],'INR'),'₹'):ltrim($fmt->formatCurrency((float)$tot_amount,'INR'),'₹'); ?>

				   </td>
				  </tr>
				</table>
				</div> 
				<h4 class = "sub-tile">Detailed Estimate :</h4> 
                <fieldset  style="border:1px solid #00355F;border-radius:10px; margin-top:0%;padding:10px;margin-left:5px;margin-bottom:0%">
				 <div class="col-md-12" style="margin-top:">						 
				<div class="form-group row">
				  <label class="control-label col-md-2 bol">Detailed Estimate <span class="required">&nbsp;&nbsp;:</span></label>
					<div class="col-md-4 lower">
					   <?php if ($projectWorkSubdetail['detailed_estimate_upload'] != '') {  ?>
                        <div class="btn btn-outline-primary btn-sm"><i class="fa fa-download"></i>&nbsp;<a style="color:red;" href="<?php echo $this->Url->build('/uploads/DetailedEstimates/'.$projectWorkSubdetail['detailed_estimate_upload'], ['fullBase' => true]); ?>"
                            target="_blank"><span>Download</span></a> </div>
                        <?php } ?>
				   </div>
					<label class="control-label col-md-2 bol">Detailed Estimate Amount<span class="required"></span></label>
						<div class="col-md-4 lower">
							<?php echo $projectWorkSubdetail['detailed_estimate_amount']; ?>                     
						</div>				   
				</div>							
              </div> 
			  </fieldset>
             </div>
			 <?php  if($technicalcount !=0){  ?>
				  <div class="card-body">	
				 <h4 class = "sub-tile">Technical Sanction Details</h4>
					 <fieldset  style="border:1px solid #00355F;border-radius:10px; margin-top:1%;background-color:ghostwhite;padding:25px;">                               
						 <table id="answerTable" class="table  table-bordered  order-column"
							 style="max-width: 99%;" bgcolor="white">
							 <thead>
								 <tr align="center">
									 <th style="width:1%"> S.No</th>
									 <th style="width:10%">Sanction No.</th>
									 <th style="width:10%">Sanctioned Date</th>
									 <th style="width:10%">Sanctioned Amount</th>
									 <th style="width:10%">Description</th>
									 <th style="width:10%">File Upload</th>
								 </tr>
							 </thead>
							 <tbody class="add_doc">
								 <?php
									$i = 0;
								   ?>
								 <tr class="present_row"  align="center">
									 <td class="trcount"><?php echo $i + 1; ?></td>
									 <td><?php echo $technical['sanction_no']; ?></td>
									 <td><?php echo date('d-m-Y',strtotime($technical['sanctioned_date'])); ?></td>   
									 <td><?php echo $technical['amount']; ?></td>
									 <td><?php echo $technical['description']; ?></td>
									 <td>
									   <?php  if($technical['detailed_estimate_upload'] != ''){ ?>										 
										 <a style="color:blue;"
											 href="<?php echo $this->Url->build('/uploads/technicalsanctions/' . $technical['detailed_estimate_upload'], ['fullBase' => true]); ?>"
											 target="_blank"><span>
												 <ion-icon name="document-text-outline"></ion-icon>View
											 </span></a>
										 <?php  } ?>
									 </td>
								 </tr>
								 <?php $i++;
								   ?>
							 </tbody>
						 </table>
					 </fieldset>
					 </div>
			 <?php } ?>	
			 <?php  if($detailed_approval_stages_count > 0){  ?> 
			 <div class="card-body"> 
                   <h4 class = "sub-tile">Abstract / Technical Approval Timeline</h4>			 
					<!--legend class="bol" style="color: #0047AB; text-align: center;"></legend-->  
			         <fieldset  style="border:1px solid #00355F;border-radius:10px; margin-top:1%;background-color:ghostwhite;padding:15px;">

						<table class="table table-hover table-bordered table-advanced tablesorter display" style="width:98%" bgcolor="white">
							<thead>
								<tr class="text-center">
									<th style="width:1%">S.No</th>
									<th style="width:10%">Date</th>
									<th style="width:10%">Status</th>
									<th style="width:10%">Process</th>
									<th style="width:10%">Remarks</th>
								</tr>
							</thead>
							<tbody>							
				
								<?php $sno = 1;
								foreach ($detailed_approval_stages as $detailed_approval) : ?>
									<tr >
										<td class="text-center"><?php echo ($sno); ?></td>
										<td align="center" class="alignment"><?php echo date('d-m-Y',strtotime($detailed_approval['submit_date'])); ?></td>
										<td align="center" class="alignment"><?php echo $detailed_approval['approval_status']['name']; ?></td>
										<td align="center" class="alignment"><?php echo $detailed_approval['current_status']; ?></td>
										<td align="left"   class="alignment"><?php echo $detailed_approval['remarks']; ?></td>
									</tr>
								<?php 
								
								$sno++;
								endforeach; ?>								
							</tbody>							
						</table>
                    </fieldset>						
             </div>
			 <?php } ?>	  
			<?php  if($projectWorkSubdetail['approval_role'] == $role_id){  ?> 
                 <div class="card-body">
				    <h4 class = "sub-tile">Abstract / Technical Approval</h4>			 

                   	<!--legend class="bol" style="color: #0047AB; text-align: center;">Detailed Estimate Approval</legend-->  
				 
					<fieldset	 style="border:1px solid #00355F;border-radius:10px; margin-top:1%;padding:15px;margin-left:1px;margin-bottom:1%">
					 <div class="col-md-12" style="margin-top:">
					 
						<div class="form-group row">
						  <label class="control-label col-md-2 bol">Status. <span class="required">*</span></label>
							<div class="col-md-4">
								<?php echo $this->Form->control('approval_status_id', ['class' => 'form-select', 'templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'error' => false,'options' => $approvalStatuses ,'empty'=>'-Select-','onchange'=>'loaddetails(this.value);']) ?>                     
						   </div>
						   <label class="control-label col-md-2 bol clarification">Remarks. <span class="required">  </span></label>
							<div class="col-md-4 clarification">
								<?php echo $this->Form->control('remarks', ['class' => 'form-control', 'templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'error' => false, 'placeholder' => 'Enter Remarks','type' => 'textarea','rows'=>'3']) ?>                     
							</div>								
						</div>						                                 
					 </div> 
					</fieldset>			
             	  </div>    	
				<div class="form-group" style="padding-top: 10px;">
					<div class="offset-md-5 col-md-10">
						<button type="submit" class="btn btn-success" >Submit</button>
					</div>
				</div>
			<?php  } ?>	
        </div>
    </div>
</div>
<div id="report" style="display:none;">
    <div class="table-responsive" id="div_vc">
        <table class="table table-striped tbl-simple table-bordered dataTable display" aria-describedby="DataTables_Table_0_info" border="1" style="border-collapse: collapse;">
            <tr>
                <td style='text-align:center' colspan="6">
                    <strong size="4">TAMILNADU POLICE HOUSING CORPORATION(TNPHC).<br />
                    </strong>
                </td>
            </tr>
			<tr class="text-center">
				<th style="width:1%">S.no</th>
				<th style="width:7%">Item code</th>
				<th style="width:50%">Item Description</th>
				<th style="width:10%">Quantity</th>
				<th style="width:10%">Rate</th>
				<th style="width:10%">Amount</th>
			</tr>
		<tbody>
			<?php $sno = 1;
				foreach ($abstract_subdetails  as $abstract_subdetail) : ?>
				<tr class="odd gradeX">
					<td class="text-center"><?php echo $sno; ?></td>
					<td class="title" style="text-align:center"><?php echo ($abstract_subdetail['new_item_code'])?$abstract_subdetail['new_item_code']:'' ?></td>
					<td class="title"><?php echo $abstract_subdetail['new_item_description'] ?></td>
					<td class="title" style="text-align:right"><?php echo $abstract_subdetail['quantity'] ?></td>
					<td class="title" style="text-align:right"><?php echo $abstract_subdetail['rate'] ?></td>
					<td class="title" style="text-align:right"><?php echo $abstract_subdetail['amount'] ?></td>					
				</tr>
			<?php 
			  if($abstract_subdetail['amount'] != ''){
				 $tot_amount1 += $abstract_subdetail['amount'];   
				}
			
			 $sno++;
				endforeach; ?>
		</tbody>
		<tfoot>
		   <tr>
			  <th colspan="5" style="text-align:right;">Total &nbsp;</th>
			  <th style="text-align:right;"><?php echo ($tot_amount1)?ltrim($fmt->formatCurrency((float)$tot_amount1,'INR'),'₹'):'0.00';  ?></th>						
		  </tr>
	   </tfoot>
        </table>
    </div>
</div>
<?php echo $this->Form->End(); ?>
<script> 
    $("#FormID").validate({
        rules: {
            'approval_status_id': {
                required: true
            }
        },

        messages: {
            'approval_status_id': {
                required: "Select Status"
            }
        },
        submitHandler: function(form) {
            form.submit();
            $(".btn").prop('disabled', true);
        }
    });
	
	
	 function toggledetail(){
    $('#project').toggle();
    }

$(document).ready(function() {
        var ProjectID    = <?php echo $id;  ?>;
        var ProjectSubID = <?php echo $work_id;  ?>;
        if (ProjectID !='' && ProjectSubID != '') {
            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->webroot ?>/ProjectWorks/ajaxprojectfulldetails/' + ProjectID +'/'+ProjectSubID,
                success: function(data, textStatus) { //alert(data);
                     $('#project').html(data);
                }
            });
        } 
    });
	
	
	 $(document).ready(function() {

        $(function() {
            $("#export_excel_button").click(function() {
                $("#export_excel_button").removeClass("model-head");
                var filename = $(this).attr("title");
                var uri = $("#report").btechco_excelexport({
                    containerid: "report",
                    datatype: $datatype.Table,
                    returnUri: true
                });

                $(this).attr('download',
                        "Abstract.xls"
                    ) // set file name (you want to put formatted date here)
                    .attr('href', uri) // data to download
                    .attr('target', '_blank') // open in new window (optional)
            });



        });
    });
	
	   function print_receipt() {
        var content = $("#div_vc").html();
        var pwin = window.open("MSL", 'print_content',
            'width=900,height=1000,scrollbars=yes,location=0,menubar=no,toolbar=no');
        pwin.document.open();
        pwin.document.write('<html><head></head><body onload="window.print()"><tr><td>' + content +
            '</td></tr></body></html>');
        pwin.document.close();
    }
</script>
