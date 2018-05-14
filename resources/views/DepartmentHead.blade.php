@extends('layouts.app')


@push('style')
<style>

.main-section{
	width:80%;
	margin:0 auto;
	text-align: center;
	padding: 0px 5px;
}
.dashbord{
	width:32%;
	display: inline-block;
	background-color:#34495E;
	color:#fff;
	margin-top: 50px;
}
.icon-section i{
	font-size: 30px;
	padding:10px;
	border:1px solid #fff;
	border-radius:50%;
	margin-top:-25px;
	margin-bottom: 10px;
	background-color:#34495E;
}
.icon-section p{
	margin:0px;
	font-size: 20px;
	padding-bottom: 10px;
}
.detail-section{
	background-color: #2F4254;
	padding: 5px 0px;
}
.dashbord .detail-section:hover{
	background-color: #5a5a5a;
	cursor: pointer;
}
.detail-section {
	color:#fff;
	text-decoration: none;
}
.dashbord-blue .icon-section,.dashbord-blue .icon-section i{
	background-color: ##31698F;
}
.dashbord-blue .detail-section{
	background-color:#4A7D9F;
}

.btn.btn-outline-secondary{
    float:right;
}
</style>
@endpush

@section('content')

<div class="container">
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
	<div class="main-section">
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-leanpub" aria-hidden="true"></i><br>
				<small>Research Assistants</small>
				<p>3</p>
			</div>
			<div class="detail-section">
			<div id="RA">More Info </div>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-user" aria-hidden="true"></i><br>
				<small>Research Fellows</small>
				<p>5</p>
			</div>
			<div class="detail-section">
				<div id="RF">More Info </div>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Interns and Others</small>
				<p>2</p>
			</div>
			<div class="detail-section">
				<div id="IO">More Info </div>
			</div>
		</div>
	   </div>
     </div>

     <button type="button" class="btn btn-outline-secondary"  data-toggle="modal" data-target="#exampleModal">
         ADD USERS
     </button>
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
                 <!-- Modal body -->
                 <!-- Form -->
                 <form class="deptForm " name="deptForm" action="{{URL::to('/DepartmentHead')}}"method="post">

                 <div class="modal-body">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                         <div class="md-form mb-5">
                             <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                             <input type="text" id="deptForm-dname" name="name" class="form-control validate">
                         </div>
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass">Email</label>
                             <input type="email" id="deptForm-dhname" name="email" class="form-control validate">
                         </div>
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass">Date Of Joining</label>
                             <input type="date" id="deptForm-dhname" name="doj" class="form-control validate">
                         </div>
                         <div class="md-form mb-6">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass">Designation</label>
                                 <select  name="Designation" class=”col-md-4”  id=”type”  required>
                                     <option value="" selected disabled hidden>Select A Designation</option>
                                     <option value="RA">  Research Assistants  </option>
                                     <option value="RF">Research Fellow</option>
                                     <option value="IO">Interns And Others</option>
                                 </select>
                         </div>
                          <div class="md-form mb-4">
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Sex</label>
                         <label class="checkbox-inline"><input type="radio" name="Sex" value="M" />Male</label>
                        <label class="checkbox-inline"><input type="radio" name="Sex" value="F" />Female</label>
                        <label class="checkbox-inline"><input type="radio"  name="Sex" value="O" />Other</label>
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
       <table id="RATable" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
         <thead>
           <tr>
             <td>Name</td>
             <td>Email</td>
             <td>Date OF Joining</td>
              <td>Actions</td>
           </tr>
         </thead>
         <tbody>
                 @foreach($RAs as $index=>$each)
               <tr>
                 <td>
                     {{$each->Name}}
                 </td>
                 <td>
                      {{$each->Email}}
                 </td>
                 <td>
                      {{$each->Date_Of_Joining}}
                 </td>
                 <td>
                    <input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
                    <!-- <input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')"> -->
                <!-- </td>
                    <td> -->
                        <input type="button" value="Delete" class="delete" onclick="delete_row('1')">

                    </td>
             </tr>
             @endforeach
         </tbody>
       </table>
       <table id="RFTable" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
         <thead>
           <tr>
             <td>Name</td>
             <td>Email</td>
             <td>Date OF Joining</td>
           </tr>
         </thead>
         <tbody>
                 @foreach($RFs as $index=>$each)
               <tr>
                 <td>
                     {{$each->Name}}
                 </td>
                 <td>
                      {{$each->Email}}
                 </td>
                 <td>
                      {{$each->Date_Of_Joining}}
                 </td>
             </tr>
             @endforeach
         </tbody>
       </table>
       <table id="IOTable" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
         <thead>
           <tr>
             <td>Name</td>
             <td>Email</td>
             <td>Date OF Joining</td>
           </tr>
         </thead>
         <tbody>
                 @foreach($IOs as $index=>$each)
               <tr>
                 <td>
                     {{$each->Name}}
                 </td>
                 <td>
                      {{$each->Email}}
                 </td>
                 <td>
                      {{$each->Date_Of_Joining}}
                 </td>
                 <td>
                    <input type="button" id="edit_button1" value="Edit" class="edit" onclick="edit_row('1')">
                    <input type="button" id="save_button1" value="Save" class="save" onclick="save_row('1')">
                <!-- </td>
                    <td> -->
                        <input type="button" value="Delete" class="delete" onclick="delete_row('1')">

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
@push('script')
<script>
$(document).ready(function(){
    $('#RATable').hide();
    $('#RFTable').hide();
    $('#IOTable').hide();


        $('#RA').on('click', function(ev) {
            $('#RATable').toggle('slow');
            $('#RFTable').hide();
            $('#IOTable').hide();
        });

        $('#RF').on('click', function(ev) {
            $('#RFTable').toggle('slow');
            $('#RATable').hide();
            $('#IOTable').hide();
        });

        $('#IO').on('click', function(ev) {
            $('#IOTable').toggle('slow');
            $('#RFTable').hide();
            $('#RATable').hide();
        });
});
    $('.deptForm').on('submit', function(ev) {
        var formData=$('.deptForm').serialize();
        alert($formData);
               $.ajax({
           type:'post',
           url:'{{URL::to("/DepartmentHead")}}',
           data:formData,
           dataType:'JSON'
       });
    });


</script>
@endpush
