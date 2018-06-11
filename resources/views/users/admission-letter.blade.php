@extends('users.layouts.app')
@section('contents')
<style>
.text-down{
    /* color: red; */
    position: initial;
    bottom: 0px !important;
    width: 100%;
}
</style>
    <div class="card mb-5">
        <div class="card-header">
            <i class="fa fa-fw fa-table"></i> Admission letter
        </div>
        <div class="card-body" id="printableArea">
            <div class="header justify-content-center my-auto d-flex text-center">
                <div class="row">
                    <img src="logo.png" width="100" height="100" class="col-lg-3" alt="logo">
                    <div class="content col-lg-9">
                        <h2>GIDEON COLLEGE</h2>
                        <small><p>P.M.B, 2018 YABA <br> LAGOS, NIGERIA <br> E-mail: registry@gideoncollege.edu.ng</p></small>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="address">

                <div class="text-right">
                    <img src="uploads/{{Auth::user()->path}}" alt="{{Auth::user()->surname}}" width="200" height="200">
                </div>
                <div class="row">
                    <div class="col-lg-6 text-left">
                        <h6 class="text-down" style="text-transform: uppercase;">{{Auth::user()->surname}} {{Auth::user()->firstname}} {{Auth::user()->othername}}</h6>
                    </div>
                    <div class="col-lg-6 text-right">
                        <p class="text-down">
                            <strong>Matric / Application Number:</strong>
                            <a>{{Auth::user()->matric}}</a>
                        </p>
                    </div>
                </div>
            </div>
            @if($addletters = App\AdmissionLetter::all())
                @foreach($addletters as $addletter)
                    <div class="header-text text-center" style="text-transform: uppercase;">
                        <h4><b>{{$addletter->title}}</b></h4>
                    </div>
                    <div class="body-text" style="word-break: break-word;">
                        <p style="white-space: pre-wrap;">
                            {{$addletter->body}}
                        </p>
                    </div>
                    <div class="footer-text text-center">
                        {{$addletter->footer}}
                        <br>
                        <img src="uploads/{{Auth::user()->pth}}" width="300" height="50" alt="signature">
                        <br>
                        <?php echo date('d-m-Y') ?>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                <a class="text-muted">
                    <small>
                        <small>Copyright [c] 2018 DEVELOPED BY GIDEON | GIDEON COLEGE</small>
                    </small>
                </a>
                <button class="print btn btn-sm text-white bg-dark" onclick="printDiv('printableArea')">
                    Print Admission Letter
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