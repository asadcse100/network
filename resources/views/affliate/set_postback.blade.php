@extends('affliate.affliate_layouts.app')
 @section('content')

 <!--page-content-wrapper-->
 <div class="page-content-wrapper">
   <div class="page-content">
     <div class="row">
       <div class="col-12 ">
         <div class="card">
           <div class="card-header">
             <h4>Set Posback</h4>
           </div>
           <div class="card-body">
             <form action="{{url('affliate/update-postback')}}" method="post">
               @csrf
               <input type="hidden" value="{{$id}}" name="id">
               <div class="row mt-4">
                 <div class="col-lg-12">
                   <label class="form-label">
                     URL
                   </label>
                   <?php $qry = DB::table('postback')->where('publisher_id', $id)->first();
                    ?>
                   <textarea class="form-control" type="" name="postback" required="">{{@$qry->link}}</textarea>
                 </div>
                 <div class="col-lg-4">
                   <button class="btn btn-success " style="margin-top: 33px">SAVE</button>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
   @endsection('content')

   @section('js')
   <script type="text/javascript">
     $(function() {
       @if(Session::has('success'))
       Swal.fire({
         title: '{{Session::get("success")}}',
         confirmButtonText: 'Ok'
       })
       @endif
     })
   </script>
   @endsection('js')