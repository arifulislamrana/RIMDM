@extends('layouts._index')
@section('title','Contact')

@section('content')
<div class="page-header-overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <h1>Teacher Profile </h1>
                </header><!-- .entry-header -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .page-header-overlay -->
</div><!-- .page-header -->

<div class="container">
<div class="row">
    <div class="col-12">
        <div class="breadcrumbs">
            <ul class="flex flex-wrap align-items-center p-0 m-0">
                <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                <li>Teacher </li>
            </ul>
        </div><!-- .breadcrumbs -->
    </div><!-- .col -->
</div><!-- .row -->
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" style="height: 135px; width: 150px; border-radius:50%"
                     src="{{$teacherProfileModel->teacher->img}}"
                     alt="User profile picture">
              </div>

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
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-7">
          <div class="card">
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
</div><!-- .container -->
@endsection
