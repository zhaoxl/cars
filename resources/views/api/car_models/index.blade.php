@foreach ($models as $data)
<li data-modelid="{{$data->id}}" data-modelname="{{$data->modelname}}"><span></span><p>{{$data->modelname}}</p></li>
@endforeach