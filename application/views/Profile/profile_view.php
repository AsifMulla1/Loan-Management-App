
	
</style>
<div class="container-fluid px-0">
	<div class="col-12">
		
		<div class="card p-2 border-0 profile_card" style="">
       <form id="Form" action=""  method="post" enctype="multipart/form-data">
      <div class="text-center">
        <div class="img_blockp">
          
                               <label class="newbtn">
                           <img id="imgpreview1" name="imgpreview1"  class="img-thumbnail" src="<?php 
                                      if(!empty($data[0]->AttachFile)){echo base_url().'upload/'.$data[0]->AttachFile;}
                                      else 
                                        echo base_url().'Assets/img/user2.png'
                                      
                                      ?>" style="cursor: pointer;" width="150" height="150" alt="user"   class="img-thumbnail">

                   <div class="text-center">
                       <input type="file" class="form-control-sm " id="AttachFile" name="AttachFile" onchange="readURL(this);" style="display: none;">

                        <input type="hidden" name="hiddenphoto1"> 
                         
                        <div class="bottom_right"><i class="fas fa-edit"></i></div></div>   
                      </label>
                      </div>
        
        
         
       </div>
</form>

      </div>
      
      <div class="col-11 mx-auto">
      <div class="card shadow-sm p-3 infocard mb-2">
         <h5>Basic Details</h5>

        <?php 
                                                  
             foreach($data as $rw=>$value){

                                      
          echo ' <div class="d-flex justify-content-start mb-3">
            <div class="vname" style=""><i class="fas fa-user text-white fa-1x text-center"></i></div>
            <div><small class="d-block info">'  .$value->userName."</small></div>
          </div>";

           echo ' <div class="d-flex justify-content-start mb-3">
            <div class="vname" style=""><i class="fas fa-phone-alt text-white fa-1x text-center"></i></div>
            <div><small class="d-block info">'  .$value->mobileNo."</small></div>
          </div>";

           echo ' <div class="d-flex justify-content-start mb-3">
            <div class="vname" style=""><i class="fas fa-calendar-alt text-white fa-1x text-center"></i></div>
            <div><small class="d-block info">'  .$value->dateOfBirth."</small></div>
          </div>";
       
        }
             ?>

           <label for="Address">Address:</label>
         <textarea class="form-control" rows="3" id="Address" name="address"></textarea>  
          
    </div></div>
		</div>
	</div>


                            
 <!-- Required jquery and libraries -->
    <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>

    <script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 

     <!-- <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/RegistrationCreate.js"></script> -->


<script>
    $('.newbtn').bind("click" , function(){
      // $('#AttachFile').click();
      
    });
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imgpreview1').attr('src', e.target.result);
                };
                 $('#hiddenphoto1').val('');
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#AttachFile").change(function(){
  
    saveperform();
   
  }); 

        function saveperform() {
             var input = document.getElementById("AttachFile");
  file = input.files[0];
  if(file != undefined){
    formData= new FormData();
    if(!!file.type.match(/image.*/)){
      formData.append("image", file);
      $.ajax({
        url: base_path+"Profile/photoupdate",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
       Swal.fire(
              'Good job!',
              'Profile Updated successfully',
              'success'
              )
          window.location.href = base_path+"Profile";  
        }
      });
    }else{
      alert('Not a valid image!');
    }
  }else{
    alert('Input something!');
  }
        }
</script>

