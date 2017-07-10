<script type="text/javascript">
  $(document).ready(function(e){
      <!--////////////////////Reply from Admin section start here/////////////////////////-->
      if($("#reply_to_user_type").val()==1)
      {
        $('#user_section_area').show();
        $('#hosp_section_area').hide();
      }
      if($("#reply_to_user_type").val()==2)
      {
        $('#user_section_area').hide();
        $('#hosp_section_area').show();
      }

     $("#reply_to_user_type").change(function(e){
        //alert($(this).val());
        if($(this).val()==1)
        {
          $('#user_section_area').show();
          $('#hosp_section_area').hide();
        } 

        if($(this).val()==2)
        {
          $('#user_section_area').hide();
          $('#hosp_section_area').show();
        } 

     });
    $("#btnReply").click(function(e){ 
       
         if($("#reply_to_user_type").val() == 2 ) {
            var reply_to=$("#reply_to_hosp").val();
         }else{
            var reply_to=$("#reply_to_user_id").val();
         }
        $.ajax({
                  type: "POST",
                  url: "/admin/patientenquiry/reply",
                  data: {
                    pat_enq_id: $("#pat_enq_id").val(),
                    reply_to_user_type: $("#reply_to_user_type").val(),
                    reply_to:reply_to,
                    message: $("#message").val(),
                    _token: "{{csrf_token()}}"
                  },
                 /* beforeSend:function() {
                    $("#btnReply").prop('disabled', true);
                  },*/
                  success:function(response) { //alert(response.status);
                    if(response.status == 1)
                    {
                      $(".msgdisplay").html(response.msg);
                      setTimeout(function(){
                        $("#message").val('');
                        $("#rplysection").hide();
                        
                      },5000);
                    }
                    else {

                      $(".msgdisplay").html(response.msg);
                      /*$(".registration").addClass('registration-error');
                      $(".registration").removeClass('registration-success');*/
                    }
                  
                    $("#btnReply").prop('disabled', false);

                  },
                  error:function(xhr) {
                    $(".msgdisplay").html("Error occurred. Please try again");
                   /* $(".msgdisplay").addClass('registration-error');
                    $(".msgdisplay").removeClass('registration-success');*/
                    $("#btnReply").prop('disabled', false);
                  }
                });
    });
    
     <!--////////////////////Reply from Admin section end here/////////////////////////-->

    $("#doctor_country_id").change(function(e){
      var value = $(this).val();
      if(value) {
        $.ajax({
          type:"POST",
          url:"/admin/doctors/get_state_list",
          data: {country_id:value, _token:"{{csrf_token()}}"},
          success:function(response) {
            $('#doctor_state_id').find('option').not(':first').remove();
            for (var key in response.state_list) {
              $("#doctor_state_id").append('<option value="'+key+'">'+response.state_list[key]+'</option>');
            }
          },
          error:function(xhr) {

          }
        });
      }
      else {
        $('#doctor_state_id').find('option').not(':first').remove();
      }
    });

    $("#doctor_state_id").change(function(e){
      var value = $(this).val();
      if(value) {
        $.ajax({
          type:"POST",
          url:"/admin/doctors/get_city_list",
          data: {state_id:value, _token:"{{csrf_token()}}"},
          success:function(response) {
            $('#doctor_city_id').find('option').not(':first').remove();
            for (var key in response.city_list) {
              $("#doctor_city_id").append('<option value="'+key+'">'+response.city_list[key]+'</option>');
            }
          },
          error:function(xhr) {

          }
        });
      }
      else {
        $('#doctor_city_id').find('option').not(':first').remove();
      }
    });

     <!--//language capability, medical test category datatables section ///////////-->
     //Three column section 
     $('#datatbl_langcapability_id,#datatbl_mdcltest_id,#datatbl_degree_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 3, "desc" ]],
        "columnDefs": [
          { "targets": [1,2], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

      //Four display column section 
      //For Procedure section
     $('#datatbl_procedure_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 4, "desc" ]],
        "columnDefs": [
          { "targets": [1,2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });
     //For treatments ,medicaltest section
     $('#datatbl_trtmnt_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 4, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });
     $('#datatbl_medicaltest_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 5, "desc" ]],
        "columnDefs": [
          { "targets": [3,4], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });
     //For generic medicine section
     $('#datatbl_genmed_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [4,5], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

     //Banner section 
      $('#datatbl_banner_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 6, "desc" ]],
        "columnDefs": [
          { "targets": [0,4,5], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

      //Provider type section 
      $('#datatbl_provtype_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 3, "desc" ]],
        "columnDefs": [
          { "targets": [1,2], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

      //Accomodation section 
      $('#datatbl_accomodation_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 3, "desc" ]],
        "columnDefs": [
          { "targets": [1,2], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Cuisine section 
      $('#datatbl_cuisine_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Payment type section 
      $('#datatbl_paymenttype_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Connectivity section 
      $('#datatbl_connectivity_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Connectivity services section 
      $('#datatbl_consrv_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //accrediation section 
      $('#datatbl_accr_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3,4], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Specific services section 
      $('#datatbl_spfcserv_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Medical facility section 
      $('#datatbl_medcal_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [1,4,5], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //Role section 
      $('#datatbl_role_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [2,3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

       //hotel section 
      $('#datatbl_hotel_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [3,4], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

        //News section 
      $('#datatbl_news_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [3,4,5], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

        //Adminuser section 
      $('#datatbl_admnusr_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [3], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

        //Patient section 
      $('#datatbl_patient_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "order": [[ 0, "desc" ]],
        "columnDefs": [
          { "targets": [3,4], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });


  });
</script>
