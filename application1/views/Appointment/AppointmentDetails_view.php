 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Begin page content -->
    <div class="container">
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">कर्ज सक्रियकरण यादी</span></h4>

                   <div class="d-flex justify-content-end">
                      <a href="<?=base_url("Appointment/create") ?>"><button class="btn btn-primary" style="    padding: 5px 13px;
    font-size: 16px;
    font-family: revert;"><i class="fas fa-plus-circle"></i>&nbsp;नवीन नियुक्ती</button></a></div>
    
              	 <div class="table-responsive mt-3">
    <table class="table table-bordered table-striped text-center">
                                                <thead>
                                                    <tr>
                                                    <!-- <th style="width: 30px!important;">Action</th> -->
                                                    <th>न.</th>
                                                    <th>सदस्याचे नाव</th>
                                                    <th>कर्ज सुरू होण्याची तारीख</th>
                                                    <th >कर्जाची रक्कम</th>
                                                    
                                                   

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    $i =0;


                                      foreach($appoinment as $rw=>$value){
                                  // $test=$value->PurchaseRequisitionFor;
                                  // if ( $test == 1) {
                                  //                    $PurchaseRequisitionFor = "Regular";
                                  //                   }else {
                                  //                     $PurchaseRequisitionFor = "Transfer";
                                  //                   }




               echo "<tr>";
                // echo  '<td><a href="'.base_url().'Appointment/update/'.$value->appoinmentId.'"><i class="fas fa-eye" style="font-size: 16px;"></i></a></td>';

              echo "<td>".$value->LoanActiveId."</td>";
               echo "<td>".$value->memberName."</td>";$i++;
               echo "<td>".$value->startDate."</td>";
               echo "<td>".$value->LoanAmount."</td>";
               
               
                  
               echo "</tr>";                        
             }
             ?>
                                                </tbody>
                                        </table>
                                        </div>
             </div>
         </div>
     </div>

