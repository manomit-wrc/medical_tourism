@if (count($search_data) > 0)
            @foreach($search_data as $searchval)
    <div class="filterbox">
    <a href="{!!URL::to('/searchdetails/'.$searchval->id)!!}">
      <img src="{{url('/uploads/hospitals/thumb/'.$searchval->avators)}}" alt="{{ $searchval->name }}"></a>
      <h3>{{ $searchval->name }}</h3>
      <h4>{{ $searchval->country->name }}, {{ $searchval->state->name }}, {{ $searchval->city->name }}</h4>
    </div>
  @endforeach
  @endif
