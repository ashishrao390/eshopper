@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Sizes List</h2>
        </div>
        <div class="col">
            <a href="{{url('/sizes/create')}}" type="button" class="btn btn-primary btn-lg">Add Size</a>
        </div>
    </div>    
    @if(session()->has('success'))
        <x-notification-component msg="{{session()->get('success')}}" cls="success"/>
    @elseif(session()->has('danger'))    
        <x-notification-component msg="{{session()->get('danger')}}" cls="danger"/>
    @endif    
    <table class="table table-striped">
        <tr>
            <td>#</td>
            <td>Size Label</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>View</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        @foreach($sizes as $size)
        <tr>
            <td>{{$size->id}}</td>
            <td>{{$size->size_label}}</td>
            <td>{{date_format(date_create($size->created_at), "d-m-Y h:m:s")}}</td>
            <td>{{date_format(date_create($size->updated_at), "d-m-Y h:m:s")}}</td>
            <td><a class="btn btn-link" href="{{url('/sizes').'/'.$size->id}}">View</a></td>
            <td><a class="btn btn-link" href="{{url('/sizes').'/'.$size->id.'/edit'}}">Edit</a></td>
            <td>
                <form action="{{url('/sizes').'/'.$size->id}}" method="POST">
                    @csrf
                    @METHOD('DELETE')
                    <button class="btn btn-link" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$sizes->links()}}
</div>
@include('footer')