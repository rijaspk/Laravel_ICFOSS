@extends('layouts.app')


@push('style')
<style>
.btn.btn-outline-secondary{
    float:right;
}
</style>
@endpush

@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.deptForm').on('submit', function(ev) {
        var formData=$('.deptForm').serialize();
               $.ajax({
           type:'post',
           url:'{{URL::to("/dash")}}',
           data:formData,
           dataType:'JSON'
       });
    });

//     $('#Departments').DataTable({
//               dom:  "<'row'<'col-sm-3'l><'col-sm-3'B><'col-sm-3'f>>" +
//             "<'row'<'col-sm-12'tr>>" +
//             "<'row'<'col-sm-5'i><'col-sm-7'p>>",
//       buttons: [ 'excel']
//     });
//
// });

</script>
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard
                    <button type="button" class="btn btn-outline-secondary"  data-toggle="modal" data-target="#exampleModal">
                        Create Department
                    </button>
                </div>
                <div class="buttons">
                    @if(isset($message))
                    {!!$message!!}
                    @endif
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Create Department & Department head </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="deptForm" name="deptForm" action="{{URL::to('/dash')}}"method="post">
                            <!-- Modal body -->
                            <div class="modal-body">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="md-form mb-5">
                                        <label data-error="wrong" data-success="right" for="defaultForm-email">Department Name</label>
                                        <input type="text" id="deptForm-dname" name="dname" class="form-control validate">
                                    </div>
                                    <div class="md-form mb-4">
                                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Department Head Name</label>
                                        <input type="text" id="deptForm-dhname" name="dhname" class="form-control validate">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" id="modalsavebtn">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal End-->
                    <div class="panel-body">
                    <div class="row">
                      <table id="Departments" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <td>Department Name</td>
                            <td>Department Head</td>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($dept as $index=>$each)
                              <tr>
                                <td>
                                  {{$each->Department_Name}}
                                </td>
                                <td>
                                  {{$each->Department_Head}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
