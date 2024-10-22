
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">कर्ज पेमेंट</span></h4>   
                  
                   
                   
                    

                    <input type="hidden" id="TableID" name="TableID" class="form-control" value="<?php if(!empty($dataa[0]->TableID)){echo $dataa[0]->TableID;}?>">
                    <input type="hidden" value="<?php echo $this->session->userdata('EmpId') ?>" id="SessionID">
           


                      <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkmemberId" name="fkmemberId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                          <?php

                            foreach ($membernamereport as $key => $value) {
                            $selected="";
                                                        
                            echo '<option value="'.$value->memberId.'"'.$selected.' >'.$value->memberId.'  '.$value->memberName.'</option>';

                            }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">सदस्याचे नाव</label>
                    </div>
            
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <th>न.</th>
                                        <!-- <th>sessionid</th> -->
                                        <th>हप्ता तारीख</th>
                                        <!-- <th>समाप्ती तारीख</th> -->
                                        <th>देय हप्तातारीख</th>
                                        <th>हप्ता रक्कम</th>
                                        <th>देय हप्तारक्कम</th>
                                        <th>दंड रक्कम</th>
                                        <th>देय दंडरक्कम</th>
                                        <!-- <th>तारीख</th> -->



                                                    
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
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save" name="btn_save">जतन करा</button>
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
// $(document).ready(function() {
//     $('#fkmemberId').change(function() {
//         var fkmemberId = $(this).val();
        
//         // Set the selected fkmemberId to the TableID input field
//         $('#TableID').val(fkmemberId);

//         if (fkmemberId > 0) {

//             $.ajax({
//                 url: '<?= base_url('Payment/GetData') ?>', // Adjust the URL if necessary
//                 type: 'POST',
//                 dataType: 'json',
//                 data: { 'fkmemberId': fkmemberId },
//                 success: function(response) {
//                     var tableBody = $('#tabledata');
//                     tableBody.empty(); // Clear existing data

//                     // Function to format date from yyyy-mm-dd to dd-mm-yyyy
//                     function formatDateToDisplay(dateStr) {
//                         if (!dateStr) return '';
//                         var parts = dateStr.split('-');
//                         return parts[2] + '-' + parts[1] + '-' + parts[0];
//                     }

//                     if (response.length > 0) {
//                         $.each(response, function(index, item) {
//                             var formattedDate = formatDateToDisplay(item.Date);
//                             var formattedPaidDate = formatDateToDisplay(item.PaidDate);

//                             var row = '<tr>' +
//                                 '<td style="width: 30px;">' + (index + 1) + '</td>' +
//                                 '<td style="width: 30px; display: none;"><input type="hidden" name="fkLoanId[]" value="' + item.fkLoanId + '" style="width: 100%;">' + item.fkLoanId + '</td>' +
//                                 '<td style="width: 30px;"><input type="hidden" name="Date[]" value="' + item.Date + '" style="width: 100%;">' + formattedDate + '</td>' +
//                                 '<td style="width: 0%;"><input type="date" name="PaidDate[]" value="' + (item.PaidDate || '') + '" style="width: 100%;"></td>' +
//                                 '<td style="width: 30px;"><input type="hidden" name="HaptaAmount[]" value="' + item.HaptaAmount + '" style="width: 100%;">' + item.HaptaAmount + '</td>' +
//                                 '<td style="width: 30px;"><input type="text" name="PaidHaptaAmount[]" value="' + (item.PaidHaptaAmount || '') + '" style="width: 100%;"></td>' + 
//                                 '<td style="width: 30px;"><input type="hidden" name="dandRakkam[]" value="' + item.dandRakkam + '" style="width: 100%;">' + item.dandRakkam + '</td>' +
//                                 '<td style="width: 30px;"><input type="text" name="PaidDandAmount[]" value="' + (item.PaidDandAmount || '') + '" style="width: 100%;"></td>' + 
//                                 '</tr>';
//                             tableBody.append(row);
//                         });
//                     } else {
//                         tableBody.append('<tr><td colspan="8">No data available</td></tr>');
//                     }
//                 },
//                 error: function(xhr, status, error) {
//                     console.error('AJAX Error: ' + status + error);
//                 }
//             });
//         } else {
//             $('#tabledata').empty(); 
//         }
//     });
// });

// $(document).ready(function() {
//     $('#fkmemberId').change(function() {
//         var fkmemberId = $(this).val();
        
//         $('#TableID').val(fkmemberId);

//         if (fkmemberId > 0) {
//             $.ajax({
//                 url: '<?= base_url('Payment/GetData') ?>', 
//                 type: 'POST',
//                 dataType: 'json',
//                 data: { 'fkmemberId': fkmemberId },
//                 success: function(response) {
//                     var tableBody = $('#tabledata');
//                     tableBody.empty(); 

//                     function formatDateToDisplay(dateStr) {
//                         if (!dateStr) return '';
//                         var parts = dateStr.split('-');
//                         return parts[2] + '-' + parts[1] + '-' + parts[0];
//                     }

//                     var totalHaptaAmount = 0;
//                     var totalPaidHaptaAmount = 0;
//                     var totalDandRakkamAmount = 0;
//                     var totalPaidDandRakkamAmount = 0;

//                     if (response.length > 0) {
//                         $.each(response, function(index, item) {
//                             var formattedDate = formatDateToDisplay(item.Date);
//                             var formattedPaidDate = formatDateToDisplay(item.PaidDate);

//                             totalHaptaAmount += parseFloat(item.HaptaAmount) || 0;
//                             totalPaidHaptaAmount += parseFloat(item.PaidHaptaAmount) || 0;
//                             totalDandRakkamAmount += parseFloat(item.dandRakkam) || 0;
//                             totalPaidDandRakkamAmount += parseFloat(item.PaidDandAmount) || 0;

//                             var row = '<tr>' +
//                                 '<td style="width: 30px;">' + (index + 1) + '</td>' +
//                                 '<td style="width: 30px; display: none;"><input class="qty-display" type="text" name="fkempId[]" value="' + item.modified_by + '" style="width: 100%;" readonly></td>' +
//                                 '<td style="width: 30px; display: none;"><input type="hidden" name="fkLoanId[]" value="' + item.fkLoanId + '" style="width: 100%;"></td>' +
//                                 '<td style="width: 30px;"><input type="hidden" name="Date[]" value="' + item.Date + '" style="width: 100%;">' + formattedDate + '</td>' +
//                                 '<td style="width: 0%;"><input type="date" name="PaidDate[]" value="' + (item.PaidDate || '') + '" style="width: 100%;"></td>' +
//                                 '<td style="width: 30px;"><input type="hidden" name="HaptaAmount[]" value="' + item.HaptaAmount + '" style="width: 100%;">' + item.HaptaAmount + '</td>' +
//                                 '<td style="width: 30px;"><input class="qty-input" type="text" name="PaidHaptaAmount[]" value="' + (item.PaidHaptaAmount || '') + '" style="width: 100%;"></td>' + 
//                                 '<td style="width: 30px;"><input type="hidden" name="dandRakkam[]" value="' + item.dandRakkam + '" style="width: 100%;">' + item.dandRakkam + '</td>' +
//                                 '<td style="width: 30px;"><input type="text" name="PaidDandAmount[]" value="' + (item.PaidDandAmount || '') + '" style="width: 100%;"></td>' + 
//                                 '</tr>';
//                             tableBody.append(row);

//                             var SessionID = $('#SessionID').val();

//                             $(document).on('input', '.qty-input', function() {
//                                 var $row = $(this).closest('tr');
//                                 var newValue = $(this).val();
//                                 if (newValue) {
//                                     $row.find('.qty-display').val(SessionID);
//                                 }
//                             });
//                         });

//                         // Append the total row with a distinct class
//                         var totalRow = '<tr class="total-row">' +
//                             '<td></td>' +
//                             '<td></td>' +
//                             '<td></td>' +
//                             '<td><strong>' + totalHaptaAmount.toFixed(2) + '</strong></td>' +
//                             '<td><strong>' + totalPaidHaptaAmount.toFixed(2) + '</strong></td>' +
//                             '<td><strong>' + totalDandRakkamAmount.toFixed(2) + '</strong></td>' +
//                             '<td><strong>' + totalPaidDandRakkamAmount.toFixed(2) + '</strong></td>' +
//                             '</tr>';
//                         tableBody.append(totalRow);

//                         // Handle readonly logic
//                         $('#tabledata tr').each(function(index) {
//                             var $row = $(this);
//                             if (!$row.hasClass('total-row')) { // Exclude the total row
//                                 var isCurrentRowEmpty = $row.find('input[type="text"]:visible, input[type="date"]:visible').filter(function() {
//                                     var value = $(this).val();
//                                     return value === '' || value === null;
//                                 }).length > 0;

//                                 if (isCurrentRowEmpty && index > 0) {
//                                     $('#tabledata tr').eq(index - 1).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', false);

//                                     for (var i = 0; i < index - 1; i++) {
//                                         $('#tabledata tr').eq(i).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', true);
//                                     }

//                                     for (var j = index; j < $('#tabledata tr').length; j++) {
//                                         $('#tabledata tr').eq(j).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', false);
//                                     }
//                                     return false; 
//                                 }
//                             }
//                         });

//                         // If all rows are filled, make all but the last row readonly
//                         var lastRow = $('#tabledata tr:not(.total-row)').last();
//                         if (lastRow.find('input[type="text"]:visible, input[type="date"]:visible').filter(function() {
//                             var value = $(this).val();
//                             return value !== '' && value !== null && value !== '0';
//                         }).length > 0) {
//                             $('#tabledata tr:not(.total-row)').find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', true);
//                             lastRow.find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', false);
//                         }

//                     } else {
//                         tableBody.append('<tr><td colspan="8">No data available</td></tr>');
//                     }
//                 },
//                 error: function(xhr, status, error) {
//                     console.error('AJAX Error: ' + status + error);
//                 }
//             });
//         } else {
//             $('#tabledata').empty(); 
//         }
//     });
// });

$(document).ready(function() {
    $('#fkmemberId').change(function() {
        var fkmemberId = $(this).val();

        $('#TableID').val(fkmemberId);

        if (fkmemberId > 0) {
            $.ajax({
                url: '<?= base_url('Payment/GetData') ?>',
                type: 'POST',
                dataType: 'json',
                data: { 'fkmemberId': fkmemberId },
                success: function(response) {
                    var tableBody = $('#tabledata');
                    tableBody.empty();

                    function formatDateToDisplay(dateStr) {
                        if (!dateStr) return '';
                        var parts = dateStr.split('-');
                        return parts[2] + '-' + parts[1] + '-' + parts[0];
                    }

                    if (response.length > 0) {
                        var totalHaptaAmount = 0;
                        var totalPaidHaptaAmount = 0;
                        var totalDandRakkamAmount = 0;
                        var totalPaidDandRakkamAmount = 0;

                        $.each(response, function(index, item) {
                            var formattedDate = formatDateToDisplay(item.Date);
                            var formattedPaidDate = formatDateToDisplay(item.PaidDate);

                            totalHaptaAmount += parseFloat(item.HaptaAmount) || 0;
                            totalPaidHaptaAmount += parseFloat(item.PaidHaptaAmount) || 0;
                            totalDandRakkamAmount += parseFloat(item.dandRakkam) || 0;
                            totalPaidDandRakkamAmount += parseFloat(item.PaidDandAmount) || 0;

                            var row = '<tr>' +
                                '<td style="width: 30px;">' + (index + 1) + '</td>' +
                                '<td style="width: 30px; display: none;"><input class="qty-display" type="text" name="fkempId[]" value="' + item.modified_by + '" style="width: 100%;" readonly></td>' +
                                '<td style="width: 30px; display: none;"><input type="hidden" name="fkLoanId[]" value="' + item.fkLoanId + '" style="width: 100%;"></td>' +
                                '<td style="width: 30px;"><input type="hidden" name="Date[]" value="' + item.Date + '" style="width: 100%;">' + formattedDate + '</td>' +
                                '<td style="width: 0%;"><input type="date" name="PaidDate[]" value="' + (item.PaidDate || '') + '" style="width: 100%;"></td>' +
                                '<td style="width: 30px;"><input type="hidden" name="HaptaAmount[]" value="' + item.HaptaAmount + '" style="width: 100%;">' + item.HaptaAmount + '</td>' +
                                '<td style="width: 30px;"><input class="qty-input" type="number" name="PaidHaptaAmount[]" value="' + (item.PaidHaptaAmount || '') + '" style="width: 100%;"></td>' +
                                '<td style="width: 30px;"><input type="hidden" name="dandRakkam[]" value="' + item.dandRakkam + '" style="width: 100%;">' + item.dandRakkam + '</td>' +
                                '<td style="width: 30px;"><input class="qty-input-dand" type="number" name="PaidDandAmount[]" value="' + (item.PaidDandAmount || '') + '" style="width: 100%;"></td>' +
                                '</tr>';
                            tableBody.append(row);

                            var SessionID = $('#SessionID').val();
                            $(document).on('input', '.qty-input', function() {
                                var $row = $(this).closest('tr');
                                var newValue = $(this).val();
                                if (newValue) {
                                    $row.find('.qty-display').val(SessionID);
                                }
                            });
                        });

                        // Append the total row with distinct IDs
                        var totalRow = '<tr class="total-row">' +
                            '<td></td>' + // Index
                            '<td></td>' + // fkempId[] (hidden)
                            '<td></td>' + // fkLoanId[] (hidden)
                            '<td id="totalHapta" style="font-weight: bold;">' + ' ' + totalHaptaAmount.toFixed(2) +
                                ' <input id="FirstEqual" type="hidden" readonly>' +
                            '</td>' +
                            '<td id="totalPaidHapta" style="font-weight: bold;">' + totalPaidHaptaAmount.toFixed(2) +
                                ' <input id="mainEqual" name="IsActive"   type="hidden" readonly>' + // New mainEqual input added
                            '</td>' +
                            '<td id="totalDandRakkam" style="font-weight: bold;">' +' ' + totalDandRakkamAmount.toFixed(2) +
                                ' <input id="SecondEqual" type="hidden"  readonly>' +
                            '</td>' +
                            '<td id="totalPaidDand" style="font-weight: bold;">' + totalPaidDandRakkamAmount.toFixed(2) + '</td>' +
                            '</tr>';
                        tableBody.append(totalRow);

                         // Handle readonly logic
                        $('#tabledata tr').each(function(index) {
                            var $row = $(this);
                            if (!$row.hasClass('total-row')) { // Exclude the total row
                                var isCurrentRowEmpty = $row.find('input[type="text"]:visible, input[type="date"]:visible').filter(function() {
                                    var value = $(this).val();
                                    return value === '' || value === null;
                                }).length > 0;

                                if (isCurrentRowEmpty && index > 0) {
                                    $('#tabledata tr').eq(index - 1).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', false);

                                    for (var i = 0; i < index - 1; i++) {
                                        $('#tabledata tr').eq(i).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', true);
                                    }

                                    for (var j = index; j < $('#tabledata tr').length; j++) {
                                        $('#tabledata tr').eq(j).find('input[type="text"]:visible, input[type="date"]:visible').prop('readonly', false);
                                    }
                                    return false; 
                                }
                            }
                        });

                        
                        

                        // Check if totalHaptaAmount equals totalPaidHaptaAmount and set FirstEqual accordingly
                        if (totalHaptaAmount <= totalPaidHaptaAmount ) {
                            $('#FirstEqual').val(0);
                        } else {
                            $('#FirstEqual').val(1);
                        }

                        // Check if totalDandRakkamAmount equals totalPaidDandRakkamAmount and set SecondEqual accordingly
                        if (totalDandRakkamAmount <= totalPaidDandRakkamAmount) {
                            $('#SecondEqual').val(0);
                        } else {
                            $('#SecondEqual').val(1);
                        }

                        // Set mainEqual value based on FirstEqual and SecondEqual values
                        if ($('#FirstEqual').val() == 0 && $('#SecondEqual').val() == 0) {
                            $('#mainEqual').val(0);
                        } else {
                            $('#mainEqual').val(1);
                        }

                        // Update totals dynamically on input change
                        $(document).on('input', '.qty-input, .qty-input-dand', function() {
                            updateTotals();
                        });

                        function updateTotals() {
                            var totalHaptaAmount = 0;
                            var totalPaidHaptaAmount = 0;
                            var totalDandRakkamAmount = 0;
                            var totalPaidDandRakkamAmount = 0;

                            $('#tabledata tr').each(function() {
                                var $row = $(this);
                                if (!$row.hasClass('total-row')) {
                                    totalHaptaAmount += parseFloat($row.find('input[name="HaptaAmount[]"]').val()) || 0;
                                    totalPaidHaptaAmount += parseFloat($row.find('input[name="PaidHaptaAmount[]"]').val()) || 0;
                                    totalDandRakkamAmount += parseFloat($row.find('input[name="dandRakkam[]"]').val()) || 0;
                                    totalPaidDandRakkamAmount += parseFloat($row.find('input[name="PaidDandAmount[]"]').val()) || 0;
                                }
                            });

                            // Update the totalHapta and totalDandRakkam cells
                            $('#totalHapta').html(
                                ' ' + totalHaptaAmount.toFixed(2) +
                                ' <input id="FirstEqual"  type="hidden" readonly>'
                            );

                            $('#totalDandRakkam').html(
                                ' ' + totalDandRakkamAmount.toFixed(2) +
                                ' <input id="SecondEqual" type="hidden" readonly>'
                            );

                            // Update other totals
                            $('#totalPaidHapta').html(
                                totalPaidHaptaAmount.toFixed(2) +
                                ' <input id="mainEqual" name="IsActive" type="hidden" readonly>'
                            );
                            $('#totalPaidDand').text(totalPaidDandRakkamAmount.toFixed(2));

                            // After updating totals, check equality and set FirstEqual
                            if (totalHaptaAmount <= totalPaidHaptaAmount) {
                                $('#FirstEqual').val(0);
                            } else {
                                $('#FirstEqual').val(1);
                            }

                            // After updating totals, check equality and set SecondEqual
                            if (totalDandRakkamAmount <= totalPaidDandRakkamAmount) {
                                $('#SecondEqual').val(0);
                            } else {
                                $('#SecondEqual').val(1);
                            }

                            // Set mainEqual value based on FirstEqual and SecondEqual values
                            if ($('#FirstEqual').val() == 0 && $('#SecondEqual').val() == 0) {
                                $('#mainEqual').val(0);
                            } else {
                                $('#mainEqual').val(1);
                            }
                        }

                        // Handle readonly logic
                        // $('#tabledata tr').each(function(index) {
                        //     var $row = $(this);
                        //     if (!$row.hasClass('total-row')) { // Exclude the total row
                        //         if ($row.find('input[name="PaidHaptaAmount[]"]').val() || 
                        //             $row.find('input[name="PaidDandAmount[]"]').val()) {
                        //             // Make all previous rows readonly
                        //             $('#tabledata tr').slice(0, index).find('input').attr('readonly', true);
                        //         }
                        //     }
                        // });
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});

</script>




<script>

var a=false;
$(document).ready(function(){
$("#btn_save").click(function(){
// alert('Save');
  if(a==false){
    
    // alert("hii");
    saveperform();
   }
  }); 
});


 function saveperform() 
{ 
    var fkmemberId=$('#fkmemberId').val();
    
    if(fkmemberId== 0) 
    {

      Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Please Enter Required Fields',
  
      })
      
    }

    // else
    // {
    // 	if(TableID>0)
    // 	{
      //       a=true;
    	
    		// $.ajax({
      //   url:base_path+"Country/updateCountry",
      //   type: "POST",
      //   data: $('#Form').serialize(),
      //    beforeSend: function(){
      //          $('#btn_save').prop('disabled', true);
      //          $('#btn_save').html('Loading');
      //     }, 
      //   success: function(data) {
      //      $('#btn_save').prop('disabled', false);
      //      $('#btn_save').html('<img src="'+base_path+'assets/images/save.png" width="21"> Save');
             
      //       swal({
      //       title:"",
      //       text:"Data Submitted Successfully",
      //       type:"success",
      //       showCancelButton: true, 
      //       showConfirmButton: false,
      //       timer:10000
      //   }); a=false;
      //       window.location.href = base_path+"Country";
      //     }
      // });
    	// }
        else
    	{a=true;
    		
    		$.ajax({
        url:base_path+"Payment/UpdatePayment",
        type: "POST",
        data: $('#Form').serialize(),
         beforeSend: function(){
               $('#btn_save').prop('disabled', true);
               $('#btn_save').html('Loading');
          }, 
        success: function(data) {
           console.log(data);
            $('#btn_save').prop('disabled', false);
           $('#btn_save').html('Save');
             $("#Form").trigger("reset");
             Swal.fire({
             position: 'center',
             icon: 'success',
             title: 'Data sumitted successfully',
             showConfirmButton: false,
             timer: 900
             }).then(function () {
            // Reload the page after the success message
            location.reload();
          });
          
           a=false;

            },
            error: function (xhr, status, error) {
          console.log("Error: " + error);
          $('#btn_save').prop('disabled', false);
          $('#btn_save').html('Save');
          a = false;
        }
        });
    	}
      }
//  }

</script>


