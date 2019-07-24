@extends('layouts.private')

@section('content')
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Student Create</h3>
            </div>
           
        <div class="box-body">
           
            <table class="table  text-center table-striped">
            <thead>
            <tr>
                <th>Days/Periods</th>
              @foreach($periods as $period)
                <th> {{$period->period}}</th>          
              @endforeach  
            </tr>
            </thead>
            <tbody>
         
              @foreach($days as $day)
            <tr>
            <th>{{$day->day}}</th>
                @foreach($periods as $period)
                    @php    
                    $subj = ''
                    @endphp
                  @foreach($data as $sub)
                  @if($sub->day==$day->day && $sub->period== $period->period)
                      @php                       
                      $subj = $sub->subject
                      @endphp
                  @endif
                  @endforeach
                  <td>{{$subj}}</td>
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
