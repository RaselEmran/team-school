{{--isset($errors) ? dd($errors->first('class_id')) : ''--}}
<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Fee Setup @endsection
@section('extraStyle')
 <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
 @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass')

 @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Section header -->
    <section class="content-header">
      <h1>
            Fees
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{URL::route('user.dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

            <li class="active">Fees Setup</li>
        </ol>
    </section>
    <!-- ./Section header -->
    <!-- Main content -->
<div class="row">
<div class="box col-md-12">
        <div class="box-inner">
            <div data-original-title="" class="box-header well">
                <h2><i class="glyphicon glyphicon-list"></i> Fee Collection</h2>

            </div>
            <div class="box-content">

              <form role="form" action="/fee/collection" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                      <div class="col-md-12">


                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label class="control-label" for="class">Class</label>

                                              <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home blue"></i></span>
                                                  <select id="class" id="class" name="class" class="form-control" >
                                                      <option value="">--Select Class--</option>
                                                      @foreach($classes as $class)
                                                          <option value="{{$class->id}}">{{$class->name}}</option>
                                                      @endforeach

                                                  </select>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label class="control-label" for="section">Section</label>

                                              <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                                  <select id="section" name="section"  class="form-control" >
                                                      <option value="A">A</option>
                                                      <option value="B">B</option>
                                                      <option value="C">C</option>
                                                      <option value="D">D</option>
                                                      <option value="E">E</option>
                                                      <option value="F">F</option>
                                                      <option value="G">G</option>
                                                      <option value="H">H</option>
                                                      <option value="I">I</option>
                                                      <option value="J">J</option>

                                                  </select>


                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label class="control-label" for="shift">Shift</label>

                                              <div class="input-group">
                                                  <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                                  <select id="shift" name="shift"  class="form-control" >
                                                      <option value="Day">Day</option>
                                                      <option value="Morning">Morning</option>
                                                  </select>

                                              </div>
                                          </div>
                                      </div>


                                  </div>
                              </div>

                  <div class="row">
                      <div class="col-md-12">
                  <div class="col-md-4">
                      <div class="form-group ">
                          <label for="session">session</label>
                          <div class="input-group">

                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
                              <input type="text" id="session" required="true" class="form-control datepicker2" name="session"   data-date-format="yyyy">
                          </div>
                      </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="control-label" for="student">Student</label>

                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-book blue"></i></span>
                              <select id="student" name="student" class="form-control" required="true">
                                  <option value="">--Select Student--</option>
                              </select>
                          </div>
                      </div>
                  </div>

                          <div class="col-md-4">
                              <div class="form-group ">
                                  <label for="dob">Collection Date</label>
                                  <div class="input-group">

                                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
                                      <input type="text"   class="form-control datepicker" name="date" required  data-date-format="yyyy-mm-dd">
                                  </div>


                              </div>
                          </div>

                          </div>
                      </div>
                      <hr class="hrclass">
                      <div class="row">
                          <div class="col-md-12">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                                           <label class="control-label" for="type">Type</label>

                                                           <div class="input-group">
                                                               <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                                               <select id="type" name="type" class="form-control" required>
                                                                    <option>--Select Fee Type--</option>
                                                               <option value="Other">Other</option>
                                                                 <option value="Monthly">Monthly</option>

                                                               </select>
                                                           </div>
                                                          </div>
                                   </div>
                                   <div class="col-md-4">
                                     <div class="form-group">
                                                           <label class="control-label" for="month">Month</label>

                                                           <div class="input-group">
                                                               <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                                               <select id="month" name="month" class="form-control" style="display:none">

                                                                            <option selected="selected" value="-1">--Select Month--</option>
                                                                            <option value="1">January</option>
                                                                            <option value="2">February</option>
                                                                            <option value="3">March</option>
                                                                            <option value="4">April</option>
                                                                            <option value="5">May</option>
                                                                            <option value="6">June</option>
                                                                            <option value="7">July</option>
                                                                            <option value="8">August</option>
                                                                            <option value="9">September</option>
                                                                            <option value="10">October</option>
                                                                            <option value="11">November</option>
                                                                            <option value="12">December</option>

                                                                        </select>

                                                               </select>
                                                           </div>
                                                          </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label class="control-label" for="student">Fee Name</label>

                                           <div class="input-group">
                                               <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                               <select id="fee" name="fee" class="form-control" required="true">
                                                   <option value="-1">--Select Fee--</option>
                                               </select>
                                           </div>
                                       </div>
                                   </div>

                    </div>
                    </div>
                    <div id="feeInfoDiv" style="Display:none">
                    <div class="row">
                        <div class="col-md-12">
                       <div class="col-md-4">
                         <div class="form-group">
                             <label for="feeAmount">Fee</label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                 <input id="feeAmount" type="text" class="form-control" readonly="true"  name="feeAmount" placeholder="0.00">
                             </div>
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                             <label for="LateFeeAmount">Late Fee</label>
                             <div class="input-group">
                                 <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign blue"></i></span>
                                 <input id="LateFeeAmount" type="text" class="form-control" name="LateFeeAmount" placeholder="0.00">
                             </div>
                         </div>
                       </div>
                       <div class="col-md-4">
                         <div class="form-group">
                             <label>&nbsp;</label>
                              <div class="input-group">
                         <button type="button" class="btn btn-primary" id="btnAddRow"  ><i class="glyphicon glyphicon-plus"></i> Add Fee</button>&nbsp;&nbsp;
                         <button type="button" class="btn btn-danger" id="btnDeleteRow" ><i class="glyphicon glyphicon-trash"></i> Remove Fee</button>
                       </div>
                       </div>
                         </div>

                  </div>
                  </div>
                </div>


                  <hr class="hrclass">
                  <div class="row">
                      <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="feeList" class="table table-striped table-bordered table-hover">
                              <thead>
                                       <tr>
                                           <th>#</th>
                                           <th>Title</th>
                                           <th>Month</th>
                                           <th>Fee</th>
                                           <th>Late Fee</th>
                                           <th>Total</th>

                                       </tr>
                                       </thead>
                                       <tbody>
                                       <tbody>
                            </table>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                            <div class="col-md-6">
                           <label class="control-label" for="ctotal">Current Total:</label>
                         </div>
                             <div class="col-md-6">
                            <input type="text" class="form-control" id="ctotal" readOnly="true" name="ctotal" value="0.00">
                          </div>
                             </div>
                           </div>
                           <div class="row">
                               <div class="col-md-12">
                           <div class="col-md-6">
                            <label class="control-label" for="previousdue">Previous Due:</label>
                          </div>
                             <div class="col-md-6">
                             <input type="text" class="form-control" id="previousdue" readOnly="true"  name="previousdue" value="0.00">
                           </div>
                           </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                              <div class="col-md-6">
                               <label class="control-label" for="gtotal">Grand Total:</label>
                             </div>
                                <div class="col-md-6">
                                <input type="text" class="form-control" id="gtotal" readOnly="true"  name="gtotal" value="0.00">
                              </div>
                              </div>
                                 </div>
                              <div class="row">
                                  <div class="col-md-12">
                              <div class="col-md-6">
                             <label class="control-label" for="paidamount">Paid Amount:</label>
                           </div>
                                 <div class="col-md-6">
                              <input type="text" class="form-control" id="paidamount" required="true" name="paidamount" value="0.00">
                            </div>
                          </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-12">
                               <div class="col-md-6">
                              <label class="control-label" for="dueamount">Due Amount:</label>
                            </div>
                                     <div class="col-md-6">
                               <input type="text" class="form-control" id="dueamount" readOnly="true"  name="dueamount" value="0.00">
                             </div>
                           </div>
                                </div>
                          </div>
                          <div class="col-md-6">
                                     <button class="btn btn-primary pull-right" id="btnsave" type="submit"><i class="glyphicon glyphicon-plus"></i>Save</button>
                            </div>
                        </div>
                    </div>


        </form>

    </div>
</div>
</div>
    <!-- /.content -->
@endsection
<!-- END PAGE CONTENT-->

<!-- BEGIN PAGE JS-->
@section('extraScript')
 <script src="{{asset('js/toastr.min.js')}}"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            Academic.iclassInit();
        });
    </script>
    <script>
    	$("#feesetup").validate({
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `help-block` class to the error element
                error.addClass("help-block");
                error.insertAfter(element);

            },
            highlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group>div").addClass("has-error").removeClass("has-success");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".form-group>div").addClass("has-success").removeClass("has-error");
            }
        });
    </script>
@endsection
<!-- END PAGE JS-->
