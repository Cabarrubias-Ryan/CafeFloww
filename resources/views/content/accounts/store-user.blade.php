@extends('layouts/contentNavbarLayout')

@section('title', 'Store Accounts')

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/masonry/masonry.js')}}"></script>
<script src="{{ asset('assets/js/scripts/employee.js')}}"></script>
@endsection
<style>
  .is-invalid {
    border-color: red;
  }
  .invalid-feedback {
    color: red;
    font-size: 0.875em;
  }
</style>
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb breadcrumb-style1">
    <li class="breadcrumb-item">
      <a href="javascript:void(0);">Admin</a>
    </li>
    <li class="breadcrumb-item active">Accounts</li>
  </ol>
</nav>
<div class="row">
  <div class="col">
    <div class="nav-align-top mb-4">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item">
          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">Employee</button>
        </li>
        <li class="nav-item">
          <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile" aria-selected="false">User</button>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
          <!-- Account Details -->
            <div class="py-3 d-flex justify-content-end">
              <button type="button" class="btn btn-primary" id="employeeButton" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal">
                <span class="tf-icons bx bx-plus me-1"></span>Add Person
              </button>
            </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover" id="personTable">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Phone Number</th>
                    <th>Bithdate</th>
                    <th>Nationality</th>
                    <th>Religion</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @if ($person->count() > 0)
                  @foreach ($person as $data)
                    <tr>
                      <td>{{$data->firstname}} {{$data->middlename}} {{$data->lastnames}}</td>
                      <td>{{$data->sex}}</td>
                      <td>{{$data->phone_number}}</td>
                      <td>{{$data->birthday}}</td>
                      <td>{{$data->nationality}}</td>
                      <td>{{$data->religion}}</td>
                      <td class="text-center">
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item edit-person" href="javascript:void(0);" data-id="${person.id}">
                              <i class="bx bx-edit-alt me-1"></i> Edit
                            </a>
                            <a class="dropdown-item delete-person" href="javascript:void(0);" data-id="${person.id}">
                              <i class="bx bx-trash me-1"></i> Delete
                            </a>
                          </div>
                        </div>
                      </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <div class="demo-inline-spacing">
              <nav aria-label="Page navigation">
                 <ul class="pagination justify-content-end">
                    <!-- Previous Page Link -->
                    <li class="page-item {{ ($person->onFirstPage()) ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $person->previousPageUrl() }}" tabindex="-1">
                            <i class="tf-icon bx bx-chevron-left"></i>
                        </a>
                    </li>

                    <!-- Page Numbers -->
                    @foreach ($person->getUrlRange(1, $person->lastPage()) as $page => $url)
                        <li class="page-item {{ ($person->currentPage() == $page) ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    <!-- Next Page Link -->
                    <li class="page-item {{ ($person->hasMorePages()) ? '' : 'disabled' }}">
                        <a class="page-link" href="{{ $person->nextPageUrl() }}">
                            <i class="tf-icon bx bx-chevron-right"></i>
                        </a>
                    </li>
                 </ul>
              </nav>
           </div>
        </div>
        <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
          <!-- User Details -->
          <div class="py-3 d-flex justify-content-end">
            <button type="button" class="btn btn-primary" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userModal">
              <span class="tf-icons bx bx-plus me-1"></span>Add User
            </button>
          </div>
          <div class="table-responsive text-nowrap">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Account role</th>
                  <th>Employee Number</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @foreach ($usersdetails as $item)
                <tr>
                  <td>{{$item->firstname}} {{$item->middlename}} {{$item->lastname}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->role}}</td>
                  <td>{{$item->employee_number}}</td>
                  <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="demo-inline-spacing">
            <nav aria-label="Page navigation">
               <ul class="pagination justify-content-end">
                  <!-- Previous Page Link -->
                  <li class="page-item {{ ($usersdetails->onFirstPage()) ? 'disabled' : '' }}">
                      <a class="page-link" href="{{ $usersdetails->previousPageUrl() }}" tabindex="-1">
                          <i class="tf-icon bx bx-chevron-left"></i>
                      </a>
                  </li>

                  <!-- Page Numbers -->
                  @foreach ($usersdetails->getUrlRange(1, $usersdetails->lastPage()) as $page => $url)
                      <li class="page-item {{ ($usersdetails->currentPage() == $page) ? 'active' : '' }}">
                          <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                      </li>
                  @endforeach

                  <!-- Next Page Link -->
                  <li class="page-item {{ ($usersdetails->hasMorePages()) ? '' : 'disabled' }}">
                      <a class="page-link" href="{{ $usersdetails->nextPageUrl() }}">
                          <i class="tf-icon bx bx-chevron-right"></i>
                      </a>
                  </li>
               </ul>
            </nav>
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Account Details Modal -->
<div class="modal fade" id="detailsModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="detailsForm" method="post" action="{{ route('store-account.add')}}">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 class="modal-title text-center" id="detailsModalTitle">Personal Details</h5>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter firstname">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="middlename" class="form-label">Middle Name</label>
            <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter middlename">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter lastname">
          </div>
        </div>
        <div class="row g-2 pt-2">
          <div class="col mb-0">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday" id="birthday" class="form-control">
          </div>
          <div class="col mb-0">
            <label for="sex" class="form-label">Sex</label>
            <select name="sex" id="sex" class="form-control">
              <option value="" selected disabled>Select sex</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
        </div>
        <div class="row pt-3">
          <div class="col mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Enter phonenumber">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" id="nationality" class="form-control" placeholder="Enter nationality">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="religion" class="form-label">Religion</label>
            <input type="text" name="religion" id="religion" class="form-control" placeholder="Enter religion">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="personSaveBtn">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- Account User Modal -->
<div class="modal fade" id="userModal" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" id="userForm">
      @csrf
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 class="modal-title text-center" id="detailsModalTitle">Account Details</h5>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="username" class="form-label">Usename</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="**********">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="password_confirmation" class="form-label">Retry Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="**********">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="example@email.com">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="Accountholder" class="form-label">Account Holder</label>
            <select name="accountholder" id="accountholder" class="form-control">
              <option value="" selected disabled>--Account holder--</option>
              @foreach ($accountholder as $data)
                  <option value="{{ $data->id}}">{{ $data->firstname }} {{$data->middlename}} {{ $data->lastname }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row g-2 pt-2">
          <div class="col mb-0">
            <label for="role" class="form-label">Account Role</label>
            <select name="role" id="role" class="form-control">
              <option value="" selected disabled>--Select role--</option>
              <option value="Admin">Admin</option>
              <option value="Employee">Employee</option>
            </select>
          </div>
          <div class="col mb-0">
            <label for="employeenumber" class="form-label">Employee Number</label>
            <input type="text" name="employeenumber" id="employeenumber" class="form-control" placeholder="Enter employee number">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" value="Save" class="btn btn-primary" id="userSaveBtn">
      </div>
    </form>
  </div>
</div>

<!--/ Card layout -->
@endsection
