@extends('layouts.private')

@section('content')
  <div class="box">
            <div class="box-header">
              <h2 class="box-title">CasteCategory View   </h2>
              &nbsp;&nbsp;
              <a href="{{ route('casteCategory.create')}}" class="btn btn-primary btn-fw btn-sm"><i class="fa fa-plus"></i> New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="datatable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>Name</th>                        
                        <th>Active</th> 
                        <th>Action</th>                         
                        </tr>
                        </thead>
                        <tbody>
                       
                        @foreach($data as $item)
                        <tr class="item{{$item->id}}">
                            <td></td>
                            <td>{{$item->name}}</td>                            
                            <td>{{$item->record_status}}</td>
                            <td>
                            <a href="{{ route('casteCategory.edit',$item->id)}}" class="edit-modal btn btn-info"><span class="glyphicon glyphicon-edit"></span>Edit</a>
                            
        <button class="delete-modal btn btn-danger"
            data-info="{{$item->id}},{{$item->name}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </button></td>

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

    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '{{ route('casteCategory.destroy') }}',
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