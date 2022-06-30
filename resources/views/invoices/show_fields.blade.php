
    <div class="d-flex flex-wrap justify-content-between flex-sm-row flex-column">
        <div>
            <img src="{{ isset($company->logo) ? asset('image/company/'. $company->logo) : ''}}" alt="Company Logo">
            <ul class="list-unstyled">
                <li><h4 class="font-weight-bold">{{ $company->name }}</h4></li>
                <li><a href="">{{ $company->website }}</a></li>
                <li class="mt-2">{{ $company->address }}</li>
                <li>{{ $company->city }}</li>
                <li>{{ $company->country }}</li>
                <li class="mt-2">{{ $company->phone }}</li>
                <li>{{ $company->fax }}</li>
            </ul>
        </div>
        <div>
            <ul class="list-unstyled">
                <li><h4 class="font-weight-bold">Invoice To</h4></li>
                <li>{{ $customer->name }}</li>
                <li class="mt-2">{{ $customer->billing_address }}</li>
                <li class="mt-2">Telephone {{ $customer->mobile }}</li>
                <li class="mt-2"><h4 class="font-weight-bold">Payment Details</h4></li>
                <li class="d-flex justify-content-between">
                    <span>Grand Total</span> 
                    <span>{{ $invoice->grand_total }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Paid Total</span> 
                    <span>{{ $invoice->amount_paid }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Total Due</span> 
                    <span>{{ ($invoice->grand_total - $invoice->amount_paid ?? 0) }}</span>    
                </li>
                <li><hr></li>
                <li class="mt-2">Invoice created by: Admin </li>
            </ul>
            

        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item Information</th>
                    <th>Quantity</th>
                    <th>Rate</th>
                    <th>Discount/Item</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($invoiceDetails as $invoiceDetail)
                    <tr>
                        <td> {{ $invoiceDetail->item }} </td>
                        <td> {{ $invoiceDetail->entered_qty }} </td>
                        <td> {{ $invoiceDetail->rate }} </td>
                        <td> {{ $invoiceDetail->discount }} </td>
                        <td> {{ $invoiceDetail->total }} </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <b>Terms and Condition</b>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam reiciendis officia architecto repellat ea, 
            aperiam recusandae commodi, quos tempore laboriosam iste vitae! Quis pariatur cumque facere neque, officiis soluta optio.</p>
        </div>
        <div class="col-sm-6">
            <div class="row">
                <ul class="list-unstyled col offset-sm-4">
                <li class="d-flex justify-content-between">
                    <span>Sub - Total amount:</span> 
                    <span>{{ ( $invoice->grand_total + $invoice->total_discount ?? 0) }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Total Discount:</span> 
                    <span>{{ $invoice->total_discount }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Grand Total:</span> 
                    <span>{{ $invoice->grand_total }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Paid Total:</span> 
                    <span>{{ $invoice->amount_paid }}</span>    
                </li>
                <li class="d-flex justify-content-between">
                    <span>Due Total:</span> 
                    <span>{{ ($invoice->grand_total - $invoice->amount_paid ?? 0) }}</span>    
                </li>
                </ul>
            </div>
        </div>
    </div>

