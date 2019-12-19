@extends('layouts.app')

@section('content')
<style> 
.arrow {
    display:inline;
}
</style>
 <div class="container">
     <!-- header row -->
    <div class="row">
        <div class="col-md-3">    
            {!! Form::open(['url' => '/add/task']) !!}
            {!! Form::text('task','',['class'=>'','id'=>'content']) !!}
             {!! Form::select('project_id',$allprojects,'',['class'=>'','id'=>'content']) !!}
            {!! Form::submit('Add') !!}
            {!! Form::close() !!}         
        </div>
        <div class="col-md-3">
            <a href="/home/tasks"><h2>To Do</h2></a>
        </div>
        <div class="col-md-3">
            <a href="/home/tasks/project"><h2>By Project</h2></a>
        </div>        
        <div class="col-md-3">
            <a href="/home/tasks/complete"><h2>Completed</h2></a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo date('Y'); ?> Week <?php echo date('W'); ?></h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-2">
            <h4><?php echo date( 'l m/d', strtotime( 'monday this week' )); ?></h4>
            @foreach($monday as $task)
                <div><a href="/home/task/{{$task->id}}">{{$task->task}}</a></div>
            @endforeach
        </div>
        <div class="col-md-2">
            <h4><?php echo date( 'l m/d', strtotime( 'tuesday this week' )); ?></h4>
            @foreach($tuesday as $task)
                <div><a href="/home/task/{{$task->id}}">{{$task->task}}</a></div>
            @endforeach            
        </div>
        <div class="col-md-2">
            <h4><?php echo date( 'l m/d', strtotime( 'wednesday this week' )); ?></h4>
            @foreach($wednesday as $task)
                <div><a href="/home/task/{{$task->id}}">{{$task->task}}</a></div>
            @endforeach               
        </div>
        <div class="col-md-2">
            <h4><?php echo date( 'l m/d', strtotime( 'thursday this week' )); ?></h4>
            @foreach($thursday as $task)
                <div><a href="/home/task/{{$task->id}}">{{$task->task}}</a></div>
            @endforeach               
        </div>        
        <div class="col-md-2">
            <h4><?php echo date( 'l m/d', strtotime( 'friday this week' )); ?></h4>
            @foreach($friday as $task)
                <div><a href="/home/task/{{$task->id}}">{{$task->task}}</a></div>
            @endforeach               
        </div> 
        <div class="col-md-2">
            <table class="table">
                <tr>
                    <td>Daily</td>
                    <td>M</td>
                    <td>T</td>
                    <td>W</td>
                    <td>R</td>
                    <td>F</td>
                </tr>
                @foreach($dailyprojects as $project)
                <tr>
                    <td>{{$project['name']}}</td>
                    @for( $i=0; $i < 5; $i++)
                        <?php $today = date('Y').'_'.date('W').'_'.$i; ?>
                        <td><input type="checkbox" class="daily" data-project="{{$project['id']}}" 
                            @foreach($daily as $day)
                                @if (($day->daily == $today) && ($day->project_id == $project['id']))
                                    checked
                                @endif
                            @endforeach
                            value="{{$today}}"></td>
                    @endfor                    
                </tr>
                @endforeach                                              
            </table>
        </div>                                
    </div>
    <script>
        $('.daily').on('click',function(){
            // Send the values
            let complete = this.value;
            let project = this.getAttribute('data-project');

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                $.ajax({
                    type: "POST",
                    url: '/edit/dailytask',
                    data: {complete:complete,
                            projectID:project},
                    dataType: 'json',
                    success: function (data) {
                        console.log('it worked');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            console.log(this.value);
        });
    </script>

    @if($status != 'complete')
            <h2>Daily</h2>
            @foreach($dailytasks as $task)
            <div class="row">  
                <div class="col-md-12">
                @if($task->status == '0')
                    {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                        {!! Form::hidden('task_id',$task->id) !!} 
                        {!! Form::hidden('status','1') !!} 
                        {!! Form::submit('&#x2714;',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                    {!! Form::close() !!}  
                @endif   
                
                @if ($task->status == 0) 
                    <small>{{date('F j g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                @endif
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>
                            <div class="pull-right">
                                <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                                {!! Form::open(['url' => '/task/move','class'=>'todo-complete']) !!}
                                    {!! Form::hidden('task_id',$task->id) !!} 
                                    {!! Form::hidden('list_id','1') !!} 
                                    {!! Form::submit('&darr;',['class'=>'arrow','id'=>'content']) !!}
                                {!! Form::close() !!}   
                            </div>
                            <br>
                        </div>
                    </div>    
            @endforeach            
  
            <h2>General</h2>
            @foreach($generaltasks as $task)
            <div class="row">
                <div class="col-md-12">            
                    {!! Form::open(['url' => '/edit/task','class'=>'todo-complete']) !!}
                        {!! Form::hidden('task_id',$task->id) !!} 
                        {!! Form::hidden('status','1') !!} 
                        {!! Form::submit('&#x2714;',['class'=>'btn-primary todo-complete-button','id'=>'content']) !!}
                    {!! Form::close() !!}  
                
                @if ($task->status == 0) 
                    <small>{{date('F j g:i a',strtotime($task->created_at))}}</small>
                @else
                    <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                @endif
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>

                            <div class="pull-right">
                                <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                                {!! Form::open(['url' => '/task/move','class'=>'todo-complete']) !!}
                                    {!! Form::hidden('task_id',$task->id) !!} 
                                    {!! Form::hidden('list_id','2') !!} 
                                    {!! Form::submit('&uarr;',['class'=>'arrow','id'=>'content']) !!}
                                {!! Form::close() !!}                                  
                            </div>
                            <br>
                </div>
            </div>                              
            @endforeach             
        @endif

    
    <!-- separate UI for completed with less features -->
    @if($status == 'complete')
        <h2>Completed</h2>
         @foreach($generaltasks as $task)
            <div class="row">  
                <div class="col-md-12">
                <small>{{date('F j g:i a',strtotime($task->updated_at))}}</small>
                <a href="/home/task/{{$task->id}}">{{$task->task}}</a>
                 <div class="pull-right">
                    <span class="badge badge-primary project-color-{{$task->project_id}}">{{$task->project->name}}</span> 
                 </div>
                </div>
            </div>
         @endforeach
    @endif


    </div>
</div>




@endsection
