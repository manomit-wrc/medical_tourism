<div id="vertical-scrollbar-demo" class="gray-skin demo scrollable" tabindex="-1">
@if (count($search_data) > 0)
  @foreach($search_data as $searchval)
    <div class="filterbox">
    <a href="{!!URL::to('/searchdetails/'.$searchval->id)!!}">
      <img src="{{url('/uploads/hospitals/thumb/'.$searchval->avators)}}" alt="{{ $searchval->name }}">
      <h3>{{ $searchval->name }}</h3></a>
      <h4>{{ $searchval->country_name }}, {{ $searchval->state_name }}, {{ $searchval->city_name }}</h4>
    </div>
  @endforeach
@endif
</div>
<script type="text/javascript">
  
        $(".demo").customScrollbar();
        $("#fixed-thumb-size-demo").customScrollbar({fixedThumbHeight: 50, fixedThumbWidth: 60});
    
</script>
