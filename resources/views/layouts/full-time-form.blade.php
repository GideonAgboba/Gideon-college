<form id="fullTimeForm" method="POST" action="{{ url('/submitregistrationform') }}">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="POST">
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                <input type="text" class="form-control" name="surname" required="" placeholder="Surname*">
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control" name="firstname" required="" placeholder="Firstname*">
            </div>
            <div class="col-lg-4">
                <input type="text" class="form-control" name="othername" required="" placeholder="Othername*">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-4">
                @if($programme_types = App\FullTimeProgrammeType::all())
                <select type="text" class="form-control" name="programme_type" required="">
                    <option value="">Programme type</option>
                    @foreach($programme_types as $programme_type)
                    <option value="{{$programme_type->title}}">{{$programme_type->title}}</option>
                    @endforeach
                </select>
                @endif
            </div>
            <div class="col-lg-4">
                <select type="text" class="form-control" name="programme_mode" required="">
                    <option value="full-time">Programme mode (FULL-TIME)</option>
                </select>
            </div>
            <div class="col-lg-4">
                @if($departments = App\FullTimeDepartment::all())
                <select type="text" class="form-control" name="department" required="">
                    <option value="">Select Course</option>
                    @foreach($departments as $department)
                    <option value="{{$department->title}}">{{$department->title}}</option>
                    @endforeach
                </select>
                @endif
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6">
                <input type="text" class="form-control" name="phone" required="" placeholder="Enter phone number*">
            </div>
            <div class="col-lg-6">
                <input type="email" class="form-control" name="email" required="" placeholder="Enter email address*">
            </div>
        </div>
    </div>
    <div class="mbr-buttons">
    <button type="submit" class="form-control mbr-buttons__btn btn btn-lg btn-danger">SUBMIT FORM</button></div>
</form>