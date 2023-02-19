@extends('layouts.master')
@section('main-content')
<h1>List of Users</h1>
<div class="container">
    <div class="text-end mb-5"><a class="btn btn-info" href="{{route('user.create')}}">New User</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
<div class="table-responsive">
 <table class="table table-bordered table-striped">
    <thead>
        <th>Sr. no.</th>
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Action</th>
    </thead>
    <tbody>
        @forelse($users as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>
                <div class="showPhoto">
                    <div id="imagePreview" style="@if($row->photo !='') background-image:url('{{url('/')}}/uploads/{{$row->photo}}')@else background-image: url('{{url('/img/avatar.png')}}')@endif">
                    </div>
                </div>
            </td>
            <td>
                <a href={{route('user.edit', ['id' => $row->id])}} class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                <button class="btn btn-danger" onClick="deleteFunction('{{$row->id}}')">Delete</button>
                 </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No Users Found</td>
        </tr>
        @endforelse
    </tbody>
</table>
</div>
</div>
@include ('modals.modal_delete')
<script>
    function deleteFunction(id) {
        document.getElementById('delete_id').value = id;
        $("#modalDelete").modal('show');
    }
</script>
@endsection

