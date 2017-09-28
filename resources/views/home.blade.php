@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="/home/blog/add">Add New Post</a><br>
                    <a href="/home/blog/list">Edit Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
