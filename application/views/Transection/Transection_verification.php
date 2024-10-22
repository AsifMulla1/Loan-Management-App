 <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

 <!-- Begin page content -->
 <div class="container">
     <div class="row">

         <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center py-4">
             <h4 class="mb-3 text-center">
                 <span class=" font-weight-bold  text-center all_head">ट्रान्सएकशन वेरिफिकेशनचे लिस्ट </span>
             </h4>

             <div class="d-flex justify-content-end">

             </div>

             <div class="table-responsive mt-3">
                 <table class="table table-bordered table-striped text-center">

                     <thead>
                         <tr>
                             <th colspan="7">ट्रान्सएकशन वेरिफिकेशनचे लिस्ट.</th>

                         </tr>
                     </thead>
                     <thead style="border-bottom: 2px solid black;">
                         <tr>

                             <th>नं.</th>
                             <th>कोणी पाठवले</th>
                             <th>कोणी घेतले</th>
                             <th>रक्कम</th>
                             <th>तारीख</th>
                             
                             <th>व्हेरिफाय</th>
                             <th>वर्णन</th>

                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach($Transectionverify as $value): ?>
                         <tr>
                             <td><?php echo $value->transectionId; ?></td>
                             <td><?php echo $value->senderName; ?></td>
                             <td><?php echo $value->receiverName; ?></td>
                             <td><?php echo $value->amount; ?></td>
                             <td><?php echo $value->transectionDate; ?></td>
                             
                             <!-- <td>
                                 <?php if($value->Verify == 0): ?>
                                 
                                 <button class="btn btn-primary btn-verify" style="padding: 5px 13px;
    font-size: 16px;
    font-family: revert;background-color:#fa0000;border-color: #fa0000; width:80px;"
                                     data-id="<?php echo $value->transectionId; ?>">Verify</button>
                                 <?php else: ?>
                                 
                                 <button style="padding: 5px 13px;
    font-family: revert; border:none;color:green;font-size: 14px;
    font-weight: bold;" class="btn">Verified...</button>
                                 <?php endif; ?>

                                 
                             </td> -->

                             <td>

                                 <?php if($value->reciverId == $this->session->userdata('EmpId')): ?>
                                 <?php if($value->Verify == 0): ?>

                                 <button class="btn btn-primary btn-verify"
                                     style="padding: 5px 13px;
                        font-size: 16px; font-family: revert; background-color:#fa0000; border-color: #fa0000; width:80px;"
                                     data-id="<?php echo $value->transectionId; ?>">Verify</button>
                                 <?php else: ?>

                                 <button style="padding: 5px 13px;
                        font-family: revert; border:none; color:green; font-size: 14px;
                        font-weight: bold;" class="btn">Verified...</button>
                                 <?php endif; ?>


                                 <?php elseif($value->senderId == $this->session->userdata('EmpId')): ?>
                                 <?php if($value->Verify == 0): ?>
                                 <span style="color: #fa0000; font-weight: bold;">Pending</span>
                                 <?php else: ?>
                                 <span style="color: green; font-weight: bold;">Success</span>
                                 <?php endif; ?>

                                 <?php endif; ?>
                             </td>

                             <td><?php echo $value->transectionDescription; ?></td>
                         </tr>
                         <?php endforeach; ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- <script>
$(document).ready(function() {

    $('.btn-verify').on('click', function() {
        var transectionId = $(this).data('id');
        if (confirm('Are you sure you want to verify this transaction?')) {
            $.ajax({
                url: "<?php echo base_url('Transection/verifyTransaction'); ?>",
                type: "POST",
                data: {
                    transectionId: transectionId
                },
                success: function(response) {
                    alert('Transaction Verified');
                    location.reload(); 
                },
                error: function() {
                    alert('Error verifying transaction');
                }
            });
        }
    });
});
 </script> -->

 <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
 <script src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>

 <script>
$(document).ready(function() {

    $('.btn-verify').on('click', function() {
        var transectionId = $(this).data('id');

        Swal.fire({
            title: 'तुम्हाला खात्री आहे का?',
            text: "तुम्ही हा व्यवहार सत्यापित करणार आहात!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'होय, ते सत्यापित करा!',
            cancelButtonText: 'रद्द करणे!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?php echo base_url('Transection/verifyTransaction'); ?>",
                    type: "POST",
                    data: {
                        transectionId: transectionId
                    },
                    success: function(response) {

                        Swal.fire({
                            icon: 'success',
                            title: 'व्यवहार सत्यापित',
                            text: 'व्यवहार यशस्वीरित्या सत्यापित केला गेला आहे.'
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function() {

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'व्यवहार सत्यापित करताना त्रुटी आली.'
                        });
                    }
                });
            }
        });
    });
});
 </script>