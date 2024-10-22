
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">ट्रान्सएकशन रिपोर्ट (Report)</span>
            </h4>   
                  
                   
                   
                    

                    <input type="hidden" id="TableID" name="TableID" class="form-control" value="<?php if(!empty($dataa[0]->TableID)){echo $dataa[0]->TableID;}?>">
                    <!-- <input type="hidden" value="<?php echo $this->session->userdata('EmpId') ?>" id="SessionID"> -->
           


                      <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="senderId" name="senderId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                          <?php

                            foreach ($employeenamereport as $key => $value) {
                            $selected="";
                                                        
                            echo '<option value="'.$value->EmpId.'"'.$selected.' >'.$value->EmpId.'  '.$value->userName.'</option>';

                            }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">कर्मचारी नाव</label>
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="startdt" name="">
                        <label for="">
                        तारखेपासून</label>
                       
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="enddt" name="">
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
                                        <th colspan="7">पैसे कुना कुणाला आलेत आणि गेलेत याचा रिपोर्ट.</th>

                                    </tr>
                                </thead>
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <!-- <th>Sender</th>
                                        <th>Reciver</th> -->
                                        <th>पैसे कुना कुणाला आलेत आणि गेलेत</th>
                                        <th>तारीख</th>
                                        <th>गेलेत (Debit)</th>
                                        <th>आलेत (creadit)</th>
                                        
                                        


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

<!-- <script>
$(document).ready(function() {
    document.getElementById('startdt').valueAsDate = new Date();
    document.getElementById('enddt').valueAsDate = new Date();

    $("#searchbutton").click(function() {
        let senderId = $('#senderId').val();
        let startDate = $('#startdt').val();
        let endDate = $('#enddt').val();

        $.ajax({
            url: "<?php echo base_url();?>TransectionReport/GetData",
            method: "POST",
            data: {
                'senderId': senderId,
                'startDate': startDate,
                'endDate': endDate
            },
            success: function(res) {
                console.log("Response:", res);
                let data;
                try {
                    data = JSON.parse(res);
                    console.log("Data:", data);
                } catch (error) {
                    console.error("Parsing Error:", error);
                    return;
                }

                let tableBody = $('#tabledata');
                tableBody.empty();

                let totalHaptaAmount = 0;
                let totaldandRakkam = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(row) {
                        // totalHaptaAmount += parseFloat(row.amount) || 0;
                        // totaldandRakkam += parseFloat(row.amount) || 0;

                        let formattedTransectionDate = formatDate(row.transectionDate);

                        // Check if senderName sent amount to receiverName
                        let additionalTdSender = '';
                        let additionalTdReceiver = '';
                        
                        if (row.senderName > row.receiverName) {
                            additionalTdSender = `<td>${row.amount}</td><td>0</td>`;
                        } else if (row.senderName < row.receiverName) {
                            additionalTdReceiver = `<td>0</td><td>${row.amount}</td>`;
                        }

                        tableBody.append(
                            `<tr>
                                <td>${row.senderName}</td>
                                <td>${row.receiverName}</td>
                                <td>${formattedTransectionDate}</td>
                                ${additionalTdSender || additionalTdReceiver} 
                            </tr>`
                        );
                    });

                    // tableBody.append(
                    //     `<tr>
                    //         <td colspan="3"><strong>Total:</strong></td>
                    //         <td><strong style="color:green;">${totalHaptaAmount.toFixed(2)}</strong></td>
                    //         <td><strong style="color:red;">${totaldandRakkam.toFixed(2)}</strong></td>
                    //     </tr>`
                    // );
                } else {
                    tableBody.append('<tr><td colspan="7">कोणतेही रेकॉर्ड आढळले नाही</td></tr>');
                    
                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही!',
                        text: '',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    function formatDate(dateString) {
        if (!dateString) return '';
        let date = new Date(dateString);
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }
});

</script> -->
<!-- <script>
$(document).ready(function() {
    document.getElementById('startdt').valueAsDate = new Date();
    document.getElementById('enddt').valueAsDate = new Date();

    $("#searchbutton").click(function() {
        let senderId = $('#senderId').val();
        let startDate = $('#startdt').val();
        let endDate = $('#enddt').val();

        $.ajax({
            url: "<?php echo base_url();?>TransectionReport/GetData",
            method: "POST",
            data: {
                'senderId': senderId,
                'startDate': startDate,
                'endDate': endDate
            },
            success: function(res) {
                console.log("Response:", res);
                let data;
                try {
                    data = JSON.parse(res);
                    console.log("Data:", data);
                } catch (error) {
                    console.error("Parsing Error:", error);
                    return;
                }

                let tableBody = $('#tabledata');
                tableBody.empty();

                let totalSenderAmount = 0;
                let totalReceiverAmount = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(row) {
                        let formattedTransectionDate = formatDate(row.transectionDate);

                        
                        let additionalTdSender = '';
                        let additionalTdReceiver = '';
                        
                        if (row.senderName > row.receiverName) {
                            additionalTdSender = `<td>${row.amount}</td><td>0</td>`;
                            totalSenderAmount += parseFloat(row.amount) || 0; 
                        } else if (row.senderName < row.receiverName) {
                            additionalTdReceiver = `<td>0</td><td>${row.amount}</td>`;
                            totalReceiverAmount += parseFloat(row.amount) || 0;
                        }

                        tableBody.append(
                            `<tr>
                                <td>${row.senderName}</td>
                                <td>${row.receiverName}</td>
                                <td>${formattedTransectionDate}</td>
                                ${additionalTdSender || additionalTdReceiver} 
                            </tr>`
                        );
                    });

                    tableBody.append(
                        `<tr>
                            <td colspan="3"><strong></strong></td>
                            <td><strong style="color:green;">${totalSenderAmount.toFixed(2)}</strong></td>
                            <td><strong style="color:red;">${totalReceiverAmount.toFixed(2)}</strong></td>
                        </tr>`
                    );
                } else {
                    tableBody.append('<tr><td colspan="7">कोणतेही रेकॉर्ड आढळले नाही</td></tr>');
                    
                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही!',
                        text: '',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    function formatDate(dateString) {
        if (!dateString) return '';
        let date = new Date(dateString);
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }
});
</script> -->

<!-- <script>
   $(document).ready(function() {
    // Set current date in date fields
    document.getElementById('startdt').valueAsDate = new Date();
    document.getElementById('enddt').valueAsDate = new Date();

    $("#searchbutton").click(function() {
        let senderId = $('#senderId').val();
        let startDate = $('#startdt').val();
        let endDate = $('#enddt').val();

        $.ajax({
            url: "<?php echo base_url();?>TransectionReport/GetData",
            method: "POST",
            data: {
                'senderId': senderId,
                'startDate': startDate,
                'endDate': endDate
            },
            success: function(res) {
                let data;
                try {
                    data = JSON.parse(res); 
                } catch (error) {
                    console.error("Parsing Error:", error);
                    return;
                }

                let tableBody = $('#tabledata');
                tableBody.empty();

                let totalSenderAmount = 0;
                let totalReceiverAmount = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(row) {
                        let formattedTransectionDate = formatDate(row.transectionDate);

                        
                        let matchedReceiverName = '';
                        if (row.senderId == senderId) {
                            matchedReceiverName = row.receiverName; 
                        } else if (row.receiverId == senderId) {
                            matchedReceiverName = row.senderName; 
                        }

                        
                        let additionalTdSender = (row.senderId == senderId) ? `<td>${row.amount}</td><td>0</td>` : '';
                        let additionalTdReceiver = (row.receiverId == senderId) ? `<td>0</td><td>${row.amount}</td>` : '';

                        if (additionalTdSender) {
                            totalSenderAmount += parseFloat(row.amount) || 0;
                        }
                        if (additionalTdReceiver) {
                            totalReceiverAmount += parseFloat(row.amount) || 0;
                        }

                        
                        tableBody.append(`
                            <tr>
                                <td>${row.senderName}</td>
                                <td>${row.receiverName}</td>
                                <td>${formattedTransectionDate}</td>
                                ${additionalTdSender || additionalTdReceiver}
                                <td>${matchedReceiverName}</td> 
                            </tr>
                        `);
                    });

                    
                    tableBody.append(`
                        <tr>
                            <td colspan="3"><strong>Total</strong></td>
                            <td><strong style="color:green;">${totalSenderAmount.toFixed(2)}</strong></td>
                            <td><strong style="color:red;">${totalReceiverAmount.toFixed(2)}</strong></td>
                            <td></td> 
                        </tr>
                    `);
                } else {
                    tableBody.append('<tr><td colspan="7">कोणतेही रेकॉर्ड आढळले नाही</td></tr>');

                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही!',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });


    function formatDate(dateString) {
        if (!dateString) return '';
        let date = new Date(dateString);
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }
});


</script> -->


<script>
    $(document).ready(function() {
    // Set current date in date fields
    document.getElementById('startdt').valueAsDate = new Date();
    document.getElementById('enddt').valueAsDate = new Date();

    $("#searchbutton").click(function() {
        let senderId = $('#senderId').val();  // Can be empty if no selection
        let startDate = $('#startdt').val();
        let endDate = $('#enddt').val();

        $.ajax({
            url: "<?php echo base_url();?>TransectionReport/GetData",
            method: "POST",
            data: {
                'senderId': senderId,
                'startDate': startDate,
                'endDate': endDate
            },
            success: function(res) {
                let data;
                try {
                    data = JSON.parse(res); // Parse the response JSON
                } catch (error) {
                    console.error("Parsing Error:", error);
                    return;
                }

                let tableBody = $('#tabledata');
                tableBody.empty();  // Clear previous data

                let totalSenderAmount = 0;
                let totalReceiverAmount = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(row) {
                        let formattedTransectionDate = formatDate(row.transectionDate);

                        let matchedReceiverName = '';
                        if (senderId) {  // Only if senderId is selected
                            if (row.senderId == senderId) {
                                matchedReceiverName = row.receiverName + ` <span style="color: red;">(गेलेले पैसे)</span>`; ;
                            } else if (row.receiverId == senderId) {
                                matchedReceiverName = row.senderName + ` <span style="color: green;">(आलेले पैसे)</span>`; ;
                            }
                        }

                        // If no senderId is selected, show all amounts
                        let senderAmount = (row.senderId == senderId || !senderId) ? row.amount : '-';
                        let receiverAmount = (row.receiverId == senderId || !senderId) ? row.amount : '-';

                        // Add amounts to totals
                        totalSenderAmount += parseFloat(senderAmount) || 0;
                        totalReceiverAmount += parseFloat(receiverAmount) || 0;

                        // Append row to table
                        tableBody.append(`
                            <tr>
                                <td class="d-none">${row.senderName}</td>
                                <td class="d-none">${row.receiverName}</td>
                                 <td>${matchedReceiverName || 'N/A'}</td> <!-- Matched receiver name -->
                                <td>${formattedTransectionDate}</td>
                                <td style="color:red;">${senderAmount}</td>
                                <td style="color:green;">${receiverAmount}</td>
                               
                            </tr>
                        `);
                    });

                    // Append total row
                    tableBody.append(`
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td><strong style="color:red;">${totalSenderAmount.toFixed(2)}</strong></td>
                            <td><strong style="color:green;">${totalReceiverAmount.toFixed(2)}</strong></td>
                            
                        </tr>
                    `);
                } else {
                    tableBody.append('<tr><td colspan="4">कोणतेही रेकॉर्ड आढळले नाही</td></tr>');

                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही!',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });

    // Function to format the date into DD-MM-YYYY
    function formatDate(dateString) {
        if (!dateString) return '';
        let date = new Date(dateString);
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();
        return `${day}-${month}-${year}`;
    }
});

</script>
