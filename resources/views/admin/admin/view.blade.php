@include('header')
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Admins List</h2>
        </div>
        <div class="col">
            <a href="{{url('/admin/create')}}" type="button" class="btn btn-primary btn-lg">Add Admin</a>
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
            <td>User ID</td>
            <td>Role ID</td>
            <td>Role Name</td>
            <td>Created At</td>
            <td>Updated At</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->user_id}}</td>
            <td>{{$admin->role_id}}</td>
            <td>{{$admin->role_name}}</td>
            <td>{{date_format(date_create($admin->created_at), "d-m-Y h:m:s")}}</td>
            <td>{{date_format(date_create($admin->updated_at), "d-m-Y h:m:s")}}</td>
            <td><a class="btn btn-link" href="{{url('/admin').'/'.$admin->id.'/edit'}}">Edit</a></td>
            <td>
                <form method="POST" action="{{url('/admin').'/'.$admin->id}}">
                    @csrf
                    @METHOD('DELETE')
                    <button class="btn btn-link" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{$admins->links()}}
</div>
@include('footer')