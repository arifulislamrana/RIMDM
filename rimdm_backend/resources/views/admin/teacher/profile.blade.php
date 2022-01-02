@extends('admin._index')

@section('title', 'Teacher profile')

@section('style')

@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Teacher Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="height: 135px; width: 150px;"
                       src="{{$teacherProfileModel->teacher->img}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">
                  {{$teacherProfileModel->teacher->name}}
                </h3>

                <p class="text-muted text-center">{{$teacherProfileModel->teacher->designation}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Qualifications:</b> <a class="float-right">{{ $teacherProfileModel->teacher->qualification }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">{{ $teacherProfileModel->teacher->phone }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email:</b> <a class="float-right">{{ $teacherProfileModel->teacher->email }}</a>
                  </li>
                  @if ($teacherProfileModel->role != 'teacher')
                  <li class="list-group-item">
                    <b>Role:</b> <a class="float-right">{{ $teacherProfileModel->role }}</a>
                  </li>
                  @endif
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Class Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">My Posts</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Create Post</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">My Recent Classes and Subjects</h3>
                          </div>
                          <!-- ./card-header -->
                          <div class="card-body">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Class</th>
                                  <th>Subject</th>
                                </tr>
                              </thead>
                              <tbody>
                                @for ($i = 0; $i < count($teacherProfileModel->teacherClassDetails); $i++)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                  <td>{{ $teacherProfileModel->teacherClassDetails[$i]['class'] }}</td>
                                  <td>{{ $teacherProfileModel->teacherClassDetails[$i]['subject'] }}</td>
                                </tr>
                                @endfor
                              </tbody>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="row">
                      Class teachers Post will be included
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    Class teachers Post will be included
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- jQuery -->
<script src="../../back/plugins/jquery/jquery.min.js"></script>
@endsection


