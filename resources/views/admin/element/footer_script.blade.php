<script type="text/javascript">
  $(document).ready(function(e){
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
     $('#datatbl_langcapability_id,#datatbl_mdcltest_id').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        /*"order": [[ 0, "desc" ]],*/
        "columnDefs": [
          { "targets": [1,2], "orderable": false }
        ],
        "info": true,
        "autoWidth": false
     });

      //Four column section 
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

  });
</script>
