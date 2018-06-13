 @extends('landing')
 @section('content')
 <div class="content-wrapper">
      <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              
              <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title w-100 font-weight-bold" >Add Student</h4>
                    </div>
                    <div class="modal-body mx-3">
                      
                      <form action="/students" method="post">
                        {{ csrf_field() }}
                        <div class="md-form mb-5">
                            <i class="glyphicon glyphicon-user prefix grey-text"></i>
                            <input type="text" class="form-control validate" required="" name="first_name">
                            <label>First Name:</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="glyphicon glyphicon-user prefix grey-text"></i>
                            <input type="text" class="form-control validate" required="" name="last_name">
                            <label>Last Name:</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="glyphicon glyphicon-user prefix grey-text"></i>
                            <select name="mid_name" id="mname">
                              <option>A</option>
                              <option>B</option>
                              <option>C</option>
                              <option>D</option>
                              <option>E</option>
                              <option>F</option>
                              <option>G</option>
                              <option>H</option>
                              <option>I</option>
                              <option>J</option>
                              <option>K</option>
                              <option>L</option>
                              <option>M</option>
                              <option>N</option>
                              <option>O</option>
                              <option>P</option>
                              <option>Q</option>
                              <option>R</option>
                              <option>S</option>
                              <option>T</option>
                              <option>U</option>
                              <option>V</option>
                              <option>W</option>
                              <option>X</option>
                              <option>Y</option>
                              <option>Z</option>
                            </select>
                            <label>Middle Name:</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-user prefix grey-text"></i>
                            <select name="sex">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                            <label>Gender:</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-calendar prefix grey-text"></i>
                            <input type="date" class="form-control validate" name="dob" required="">
                            <label>Birthday:</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-address-book prefix grey-text"></i>
                            <input type="text" class="form-control validate" required="" name="address">
                            <label>Address:</label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </form>

                    </div>
                </div>

            </div>
        </div>

      <!-- table here   -->
        <div class="box">
            <div class="box-header" id="head" >
              List of Students
            </div>
             <!-- entry button here -->
                  <div class="container">  
                    <div class="row">
                      <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                          <input type="button" value="ADD ENTRY" data-toggle="modal" data-target="#myModal" class="btn btn-success">
                        </div>
                    </div>
                  </div>  
              <!-- /.entry button --> 

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                <tr>
                  <td>{{ ucfirst($student->last_name).', '.ucfirst($student->first_name).' '.$student->mid_name.'.'  }}</td>
                  <td>{{ $student->dob }}</td>
                  <td>{{ $student->sex }}</td>
                  <td>{{ $student->address }}</td>
                  <td>

                    <button data-toggle="modal"
                                                title="Edit" 
                                                data-studid="{{ $student->id}}"
                                                data-myfname="{{ $student->first_name }}" 
                                                data-mylname="{{ $student->last_name }}" 
                                                data-mymname="{{ $student->mid_name }}" 
                                                data-mysex="{{ $student->sex }}" 
                                                data-mydob="{{ $student->dob }}"  
                                                data-myaddress="{{ $student->address }}"  
                                                data-target="#edit" 
                                                class="btn btn-success"
                    >
                        <i class="glyphicon glyphicon-edit"></i>
                    </button>



                  <form action="{{ '/students/'.$student->id }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('Delete') }} 
                          <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-danger">
                              <i class="glyphicon glyphicon-trash"></i>
                          </button>
                  </form>        
                  </td>
                </tr>
                @endforeach()
              </tbody>
              </table>
                    
                    <!-- edit modal -->
                            <div class="modal fade" id="edit" role="dialog">
                                <div class="modal-dialog">
              
                      <!-- Modal content-->
                                  <div class="modal-content">
                                      <div class="modal-header text-center">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <h4 class="modal-title w-100 font-weight-bold">Edit Student INFO.</h4>
                                      </div>
                                  <div class="modal-body mx-3">
                      
                                <form action="students/{id}" method="post">
                                    {{ method_field('patch') }}
                                    {{ csrf_field() }}
                                    <input type="hidden" id="id" name="id" value="">
                                     <div class="md-form mb-5">
                                          <i class="glyphicon glyphicon-user prefix grey-text"></i>
                                          <input type="text" id="fname" class="form-control validate" required="" name="first_name">
                                          <label>First Name:</label>
                                      </div>

                                      <div class="md-form mb-4">
                                          <i class="glyphicon glyphicon-user prefix grey-text"></i>
                                          <input type="text" id="lname" class="form-control validate" required="" name="last_name">
                                          <label>Last Name:</label>
                                      </div>

                                      <div class="md-form mb-4">
                                          <i class="glyphicon glyphicon-user prefix grey-text"></i>
                                          <select name="mid_name" id="mname">
                                            <option>A</option>
                                            <option>B</option>
                                            <option>C</option>
                                            <option>D</option>
                                            <option>E</option>
                                            <option>F</option>
                                            <option>G</option>
                                            <option>H</option>
                                            <option>I</option>
                                            <option>J</option>
                                            <option>K</option>
                                            <option>L</option>
                                            <option>M</option>
                                            <option>N</option>
                                            <option>O</option>
                                            <option>P</option>
                                            <option>Q</option>
                                            <option>R</option>
                                            <option>S</option>
                                            <option>T</option>
                                            <option>U</option>
                                            <option>V</option>
                                            <option>W</option>
                                            <option>X</option>
                                            <option>Y</option>
                                            <option>Z</option>
                                          </select>
                                          <label>Middle Name:</label>
                                      </div>


                                      <div class="md-form mb-4">
                                          <i class="fa fa-user prefix grey-text"></i>
                                          <select name="sex" id="sex">
                                            <option>Male</option>
                                            <option>Female</option>
                                          </select>
                                          <label>Gender:</label>
                                      </div>  

                                      <div class="md-form mb-4">
                                          <i class="fa fa-calendar prefix grey-text"></i>
                                          <input type="text" id="dob" class="form-control validate" name="dob">
                                          <label>Birthday:</label>
                                      </div>

                                      <div class="md-form mb-4">
                                          <i class="fa fa-address-book prefix grey-text"></i>
                                          <input type="text" id="address" class="form-control validate" required="" name="address">
                                          <label>Address:</label>
                                      </div>
                                      <div class="d-flex justify-content-center">
                                          <button type="submit" class="btn btn-success">Update</button>
                                      </div>
                                  
                                  </form>

                                  </div>
                                  </div>

                                </div>
                            </div>
                      <!-- /.edit modal -->
            </div>
          </div>
      <!-- /.table here -->
</div>
@endsection()