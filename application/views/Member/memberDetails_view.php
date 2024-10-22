
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- Begin page content -->
    <div class="container">
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">सदस्यांची यादी</span></h4>
                      
                       <div class="d-flex justify-content-end">
                      <a href="<?=base_url("Member/create") ?>"><button class="btn btn-primary" style="    padding: 5px 13px;
    font-size: 16px;
    font-family: revert;"><i class="fas fa-plus-circle"></i>&nbsp;नवीन जोडा</button></a></div>
                   <!--  <div class="d-flex justify-content-end">
                      <a href="<?=base_url("Member/create") ?>"><button class="btn btn-primary" style="padding: 5px 13px;
    font-size: 14px;"><i class="fas fa-plus-circle"></i>&nbsp;Add New</button></a></div> -->
    
              	  <div class="table-responsive mt-3">
    <table class="table table-bordered table-striped text-center">
                                                <thead style="border-bottom: 2px solid black;">
                                                    <tr>
                                                    <th style="width: 30px!important;"></th>
                                                    <th>न.</th>
                                                    <th>सदस्याचे नाव</th>
                                                    <th>मोबाईल</th>
                                                    <!-- <th >wtsAppNo</th> -->
                                                    <th>पत्ता</th>
                                                    <!-- <th>Date Of Birth</th> -->
                                                    <!-- <th>AdharNo</th> -->
                                                    <th>नोंदणी</th>
                                                   

                                                    </tr>
                                                </thead>
                                                <!-- <tbody>
                                                    <?php 
                                                    $i =0;


                                      foreach($member as $rw=>$value){
                                  // $test=$value->PurchaseRequisitionFor;
                                  // if ( $test == 1) {
                                  //                    $PurchaseRequisitionFor = "Regular";
                                  //                   }else {
                                  //                     $PurchaseRequisitionFor = "Transfer";
                                  //                   }




               echo "<tr>";
                echo  '<td><a href="'.base_url().'Member/update/'.$value->memberId.'"><i class="fas fa-eye" style="font-size: 16px;"></i></a></td>';

              echo "<td>".$value->memberId."</td>";
               echo "<td>".$value->memberName."</td>";$i++;
               echo "<td>".$value->mobileNo."</td>";
              //  echo "<td>".$value->wtsAppNo."</td>";
               echo "<td>".$value->Address."</td>";
              //  echo "<td>".$value->dateOfBirth."</td>";
              //  echo "<td>".$value->adharNo."</td>";
               echo "<td>".$value->Nondani."</td>";
               
                  
               echo "</tr>";                        
             }
             ?>
                                                </tbody> -->

                                                <tbody>
    <?php 
    $i = 0;
    foreach($member as $rw => $value) {
        echo "<tr onclick=\"window.location.href='" . base_url() . "Member/update/" . $value->memberId . "';\" style='cursor: pointer;'>"; // Make the row clickable
        echo '<td><i class="fas fa-eye" style="font-size: 16px;color:#0d6efd;"></i></td>';
        echo "<td>" . $value->memberId . "</td>";
        echo "<td>" . $value->memberName . "</td>";
        $i++;
        echo "<td>" . $value->mobileNo . "</td>";
        echo "<td>" . $value->Address . "</td>";
        echo "<td>" . $value->Nondani . "</td>";
        echo "</tr>";                        
    }
    ?>
</tbody>

                                        </table>
                                        </div>
             </div>
         </div>
     </div>

