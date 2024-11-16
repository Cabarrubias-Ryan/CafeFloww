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
                      <td>{{$data->firstname}}</td>
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
                  <th>Project</th>
                  <th>Client</th>
                  <th>Users</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                <tr>
                  <td><i class="bx bxl-angular bx-sm text-danger me-3"></i> <span class="fw-medium">Angular Project</span></td>
                  <td>Albert Cook</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                        <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                        <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                        <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
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
                <tr>
                  <td><i class="bx bxl-react bx-sm text-info me-3"></i> <span class="fw-medium">React Project</span></td>
                  <td>Barry Hunter</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                        <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                        <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                        <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-success me-1">Completed</span></td>
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
                <tr>
                  <td><i class="bx bxl-vuejs bx-sm text-success me-3"></i> <span class="fw-medium">VueJs Project</span></td>
                  <td>Trevor Baker</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                        <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                        <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                        <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-info me-1">Scheduled</span></td>
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
                <tr>
                  <td><i class="bx bxl-bootstrap bx-sm text-primary me-3"></i> <span class="fw-medium">Bootstrap Project</span></td>
                  <td>Jerry Milton</td>
                  <td>
                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Lilian Fuller">
                        <img src="{{asset('assets/img/avatars/5.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Sophia Wilkerson">
                        <img src="{{asset('assets/img/avatars/6.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                      <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Christina Parker">
                        <img src="{{asset('assets/img/avatars/7.png')}}" alt="Avatar" class="rounded-circle">
                      </li>
                    </ul>
                  </td>
                  <td><span class="badge bg-label-warning me-1">Pending</span></td>
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
              </tbody>
            </table>
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
    <form class="modal-content" id="detailsForm">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h5 class="modal-title text-center" id="detailsModalTitle">Account Details</h5>
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="username" class="form-label">Usename</label>
            <input type="text" id="username" class="form-control" placeholder="Enter username">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" class="form-control" placeholder="**********">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="password_confirmation" class="form-label">Retry Password</label>
            <input type="password" id="password_confirmation" class="form-control" placeholder="**********">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" class="form-control" placeholder="example@email.com">
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="Accountholder" class="form-label">Account Holder</label>
            <select name="accountholder" id="accountholder" class="form-control">
              <option value="" selected disabled>--Account holder--</option>
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
