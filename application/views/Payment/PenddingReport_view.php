
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">राहिलेला रिपोर्ट ( अहवाल )</span></h4>   
                  
                   
                   
                    

                    <input type="hidden" id="TableID" name="TableID" class="form-control" value="<?php if(!empty($dataa[0]->TableID)){echo $dataa[0]->TableID;}?>">
                    <!-- <input type="hidden" value="<?php echo $this->session->userdata('EmpId') ?>" id="SessionID"> -->
           


                      <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkmemberId" name="fkmemberId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                          <?php

                            foreach ($employeenamereport as $key => $value) {
                            $selected="";
                                                        
                            echo '<option value="'.$value->memberId.'"'.$selected.' >'.$value->memberId.'  '.$value->memberName.'</option>';

                            }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">कर्मचारी नाव</label>
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="startdt" name="startDate">
                        <label for="">
                        तारखेपासून</label>
                       
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="enddt" name="startDate">
                        <label for="">तारखेपर्यंत</label>
                       
                    </div>
            
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                            <thead>
                                    <tr>
                                        <th colspan="5">तारखेनुसार राहिलेला रिपोर्ट ( अहवाल ).</th>

                                    </tr>
                                </thead>
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                    <th>कर्मचारी नाव</th>
                                        <th>सदस्याचे नाव</th>
                                        <th>हप्ता रक्कम</th>
                                        <th>दंड रक्कम</th>
                                        <th>हप्ता तारीख</th>
                                        <!-- <th>देय हप्तातारीख</th> -->
                                        <!-- <th>देय हप्तारक्कम</th>
                                        <th>दंड रक्कम</th>
                                        <th>देय दंडरक्कम</th>
                                        <th>तारीख</th> -->



                                                    
                                    </tr>
                                </thead>
                                <tbody id="tabledata">
                                                  
                                </tbody>
                            </table>
                        </div>
            
                    </div>
                </div>
           </div>

            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                       <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="searchbutton" name="searchbutton">शोधा</button>
                    </div>
                </div>
            </div>
            
        </div>

         
        <!-- </div> -->
    </form>
</div>

<script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 
<!-- <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/AppointmentCreate.js"></script> -->
<script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

<script>
    $(document).ready(function() {
        $("#searchbutton").click(function() {
            let fkmemberId = $('#fkmemberId').val() || null; // Use null if empty
            let startDate = $('#startdt').val() || null; // Use null if empty
            let endDate = $('#enddt').val() || null; // Use null if empty

            $.ajax({
                url: "<?php echo base_url();?>PenddingReport/GetData",
                method: "POST",
                data: {
                    'fkmemberId': fkmemberId,
                    'startDate': startDate,
                    'endDate': endDate
                },
                success: function(res) {
                    console.log("Response:", res); // Log the raw response
                    let data;
                    try {
                        data = JSON.parse(res);
                        console.log("Data:", data); // Log the parsed data
                    } catch (error) {
                        console.error("Parsing Error:", error);
                        return; // Exit if parsing fails
                    }

                    let tableBody = $('#tabledata');
                    tableBody.empty();  

                    let totalHaptaAmount = 0;
                    let totalDandRakkam = 0;

                    // Function to format date as dd-mm-yy
                    function formatDateToDisplay(dateStr) {
                        if (!dateStr) return '';
                        var parts = dateStr.split('-');
                        return parts[2] + '-' + parts[1] + '-' + parts[0];
                    }

                    if (Array.isArray(data) && data.length > 0) {
                        data.forEach(function(row) {
                            totalHaptaAmount += parseFloat(row.HaptaAmount) || 0;
                            totalDandRakkam += parseFloat(row.dandRakkam) || 0;

                            tableBody.append(
                                `<tr>
                                    <td>${row.userName}</td>
                                    <td>${row.memberName}</td>
                                    <td>${row.HaptaAmount}</td>
                                    <td>${row.dandRakkam}</td>
                                    <td>${formatDateToDisplay(row.Date)}</td>
                                    
                                </tr>`
                            );
                        });

                        // Append a new row with the total amount
                        tableBody.append(
                            `<tr>
                                <td colspan="2"></td>
                                <td><strong style="color:green;">${totalHaptaAmount.toFixed(2)}</strong></td>
                                <td><strong style="color:red;">${totalDandRakkam.toFixed(2)}</strong></td>
                                <td colspan="1"></td>
                            </tr>`
                        );
                    } else {
                        tableBody.append('<tr><td colspan="6">कोणतेही रेकॉर्ड आढळले नाही</td></tr>'); 
                        
                        Swal.fire({
                            icon: 'info',
                            title: 'कोणतेही रेकॉर्ड नाही',
                            text: '',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                }
            });
        });
    });
</script>





