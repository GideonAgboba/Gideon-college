@extends('users.layouts.app')
@section('contents')
<style>
</style>
    <div class="card mb-5">
        <div class="card-header">
            <i class="fa fa-fw fa-table"></i> Bio data
        </div>
        <div class="information">
            <marquee behavior="scroll" direction="left">
                Please pay school fees to update profile
            </marquee>
            <!-- <button>Print Bio-Date</button> -->
        </div>
        <div class="card-body" id="printableArea">
            <div class="row">
                <div class="col-lg-9">
                    <div class="bio-data-content">
                        <div class="bio-data-header">
                            <h5>My Personal Data</h5>
                        </div>
                        <div class="item">
                            <strong>Name:</strong>
                            <a>{{Auth::user()->surname}} {{Auth::user()->firstname}} {{Auth::user()->othername}}</a>
                        </div>
                        <div class="item">
                            <strong>Matric Number:</strong>
                            <a>{{Auth::user()->matric}}</a>
                        </div>
                        <div class="item">
                            <strong>programme Type:</strong>
                            <a>{{Auth::user()->programme_type}}</a>
                        </div>
                        <div class="item">
                            <strong>programme Mode:</strong>
                            <a>{{Auth::user()->programme_mode}}</a>
                        </div>
                        <div class="item">
                            <strong>School:</strong>
                            <a>{{Auth::user()->school}}</a>
                        </div>
                        <div class="item">
                            <strong>Department:</strong>
                            <a>{{Auth::user()->department}}</a>
                        </div>
                        <div class="item">
                            <strong>Siemester:</strong>
                            <a>{{Auth::user()->siemester}}</a>
                        </div>
                        <div class="item">
                            <strong>Entry Year:</strong>
                            <a>{{Auth::user()->entry_year}}</a>
                        </div>
                        <div class="item">
                            <strong>Sex:</strong>
                            <a>{{Auth::user()->sex}}</a>
                        </div>
                        <div class="item">
                            <strong>Date of Birth:</strong>
                            <a>{{Auth::user()->date_of_birth}}</a>
                        </div>
                        <div class="item">
                            <strong>E-mail Address:</strong>
                            <a style="text-transform: lowercase;">{{Auth::user()->email}}</a>
                        </div>
                        <div class="item">
                            <strong>Phone Number:</strong>
                            <a>{{Auth::user()->phone}}</a>
                        </div>
                        <div class="item">
                            <strong>Place of Birth:</strong>
                            <a>{{Auth::user()->place_of_birth}}</a>
                        </div>
                        <div class="item">
                            <strong>State of Origin:</strong>
                            <a>{{Auth::user()->state_of_origin}}</a>
                        </div>
                        <div class="item">
                            <strong>Local Govt:</strong>
                            <a>{{Auth::user()->local_government}}</a>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div class="bio-data-header">
                            <h5>Parent/Guardian Information</h5>
                        </div>
                        <div class="item">
                            <strong>Parent/Guardian Name:</strong>
                            <a>{{Auth::user()->parent_name}}</a>
                        </div>
                        <div class="item">
                            <strong>Parent/Guardian Address:</strong>
                            <a>{{Auth::user()->parent_address}}</a>
                        </div>
                        <div class="item">
                            <strong>Parent/Guardian Phone:</strong>
                            <a>{{Auth::user()->parent_phone}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-img">
                        <img src="uploads/{{Auth::user()->path}}" alt="profile">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <a class="text-muted">
                    <small>
                        <small>Copyright [c] 2018 DEVELOPED BY GIDEON | GIDEON COLEGE</small>
                    </small>
                </a>
                <button class="print btn btn-sm text-white bg-dark" onclick="printDiv('printableArea')">
                    Print Bio Data
                </button>
            </div>
        </div>
    </div>

<script>
    function printDiv(divName){
        
        window.print(divName);
    }
</script>
@endsection