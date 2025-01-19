{{-- @extends('layouts.app') --}}
@extends('master.main')
@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="m-auto col-md-9">
<form action="{{ route("doctor.register") }}" method="post">
    @csrf
                    <!-- Basic Information -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Basic Information</h4>
                            <div class="row form-row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="change-avatar">
                                            <div class="profile-img">
                                                <img src="" id="doc-avi" style="display: none">
                                            </div>
                                            <div class="upload-img">
                                                <div class="change-photo-btn">
                                                    <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                    <input type="file" name="image" onchange="readURL(this);"
                                                        class="upload">
                                                </div>
                                                <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of
                                                    2MB</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Confirm-Password <span class="text-danger">*</span></label>
                                        <input type="password" name="confirm-password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gender</label> <span class="text-danger">*</span>
                                        <select class="form-control select" name="gender">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-0">
                                        <label>Date of Birth</label> <span class="text-danger">*</span>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Meeting fee</label> <span class="text-danger">*</span>
                                        <input type="number" name="fee" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Department</label> <span class="text-danger">*</span>
                                        <select class="form-control select" name="dept_id">
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{$department->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Basic Information -->

                    <!-- About Me -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">About Me</h4>
                            <div class="form-group mb-0">
                                <label>Biography</label> <span class="text-danger">*</span>
                                <textarea class="form-control" name="bio" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /About Me -->

                    <!-- Contact Details -->
                    <div class="card contact-card">
                        <div class="card-body">
                            <h4 class="card-title">Contact Details</h4>
                            <div class="row form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address Line 1</label> <span class="text-danger">*</span>
                                        <input type="text" name="address1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Address Line 2</label>
                                        <input type="text" name="address2" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">City</label> <span class="text-danger">*</span>
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">State / Province</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Country</label> <span class="text-danger">*</span>
                                        <input type="text" name="country" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Postal Code</label> <span
                                            class="text-danger">*</span>
                                        <input type="text" name="zip_code" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Contact Details -->

                    <!-- Services and Specialization -->
                    <div class="card services-card">
                        <div class="card-body">
                            <h4 class="card-title">Services and Specialization</h4>
                            <div class="form-group">
                                <label>Services</label> <span class="text-danger">*</span>
                                <input type="text" data-role="tagsinput" class="input-tags form-control"
                                    placeholder="Enter Services" name="services" id="services">
                                <small class="form-text text-muted">Note : Type & Press enter to add new services</small>
                            </div>
                            <div class="form-group mb-0">
                                <label>Specialization </label>
                                <input class="input-tags form-control" type="text" data-role="tagsinput"
                                    placeholder="Enter specialization if any (optional)" name="specialization"
                                    id="specialist">
                                <small class="form-text text-muted">Note : Type & Press enter to add new
                                    specialization</small>
                            </div>
                        </div>
                    </div>
                    <!-- /Services and Specialization -->

                    <!-- Education -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Education <span class="text-danger">*</span></h4>
                            <div class="reg-education-info">
                                <div class="row form-row education-cont">
                                    <div class="col-md-11">
                                        <div class="row form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Degree</label>
                                                    <input type="text" name="edu_degree[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>College/Institute</label>
                                                    <input type="text" name="edu_institute[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="text" name="edu_from[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="text" name="edu_to[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="reg-add-education"><i class="fa fa-plus-circle"></i>
                                    Add
                                    More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Education -->

                    <!-- Experience -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Experience <span class="text-danger">*</span></h4>
                            <div class="reg-experience-info">
                                <div class="row form-row experience-cont">
                                    <div class="col-md-11">
                                        <div class="row form-row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Designation</label>
                                                    <input type="text" name="exp_designation[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Hospital Name</label>
                                                    <input type="text" name="exp_hospital[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>From</label>
                                                    <input type="text" name="exp_from[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>To</label>
                                                    <input type="text" name="exp_to[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-more">
                                <a href="javascript:void(0);" class="reg-add-experience"><i class="fa fa-plus-circle"></i>
                                    Add More</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Experience -->

                    <div class="submit-section submit-btn-bottom">
                        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
                    </div>
                </form>
                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
@endsection
