<ul>
	@foreach ($serials as $data)
  <li data-serialid="{{$data->serialid}}"><span></span><p>{{$data->serialname}}</p></li>
	@endforeach
</ul>