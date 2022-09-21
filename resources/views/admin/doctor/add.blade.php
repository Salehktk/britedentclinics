@extends('layouts.dashboard_layout')

@section('PAGE_TITLE') Add New Doctor @endsection

@section('dashboard_content')
<div class="row mt-4">
    <div class="col-md-7 mb-4 mx-auto">
        <div class="card border-0 shadow-sm p-3">
            <form action="{{ route('add_doctor') }}" method="post" class="row needs-validation" novalidate>
                @csrf
                <div class="row mb-2 mx-auto">
                    <div class="col-md-6 mb-2">
                            <div class=" d-flex flex-column" style="width: 150px;">
                              <img src="{{asset('images/doctor/profile-image.jpg')}}"
                                alt="profile image" class="img-fluid img-thumbnail mt-4 mb-2" id="output"
                                style="width: 150px; height:150px; z-index: 1; " >
                              <div id="yourBtn" class="btn btn-outline-primary btn-sm"  onclick="getFile()"
                                ">
                                Edit profile image
                            </div>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" onchange="loadFile(event)"/></div>
                            </div>
                    </div>
                </div>
                <div class="row mb-2 mx-auto">
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label mb-2">Name: <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="name"  name="name"
                                placeholder="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('name'))
                                    {{ $errors->first('name') }}
                                @else
                                    Please choose a name.
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label mb-2">e-Mail: <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="ex. test@test.com" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @else
                                    Please choose an email.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-2 mx-auto">
                    <div class="col-md-6 mb-2">
                        <label for="phone" class="form-label mb-2">Phone: <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="phone" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('phone'))
                                    {{ $errors->first('phone') }}
                                @else
                                    Please choose a phone.
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="email" class="form-label mb-2">e-Mail: <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="ex. test@test.com" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                            <div class="invalid-feedback">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @else
                                    Please choose a email.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-auto">
                    <div class="col-12">
                        <button class="btn btn-outline-primary btn-sm" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('dashboard_script')
<script>
function getFile(){
     document.getElementById("upfile").click();
}

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };

</script>
@endsection