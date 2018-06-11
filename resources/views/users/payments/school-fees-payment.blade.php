@extends('users.layouts.app')
@section('contents')
@include('layouts.addits')


@if(Auth::user()->payment_status == 0)

<script>
$(document).ready(function(){
    $('#prog-type').fadeIn('slow');
    $("#online").click(function(e){
        $('#prog-type').fadeOut('slow');
        $('#onlineForm').fadeIn('slow');
	});
    $("#offline").click(function(e){
        $('#prog-type').fadeOut('slow');
        $('#offlineForm').fadeIn('slow');
	});
});
</script>
<style>
#onlineForm{
    display: none;
}
#offlineForm{
    display: none;
}
</style>
<div id="prog-type">
    <div class="prog-type-content">
        <h3 class="text-center">Please select your payment method</h3>
        <br>
        <br>
        <div class="row text-center">
            <div class="col-lg-6">
                <img src="assets/images/online.png" width="200" height="200" alt="" id="online" class="img-responsive">
                <p>Online Payment</p>
            </div>
            <div class="col-lg-6">
                <img src="assets/images/offline.png" width="200" height="200" alt="" id="offline" class="img-responsive">
                <p>Manual Payment</p>
            </div>
        </div>
    </div>
</div>

@include('users.payments.online-payment-form')
@include('users.payments.offline-payment-form')

@else


<div class="card">
<div class="card-header">
<h1>
    SCHOOL FEE RECEIPT
</h1>
</div>
    <div class="card-body table-responsive">
        <div class="row">
            <div class="col-lg-4">
                <p>Payment Made To</p>
                <p><b>Gideon College</b></p>
                <p>Yaba,lagos</p>
            </div>
            <div class="col-lg-4">
                <p>From</p>
                <p><b>{{Strtoupper(Auth::user()->surname)}} {{Strtoupper(Auth::user()->firstname)}} {{Strtoupper(Auth::user()->othername)}}</b></p>
                <small>
                <p>{{Strtoupper(Auth::user()->matric)}}</p>
                <p>{{Auth::user()->email}}</p>
                </small>
            </div>
            <div class="col-lg-4">
                <p>Invouce ID: 323454645</p>
                <p>Order ID: 323454645</p>
                <p>Amount: 75000.00</p>
            </div>
        </div>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>ID</th>
                <th>Payment Type</th>
                <th>Payment Hash</th>
                <th>Description</th>
                <th>Transaction Date</th>
                <th>Payment Method</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{Auth::user()->id}}</td>
                <td>SCHOOL FEE</td>
                <td>jlnhlknj</td>
                <td>SCHOOL FEE FOR {{Strtoupper(Auth::user()->surname)}} {{Strtoupper(Auth::user()->firstname)}}</td>
                <td>{{date('hr')}}</td>
                <td>ONLINE PAYMENT</td>
                <td>PENDING</td>
            </tr>
            <tr>
            </tbody>
        </table>
    </div>
    <div class="text-right pr-2">
        <h1 style="font-weight: lighter;">Total: NGN 75000.00</h1>
    </div>
    <div class="card-footer">
            <div class="row">
                <a class="text-muted">
                    <small>
                        <small>Copyright [c] 2018 DEVELOPED BY GIDEON | GIDEON COLEGE</small>
                    </small>
                </a>
                <button class="print btn btn-sm text-white bg-dark" onclick="printDiv('printableArea')">
                    Print School Fee Payment Receipt
                </button>
            </div>
        </div>
<script>
    function printDiv(divName){
        
        window.print(divName);
    }
</script>

@endif


@endsection
