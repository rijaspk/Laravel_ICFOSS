@extends('layouts.app')


@section('content')
<div class="container">

    <h1>Edit Profile</h1>
  	<hr>
    @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
	<div class="row">
      <!-- left column -->
            <!-- edit form column -->

          <!-- <input type="hidden" name="_method" value="PUT"> -->
      <div class="col-md-3">
        <div class="w3-card-4">
                 <img id="blah" src="{{asset('storage/app/public/'.Auth::user()->avatar)}}" alt="your image" class="img-thumbnail"/>
                 {{Auth::user()->avatar}}
                <input type="file" class="form-control-file" name="avatar" id="avatarFile" aria-describedby="fileHelp" onchange="readURL(this);" >
                   <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
      </div>
      <div class="col-md-9 personal-info">
        <h3>Personal info</h3>
          <form class="form-horizontal" id="profileUpdate" role="form" method="post" action="/MyProfile" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}" />
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="name"value="{{$userData[0]->name}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" name="lname" value="{{$addData[0]->LastName}}" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" name="email" value="{{$userData[0]->email}}" type="text" readonly>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Date :</label>
            <div class="col-md-8">
              <input class="date form-control" name="doj" value="{{$addData[0]->DOJ}}" type="date" id="datepicker" name="date">
            </div>
          </div>

           <div class="form-group">
             <label class="col-lg-3 control-label">Designation</label>
             <div class="col-lg-8">
               <input class="form-control" name="Designation" value="{{$userData[0]->role}}" type="text">
             </div>
           </div>
           <div class="form-group">
             <label class="col-lg-3 control-label">Contact No</label>
             <div class="col-lg-8">
               <input class="form-control" name="Contact_No" value="{{$addData[0]->Contact_Number}}" type="tel">
             </div>
           </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Rest Password:</label>
            <div class="col-md-8">
              <input class="form-control" value="" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" value="" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
             <button type="button" class="btn btn-primary" id="modalsavebtn">Save Changes</button>
              <span></span>
              <input class="btn btn-default" value="Cancel" type="reset">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr />
@endsection
@push('style')
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
@endpush
@push('script')

<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<script>
//      $('#profileUpdate').on('submit', function(ev) {
        $('#modalsavebtn').on('click', function(ev) {
            var formData=$('#profileUpdate').serialize();
            console.log(formData);
                   $.ajax({
               type:'post',
               url:'{{URL::to("/MyProfile")}}',
               data:formData,
               dataType:'JSON'
           });
        });

            function readURL(input) {
                uploadFile();
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function (e) {
                                $('#blah')
                                    .attr('src', e.target.result)
                                    .width(150)
                                    .height(200);
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }

//file upload Function
                    function uploadFile(){
                    var form_data=new FormData();
                    var file=$('#avatarFile').prop('files')[0];
                    form_data.append('avatar',file);
                    form_data.append('_token','{{csrf_token()}}');
                    console.log(form_data);
                    $.ajax({
                    url:"{{URL::to('/saveprofiledata')}}",
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    data: form_data,
                    dataType:"json"
                });

             }

</script>

@endpush
