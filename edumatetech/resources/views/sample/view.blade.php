@extends('layouts.private')

@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>password</th>
                        <th>active</th>  
                        <th>Action</th>                      
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                        <tr class="item{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->password}}</td>
                            <td>{{$item->active}}</td>

                             <td>
                           <a href="{{ route('sample.edit',$item->id)}}" class="edit-modal btn btn-info"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                            
        <button class="delete-modal btn btn-danger"
            data-info="{{$item->id}},{{$item->name}},{{$item->email}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </button>
        </td> 

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>


      


@endsection
@section('scripts')
<script>
  $(document).ready(function() {
    $('#example1').DataTable();
  })

//   $(document).on('click', '.delete-modal', function() {
//         $('#footer_action_button').text(" Delete");
//         // $('#footer_action_button').removeClass('glyphicon-check');
//         $('#footer_action_button').addClass('glyphicon-trash');
//         // $('.actionBtn').removeClass('btn-success');
//         $('.actionBtn').addClass('btn-danger');
//         // $('.actionBtn').removeClass('edit');
//         $('.actionBtn').addClass('delete');
//         $('.modal-title').text('Delete');
//         $('.deleteContent').show();
//         //$('.form-horizontal').hide();
//         var stuff = $(this).data('info').split(',');
//         $('.did').text(stuff[0]);
//         $('.dname').html(stuff[1] +" "+stuff[2]);
//         $('#myModal').modal('show');
//     });

    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '{{ route('sample.destroy') }}',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });

    

</script>
@endsection