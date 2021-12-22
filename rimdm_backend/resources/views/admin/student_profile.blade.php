@extends('admin._index')

@section('title', 'Student profile')

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
              <li class="breadcrumb-item active">Student Profile</li>
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
                       src="{{$studentData->student->image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$studentData->student->name}}</h3>

                <p class="text-muted text-center">{{date('d-m-Y', strtotime($studentData->student->dob))}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Class:</b> <a class="float-right">{{ $studentData->student->classLevel->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Roll:</b> <a class="float-right">{{ $studentData->student->roll }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Phone:</b> <a class="float-right">{{ $studentData->student->phone }}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Father:</strong>

                <p class="text-muted">
                  {{ $studentData->student->f_name }}
                </p>

                <hr>
                <strong><i class="fas fa-book mr-1"></i> Mother:</strong>

                <p class="text-muted">
                  {{ $studentData->student->m_name }}
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Email:</strong>

                <p class="text-muted">{{ $studentData->student->email }}</p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Address:</strong>

                <p class="text-muted">{{ $studentData->student->address }}</p>

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
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">My Result</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Teachers Posts</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Teachers of Respective Subject</h3>
                          </div>
                          <!-- ./card-header -->
                          <div class="card-body">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Subject</th>
                                  <th>Teacher</th>
                                  <th>Phone</th>
                                  <th>Image</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($studentData->classSubjectTeacherList as $subject)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                  <td>{{ $subject->subjectName }}</td>
                                  <td>{{ $subject->teacherName }}</td>
                                  <td>{{ $subject->teacherPhone }}</td>
                                  <td><img src="{{$subject->image}}" alt="teachers image" style="border-radius: 50%; height: 50px; width: 65px"></td>
                                </tr>
                                @endforeach
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
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h3 class="card-title">Result of: {{$studentData->student->name}}</h3>
                          </div>
                          <!-- ./card-header -->
                          <div class="card-body">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>Subject</th>
                                  <th>Term</th>
                                  <th>Year</th>
                                  <th>Marks</th>
                                  <th>Grade</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($studentData->studentResults as $result)
                                <tr data-widget="expandable-table" aria-expanded="false">
                                  <td>{{ $result->subject }}</td>
                                  <td>{{ $result->term }}-No. Term</td>
                                  <td>{{ $result->year }}</td>
                                  <td>{{ $result->marks }}</td>
                                  <td>{{ $result->grade }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                              <tfoot>
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>GPA:</td>
                                  <td>calculating...</td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                          <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                      </div>
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


