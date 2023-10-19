@extends('installation.app')
@section('content')
    <div class="container pt-5">
        <div class="row">
            <div class="col-xl-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="pad-btm text-center">
                            <h1 class="h3">Congratulations!!!</h1>
                            <p>You have successfully completed the installation process. Please Login to continue.</p>
                            <div class="card shadow-none mt-3">
                                <div class="card-header">
                                    <h3 class="panel-title">Configure the following setting to run the system properly.</h3>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group">
                                        <li class="list-group-item">SMTP Setting</li>
                                        <li class="list-group-item">Payment Method Configuration</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card shadow-none mt-3">
                                <div class="card-header">
                                    <h3 class="card-title">Demo account added for test purpose.</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered mar-no">
                                        <thead>
                                            <tr>
                                                <th>User Type</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Affiliate Manager</td>
                                                <td>manager@mail.com</td>
                                                <td>12345678</td>
                                            </tr>
                                            <tr>
                                                <td>Advertiser</td>
                                                <td>advertiser@mail.com</td>
                                                <td>12345678</td>
                                            </tr>
                                            <tr>
                                                <td>Publisher</td>
                                                <td>publisher@mail.com</td>
                                                <td>12345678</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="{{Route('home')}}" class="btn btn-primary">Go to Frontend Website</a>
                            <a href="{{Route('admin.login') }}" class="btn btn-success">Login to Admin panel</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
