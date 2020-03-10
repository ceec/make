@extends('layouts.app')

@section('content')
 <div class="container">
     <!-- header row -->
    <div class="row">
        <div class="col-md-12">
            <h1>Chores <?php echo date('Y'); ?> Week <?php echo date('W'); ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                       <table class="table">
                <tr>
                    <td>Daily</td>
                    <td><?php echo date( 'l m/d', strtotime( 'monday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'tuesday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'wednesday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'thursday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'friday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'saturday this week' )); ?></td>
                    <td><?php echo date( 'l m/d', strtotime( 'sunday this week' )); ?></td>
                </tr>
                @foreach($chores as $chore)
                <tr>
                    <td>{{$chore['name']}}</td>
                    @for( $i=0; $i < 7; $i++)
                        <?php $today = date('Y').'_'.date('W').'_'.$i; ?>
                        <td><input type="checkbox" class="daily" data-chore="{{$chore['id']}}" 
                            @foreach($daily as $day)
                                @if (($day->daily == $today) && ($day->chore_id == $chore['id']))
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
            let chore = this.getAttribute('data-chore');

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                })

                $.ajax({
                    type: "POST",
                    url: '/edit/choreday',
                    data: {complete:complete,
                            choreID:chore},
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
    </div>
</div>




@endsection
