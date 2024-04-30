<style>
    .mdl-tabs__tab.tabs_three:hover {
        color: #6610f2 !important;
    }

    a.mdl-tabs__tab.tabs_three {
        max-width: 20%;
    }
</style>
<?php echo $this->Form->create($projectAdministrativeSanction, ['id' => 'FormID', 'class' => 'form-horizontal', "autocomplete" => "off", 'enctype' => 'multipart/form-data']); ?>
<div class="col-md-12"><?php //echo 'hi'; exit(); ?>
    <div class="card card-topline-aqua">
        	<div class="card-head">
				<header>Special Repair Works Details (WIP)</header>	
                     <?php if($role_id == 1){  ?>
				     <div class="tools">
					  <?php echo $this->Html->link(__('Add Special Repair<i class="fa fa-plus"></i>'), ['action' => 'sradd'], ['escape' => false, 'class' => ' btn btn-info']); ?>
				    </div>
					<?php  } ?>						
			</div>
		  <div class="card-body"> 
		    <div class="col-md-12">
				<div class="form-group row">
					<label class="control-label col-md-2">Financial Year<span class="required">*</span></label>
					<div class="col-md-4">
                         <?php echo $this->Form->control('financial_year_id', ['class' => 'form-select', 'templates' => ['inputContainer' => '{{content}}'], 'options' => $financialYears, 'label' => false, 'error' => false, 'empty' => 'Select Financial Year']); ?>
					</div>
					<label class="control-label col-md-2">District<span class="required">*</span></label>
					<div class="col-md-4">
                         <?php echo $this->Form->control('district_id', ['class' => 'form-select', 'templates' => ['inputContainer' => '{{content}}'], 'options' => $districts, 'label' => false, 'error' => false, 'empty' => 'Select District','onchange'=>'loadcircle(this.value)']); ?>
					</div>
				</div>
                <div class="form-group row">
					<label class="control-label col-md-2">Ref. No.<span class="required">*</span></label>
					<div class="col-md-4">
                         <?php  echo $this->Form->control('ref_no', ['class' => 'form-control', 'templates' => ['inputContainer' => '{{content}}'], 'label' => false, 'error' => false, 'type' => 'text']); ?>
					</div>
					<?php if($role_id == 9 || $role_id == 6 || $role_id == 1){ ?>
                    <label class="control-label col-md-2">Division<span class="required"> * </span></label>
					<div class="col-md-4">
                         <?php  echo $this->Form->control('division_id', ['class' => 'form-select', 'templates' => ['inputContainer' => '{{content}}'], 'options' => $divisions, 'label' => false, 'error' => false, 'empty' => 'Select Division']); ?>
					</div>	
					<?php } ?>					
				</div>  				
		    </div> 
		      <div class="form-group" style="margin-top:10px;">
				<div class="offset-md-6 col-md-10">
					<button type="submit" class="btn btn-info ">Get Details</button>  
				</div>
			 </div>
		  </div>		  
	 </div>  
 </div><br>
<?php echo $this->Form->End(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">           
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-12">                       
                        <div class="table-scrollable user-table">
                            <table class="table  table-bordered table-checkable order-column mobile-table" id="example4">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width:2%;">Sno</th>
                                        <th style="width:10%;">Financial Year</th>
                                        <th style="width:10%;">Ref No</th>
                                        <th style="width:20%;">Work Name</th>
                                        <th style="width:5%;">Place</th>
                                        <th style="width:8%;">Division</th>
                                        <th style="width:8%;">District</th>
								        <th style="width:8%;">Status</th>									
                                        <th style="width:10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sno = 1;
                                    foreach ($oldProjectWorkDetails as $oldProjectWorkDetail) : ?>
                                        <tr class="odd gradeX">
                                            <td class="text-center"><?php echo $sno; ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['fy_name'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['ref_no'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['projectname'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['place_name'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['diname'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['dname'] ?></td>
                                            <td class="title"><?php echo $oldProjectWorkDetail['work_status'] ?></td>
                                          
                                            <td class="text-center">  
											<?php if($role_id == 9 || $role_id == 14){ ?>
											    <?php if($project_count[$oldProjectWorkDetail['id']] == 0){  ?>
												<?php if($role_id == 9 || $role_id == 14){ ?>
												    <?php echo $this->Html->link(__('<i class="fa fa-pencil"></i> Edit'), ['action' => 'repairbasicdetail',$oldProjectWorkDetail['id']], ['escape' => false, 'class' => 'btn btn-outline-danger btn-sm']); ?>&nbsp;&nbsp;&nbsp;
												<?php }  }else{ 
												 if($role_id == 9 || $role_id == 14){ ?>												 
												    <?php  echo $this->Html->link(__('<i class="fa fa-pencil"></i> Update'), ['action' => 'repairbasicdetail',$oldProjectWorkDetail['id'],$project[$oldProjectWorkDetail['id']]['project_work_id'],$project[$oldProjectWorkDetail['id']]['id']], ['escape' => false, 'class' => 'btn btn-outline-success btn-sm']); ?><br><br>
												     <?php  echo $this->Html->link(__('<i class="fa fa-pencil"></i> Contractor Rate'), ['action' => 'contractorratedetails',$oldProjectWorkDetail['id'],$project[$oldProjectWorkDetail['id']]['project_work_id'],$project[$oldProjectWorkDetail['id']]['id']], ['escape' => false, 'class' => 'btn btn-outline-danger btn-sm']); ?><br><br>
													 <?php  if($project[$oldProjectWorkDetail['id']]['project_work_status_id'] >= 7){ ?>
												      <?php  echo $this->Html->link(__('<i class="fa fa-pencil"></i>Abstract New Update'), ['action' => 'newabstractdetail',$oldProjectWorkDetail['id'],$project[$oldProjectWorkDetail['id']]['project_work_id'],$project[$oldProjectWorkDetail['id']]['id']], ['escape' => false, 'class' => 'btn btn-outline-danger btn-sm']); ?><br><br>
													  <?php } ?>

													<?php  echo $this->Html->link(__('<i class="fa fa-eye"></i> View'), ['controller'=>'ProjectWorks','action' => 'workview',$project[$oldProjectWorkDetail['id']]['project_work_id'],$project[$oldProjectWorkDetail['id']]['id']], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm','target'=>'_blank']); ?>
												<?php  }else{ ?>
    											   <?php  echo $this->Html->link(__('<i class="fa fa-eye"></i> View'), ['controller'=>'ProjectWorks','action' => 'workview',$project[$oldProjectWorkDetail['id']]['project_work_id'],$project[$oldProjectWorkDetail['id']]['id']], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm','target'=>'_blank']); ?>
												<?php }  }  ?>
												<?php }else if($role_id == 1){ ?>
												   <?php echo $this->Html->link(__('<i class="fa fa-pencil"></i> Edit'), ['action' => 'sredit',$oldProjectWorkDetail['id']], ['escape' => false, 'class' => 'btn btn-outline-primary btn-sm']); ?><br><br>
												   <?php echo $this->Html->link(__('<i class="fa fa-trash"></i> Delete'), ['action' => 'delete',$oldProjectWorkDetail['id']], ['confirm' => __('Are you sure you want to delete Project - {0}?',  $oldProjectWorkDetail['projectname']), 'class' => 'btn btn-outline-danger btn-sm', 'escape' => false]); ?>

											<?php  } ?>
											</td>
                                        </tr>
                                    <?php $sno++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".btn-sweetalert").attr("onclick", "").unbind("click"); //remove function onclick button
	
	  $("#FormID").validate({
        rules: {
            'financial_year_id': {
                required: false
            },
            'department_id': {
                required: false
            }          
        },
        messages: {
            'financial_year_id': {
                required: "Select Financial Year"
            },
            'department_id': {
                required: "Select Department"
            }
        },
        submitHandler: function(form) {			
			var fin_id = $('#financial-year-id').val();
			var dist_id = $('#district-id').val();
			var ref_no = $('#ref-no').val();
			var division_id = $('#district-id').val();			
			if(fin_id != '' || dist_id != '' || ref_no != '' || division_id != ''){           
               form.submit();			 
			}else{
				alert('Select any one input!');
				return false;				
			}
        }
    });   
	
	 function loadcircle(id){
        // alert(id);
        if(id){            
				 $.ajax({
                    type: 'POST',
                    url: '<?php echo $this->Url->webroot ?>/ProjectWorks/ajaxdivisions/'+ id,
                    success: function(data1, textStatus1) {
						var value2 = parseInt(data1);
                        // alert(value2)
                        $('#division-id').val(value2);
                        //$('#project-division-id1').val(value2);
                      
                    }
                });
        }else{
            $('#project-division-id').html('<option value="">Select division</option>');
            $('#project-circle-id').html('<option value="">Select Circle</option>');

        }
    }
	
	
	
</script>
