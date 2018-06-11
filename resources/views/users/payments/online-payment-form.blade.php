<div id="onlineForm" class="card">
<div class="card-header">
<h1>
    SCHOOL FEE PAYMENT
</h1>
</div>
<hr>
<div class="row">
<div class="col-lg-8">
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
    <div class="text-right">
        <h1 style="font-weight: lighter;">Total: NGN 75000.00</h1>
    </div>
</div>






<div class="col-lg-4">
<div class="card">
<div class="card-header">
    <div class="row">
        <div class="col-md-7 col-12 pt-2">
            <h6 class="m-0"><strong>Payment Details</strong></h6>
        </div>
        <div class="col-md-5 col-12 icons">
            <i class="fa fa-cc-visa fa-2x" aria-hidden="true"></i>
            <i class="fa fa-cc-mastercard fa-2x" aria-hidden="true"></i>
        </div>
    </div>
</div>
 <div class="card-body row">
 <div class="col-md-12">
 <form class="form-horizontal" method="POST" id="payment-form" role="form" action="{!!route('addmoney.stripe')!!}" >
{{ csrf_field() }}
 
 <div class="form-row">
    <div class="col-lg-8 form-group required">
    <input autocomplete="off" class="form-control card-number" placeholder="Card Number" size="20" type="text" name="card_no" required />
    </div>

    <div class="col-lg-4 form-group cvc required">
    <input autocomplete="off" class="form-control card-cvc" placeholder="CVV" size="4" type="text" name="cvvNumber" required />
    </div>
 </div>
 <div class="form-row">
    <div class="col-lg-3 form-group expiration required">
    <input class="form-control card-expiry-month" placeholder="MM" size="2" type="text" name="ccExpiryMonth" required />
    </div>
    <div class="col-lg-4 form-group expiration required">
    <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="text" name="ccExpiryYear" required />
    <!-- <input class="form-control card-expiry-year" placeholder="YYYY" size="4" type="hidden" name="amount" value="300"> -->
    </div>
 </div>
 <div class="form-row">
 <div class="col-md-12 form-group">
 <button class="form-control btn btn-primary submit-button" type="submit">PAY SCHOOL FEES</button>
 </div>
 </div>
 <!-- <div class="form-row">
 <div class="col-md-12 error form-group hide">
 <div class="alert-danger alert">
 Please correct the errors and try again.
 </div>
 </div>
 </div> -->
 <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
 <input type="hidden" name="invoice" value="{{Auth::user()->id}}invoice{{rand(9, 123456789)}}">
 <input type="hidden" name="invioce" value="{{Auth::user()->id}}invoice{{rand(9, 123456789)}}">
 <input type="hidden" name="payment_type" value="SCHOOL FEE">
 <input type="hidden" name="description" value="SCHOOL FEE FOR {{Strtoupper(Auth::user()->surname)}} {{Strtoupper(Auth::user()->firstname)}}">
 <input type="hidden" name="transaction_date" value="{{date('hr')}}">
 <input type="hidden" name="payment_method" value="ONLINE PAYMENT">
 <input type="hidden" name="status" value="PAID">
 
 </form>
 </div>
 <div class="col-md-4"></div>
 </div>
</div>
</div>
</div>
</div>

<script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>