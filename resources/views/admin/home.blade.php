@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! Welcome {{ auth()->user()->username }} 
                    <br>
                    This is your user has been registered
                </div>
                <table class="table  table-striped table-hover ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
            </thead>
            <tbody>
                @php(
                    $no = 1 {{-- buat nomor urut --}}
                    )
                {{-- loop all kendaraan --}}
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td> 
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        
                    </tr>
                @endforeach
                {{-- // end loop --}}
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@endsection