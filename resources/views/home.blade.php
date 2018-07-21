@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="/home/blog/add">Add New Post</a><br>
                            <a href="/home/blog/list">Edit Post</a>        
                        </div>
                        <div class="col-md-3">  
                            <a href="/home/tasks">To Do List</a><br>     
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-3">
                            <h2>Purchases</h2>
                            <a href="/home/purchase/add">Add New Purchase</a><br>      
                            <a href="/home/purchase/list">Edit Purchase</a>      
                        </div>
                        <div class="col-md-3">
                            <h2>Notes</h2>
                            <a href="/home/note/add">Add New Note</a><br>
                            <a href="/home/note/list">Edit Note</a><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h2>Books</h2>
                            <a href="/home/book/add">Add New Book</a><br>
                            <a href="/home/book/list">Edit Book</a><br>
                        </div>
                        <div class="col-md-3">
                            <h2>Groups</h2>
                            <a href="/home/group/add">Add Group</a><br>
                            <a href="/home/group/list">Edit Group</a><br>
                        </div>                        
                    </div>

                </div>             
            </div>
        </div>
    </div>
</div>
@endsection
