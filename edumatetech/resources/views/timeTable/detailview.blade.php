@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Create</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            

            <div id="tableview"></div> 

           
            <table class="table  text-center table-striped">
          <thead>
            <tr>
            <th></th>
            @foreach($periods as $period)
            <th> {{$period->period}}</th>
                   
            @endforeach
              
            </tr>
          </thead>
          <tbody>
          @foreach($days as $day)
            <tr>
            @php
$p3 = 0
@endphp
            <th>{{$day->day}}</th>
            @foreach($periods as $period)
           
                @foreach($data as $sub)
                    @if($sub->day == $day->day && $sub->period == $period->period)
                
                        <td> {{$sub->subject}}</td>
                        
                        @php
                       
                        $p3 = 1
                        @endphp
                    @elseif($sub->day == $day->day && $sub->period != $period->period)
                        @if($p3 == 0)
                        <td> </td>
                        @php
                        $p3 = 1
                        @endphp
                        @endif
                    
                    @endif
                
                @endforeach
            
            @endforeach
            
            </tr>

                   
            @endforeach
           
          </tbody>
        </table>
        </div>
          </div>
          <!-- /.box -->
@endsection
@section('scripts')

<script type="text/javascript">




  </script>
@endsection
