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
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
	<div class="main-section">
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-leanpub" aria-hidden="true"></i><br>
				<small>Research Assistants</small>
				<p>{{$count[1]->cnt}}</p>
			</div>
			<div class="detail-section">
			<div id="RA">More Info </div>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-user" aria-hidden="true"></i><br>
				<small>Research Fellows</small>
				<p>{{$count[2]->cnt}}</p>
			</div>
			<div class="detail-section">
				<div id="RF">More Info </div>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Interns and Others</small>
				<p>{{$count[0]->cnt}}</p>
			</div>
			<div class="detail-section">
				<div id="IO">More Info </div>
			</div>
		</div>
	   </div>
     </div>
     @if(Session::has('flash_message'))
             <div class="alert alert-success">
                 {{ Session::get('flash_message') }}
             </div>
         @endif

         <button type="button" class="btn btn-outline-secondary"  data-toggle="modal" data-target="#exampleModal">
             ADD USERS
         </button>
     </br>

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
                         <div class="md-form mb-4">
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
                          </br>
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass" style='padding-right: 10px'>Designation</label>
                                 <select  name="Designation" class=”col-md-4”  id=”type”  required>
                                     <option value="" selected disabled hidden>Select A Designation</option>
                                     <option value="RA">  Research Assistants  </option>
                                     <option value="RF">Research Fellow</option>
                                     <option value="IO">Interns And Others</option>
                                 </select>
                         </div>
                     </br>
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
     <!-- <div class="panel-body"> -->
         <div class="RATable">
             <h3 class="text-center" id="exampleModalLabel">Research Assistants</h3>
         </br>
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
                             {{$each->DOJ}}
                         </td>
                         <td>
                             <button class="btn btn-link open_modal" value="{{$each->Email}}">Edit</button>
                              <button type="button" value="{{$each->Id}}" onclick="delete_row(this.value)" class="btn btn-link">delete</button>

                         </td>
                     </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
         <div class="RFTable">
         <h3 class="text-center">Research Fellows</h3>
       <table id="RFTable" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
         <thead>
           <tr>
             <td>Name</td>
             <td>Email</td>
             <td>Date OF Joining</td>
              <td>Actions</td>
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
                      {{$each->DOJ}}
                 </td>
                 <td>
                     <button class="btn btn-link open_modal" value="{{$each->Email}}">Edit</button>
                      <button type="button" value="{{$each->Id}}" onclick="delete_row(this.value)" class="btn btn-link">delete</button>

                 </td>
             </tr>
             @endforeach
         </tbody>
       </table>
   </div>
   <div class="IOTable">
    <h3 class="text-center" >Interns And Others</h3>
 <table id="IOTable" class="table table-striped table-reponsive table-bordered" width="100%" cellspacing="0">
   <thead>
     <tr>
       <td>Name</td>
       <td>Email</td>
       <td>Date OF Joining</td>
        <td>Actions</td>
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
                {{$each->DOJ}}
           </td>
           <td>
               <button class="btn btn-link open_modal" value="{{$each->Email}}">Edit</button>
                <button type="button" value="{{$each->Id}}" onclick="delete_row(this.value)" class="btn btn-link">delete</button>
           </td>
       </tr>
       @endforeach
   </tbody>
 </table>
</div>
     <!-- </div> -->
     <!-- Edit Row Modal -->
     <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h4 class="modal-title" id="exampleModalLabel">EDIT </h4>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <!-- Modal body -->
                 <!-- Form -->
                 <form class="EditForm " name="EditForm" action="{{URL::to('/Updaterow')}}"method="post">

                 <div class="modal-body">
                         <input type="hidden" name="_token" value="{{csrf_token()}}" />
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                             <input type="text" id="name" name="name" class="form-control validate">
                         </div>
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass">Email</label>
                             <input type="email" id="email" name="email" class="form-control validate">
                         </div>
                         <div class="md-form mb-4">
                             <label data-error="wrong" data-success="right" for="defaultForm-pass">Date Of Joining</label>
                             <input type="date" id="doj" name="doj" class="form-control validate" >
                         </div>
                          </br>
                     </br>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary" id="modalsavebtn">Save Changes</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 </div>
                 </form>
                  <!-- Form End-->
             </div>
         </div>
     </div>
     <!-- Modal End-->
 </div>
</div>
</div>
</div>
@endsection
@push('script')
<script src="{{asset('datatables/datatables.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('.RATable').hide();
    $('.RFTable').hide();
    $('.IOTable').hide();

    $('#RATable').DataTable({
              dom:  "<'row'<'col-sm-3'l><'col-sm-3'B><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [ 'excel']
    });

    $('#RFTable').DataTable({
      dom:  "<'row'<'col-sm-3'l><'col-sm-3'B><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [ 'excel']
    });

    $('#IOTable').DataTable({
      dom:  "<'row'<'col-sm-3'l><'col-sm-3'B><'col-sm-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      buttons: [ 'excel']
    });
    });

    $('#RA').on('click', function(ev) {
        $('.RATable').toggle('slow');
    });

    $('#RF').on('click', function(ev) {
       $('.RFTable').toggle('slow');
     });

    $('#IO').on('click', function(ev) {
        $('.IOTable').toggle('slow');
    });

    $('.deptForm').on('submit', function(ev) {
        var formData=$('.deptForm').serialize();
        alert(formData);
               $.ajax({
           type:'post',
           url:'{{URL::to("/DepartmentHead")}}',
           data:formData,
           dataType:'JSON'
       });
    });


    $('.open_modal').on('click',function(){
        var currentRow = $(this).closest("tr");
        var col1 = currentRow.find("td:eq(0)").html();
        var col2 = currentRow.find("td:eq(1)").html();
        var col3 = currentRow.find("td:eq(2)").html();
        var name=col1.trim();
        var doj=col3.trim();
          $('#name').val(name);
          $('#email').val(col2);
          $('#doj').val(doj);
          $('#EditModal').modal('show');
      });

      $('.EditForm').on('submit', function(ev) {
//          alert("hi");
          var formData=$('.EditForm').serialize();
//          alert(formData);
                 $.ajax({
             type:'post',
             url:'{{URL::to("/Updaterow")}}',
             data:formData,
             dataType:'JSON'
         });
      });

 function delete_row(val){
    var form_data=new FormData();
    form_data.append('id',val);
    form_data.append('_token','{{csrf_token()}}');
//     alert(val);
     $.ajax({
         method:'delete',
         url:'{{URL::to("/DepartmentHead")}}/'+val,
        data:'_token={{csrf_token()}}',
       dataType:'JSON'
           });
 }


</script>
@endpush
