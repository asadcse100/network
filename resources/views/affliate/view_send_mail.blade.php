@extends('affliate.affliate_layouts.app')
   @section('content')

   <!--page-content-wrapper-->
   <div class="page-content-wrapper">
       <div class="page-content">
           <div class="row">
               <div class="col-lg-12">
                   <div class="card">
                       <div class="mt-4 col-lg-12 table-responsive">
                           <table width="100%" id="datatable" class="table table-bordered table-striped">
                               <thead>
                                   <tr>
                                       <td>Id</td>
                                       <td>Date </td>
                                       <td>Email</td>
                                       <td>Subject</td>
                                       <td>Body</td>
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach(DB::table('mail_room')->where('affliate_id', Auth::guard('affliate')->id())->get() as $q)
                                   <tr>
                                       <td>{{$q->id}}</td>
                                       <td>{{$q->created_at}}</td>
                                       <td>{{$q->email}}</td>
                                       <td>{{$q->subject}}</td>
                                       <td>{!!$q->message!!}</td>
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
  
   @endsection('content')