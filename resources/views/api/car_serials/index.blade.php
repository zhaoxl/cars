<ul>
	@foreach ($serials as $data)
  <li data-serialid="{{$data->serialid}}"><span><img src="/car_img/carimg/{{$data->serialid}}.jpg" height="60" width="75"></span><p>{{$data->serialname}}</p></li>
	@endforeach
</ul>