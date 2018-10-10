@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2>ccmake</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Blog</h4>
                            <a href="/home/blog/add">Add New Post</a><br>
                            <a href="/home/blog/list">Edit Post</a>        
                        </div>
                        <div class="col-md-3">  
                            <h4> To Do</h4>
                            <a href="/home/tasks">To Do List</a><br>     
                        </div>
                        <div class="col-md-3">  
                            <h4>Project</h4>
                            <a href="/home/project/add">Add New Project</a><br>      
                            <a href="/home/project/list">Edit Projects</a>      
                        </div>                        
                    </div>
                    <hr>
                    <h2>Tools</h2>
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/home/wordcount">Wordcount</a>
                            </div>
                        </div>
                    <hr>
                    <h2>Database</h2>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Purchases</h4>
                            <a href="/home/purchase/add">Add New Purchase</a><br>      
                            <a href="/home/purchase/list">Edit Purchase</a>     
                        </div>
                        <div class="col-md-3">
                            <h4>Stores</h4>
                            <a href="/home/store/add">Add New Store</a><br>      
                            <a href="/home/store/list">Edit Store</a>                                 
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-3">
 
                        </div>
                        <div class="col-md-3">
                            <h4>Notes</h4>
                            <a href="/home/note/add">Add New Note</a><br>
                            <a href="/home/note/list">Edit Note</a><br>
                        </div>
                        <div class="col-md-3">
                            <h4>Books</h4>
                            <a href="/home/book/add">Add New Book</a><br>
                            <a href="/home/book/list">Edit Book</a><br>
                        </div>  
                       <div class="col-md-3">
                            <h4>Volumes</h4>
                            <a href="/home/volume/add">Add New Volume</a><br>
                            <a href="/home/volume/list">Edit Volume</a><br>
                        </div>                                                
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <h4>Groups</h4>
                            <a href="/home/group/add">Add Group</a><br>
                            <a href="/home/group/list">Edit Group</a><br>
                        </div>  
                        <div class="col-md-3">
                            <h4>Authors</h4>
                            <a href="/home/author/add">Add Author</a><br>
                            <a href="/home/author/list">Edit Author</a><br>
                        </div>  
                        <div class="col-md-3">
                            <h4>Publishers</h4>
                            <a href="/home/publisher/add">Add Publisher</a><br>
                            <a href="/home/publisher/list">Edit Publisher</a><br>
                        </div>        
                        <div class="col-md-3">
                            <h4>Types</h4>
                            <a href="/home/type/add">Add Type</a><br>
                            <a href="/home/type/list">Edit Type</a><br>
                        </div>                                                                                          
                    </div>

                </div>             
            </div>
        </div>
    </div>
</div>
@endsection
