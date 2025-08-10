@extends('layouts.app')

@section('content')
<div class="container">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


   <div class="row">
        <div class="col-sm-9">
            <h2 class="mb-4">User Management</h2>
        </div>
        <div class="col-sm-3">         
            <button class="btn btn-primary mb-3 float-right" id="addUserBtn">Add User</button>
        </div>
    </div>



    <table class="table table-bordered" id="userTable">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-warning btn-sm editUserBtn">Edit</button>
                    <button class="btn btn-danger btn-sm deleteUserBtn">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="userForm">
        <div class="modal-header">
          <h5 class="modal-title">Add User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="userId">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" id="name" class="form-control">
                <div class="text-danger error-name"></div>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" id="email" class="form-control">
                <div class="text-danger error-email"></div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="successToast" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">
                Success!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>
@endsection

