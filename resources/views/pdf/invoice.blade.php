<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Site favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/image/fev.png') }}" type="image/x-icon">
    <title>invoice</title>
</head>
<body>
    
    <div>
        <main>
            <style>
                body{
                    font-family: Verdana, Geneva, Tahoma, sans-serif;
                    line-height: 1.5rem;
                    font-size: 15px;
                }
                .w-100{
                    width: 100%;
                }
                .text-center{
                    text-align: center;
                }
                .text-left{
                    text-align: left;
                }
                .text-right{
                    text-align: right;
                }
                .float-right{
                    float: right;
                }
                .text-style-underline{
                    font-size: 18px;
                    text-decoration: underline;
                    font-weight: 600;
                }
                .table-header-bg th{
                    border-left: 1px solid #f7716a;
                    border-right: 1px solid #f7716a;
                }
                .table-header-bg{
                    background: #FF574D;
                }
                .table-header-bg tr th{
                    color: #ffffff;
                    vertical-align: middle;
                    padding: 3px;
                }
                .product-table{
                    border-collapse: collapse;
                }
                .product-table tbody tr td{
                    padding: 3px;
                    text-align: center;
                    border: 1px solid #ddd;
                    color: #333;
                }
                .product-table tfoot tr td{
                    color: #333;
                    padding: 3px 10px 3px 3px;
                    border: 1px solid #ddd;
                }
                .product-footer .author td span{
                    border-bottom: 2px dotted #333;
                }
            </style>

            <div>
                {{-- company info  --}}
           
                {{-- customer info  --}}
                <div>
                    <table class="w-100">
                        <tr>
                            <td width="50%" class="text-left">
                                To: <br/>
                                Name: {{ $invoice->payment->customer->name }} <br/>
                                Phone: {{ $invoice->payment->customer->mobile }} <br/>
                                Email: {{ $invoice->payment->customer->email }} <br>
                                Address: {{ $invoice->payment->customer->address }}
                            </td>
                            <td width="50%" class="text-right">
                                Invoice No: #{{ $invoice->invoice_no }} <br/>
                                Invoice Date: {{ date('d,M,Y', strtotime($invoice->invoice_date)) }}
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- customer  --}}
                <div>
                    <table class="w-100">
                        <tr>
                            <td class="text-center w-100">
                                <p class="text-style-underline">Customer Invocie</p>
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- product info  --}}
                <div>
                    <table class="w-100 product-table">
                        <thead class="table-header-bg">
                            <tr>
                                <th width="5%">#</th>
                                <th width="35%">Product Name</th>
                                <th width="20%">Category Name</th>
                                <th width="5%">Quantity</th>
                                <th width="15%">Unit Price</th>
                                <th width="20%">Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $total_sum = 0;
                            @endphp
                            @foreach ($invoiceDetails as $key => $invoiceItem)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $invoiceItem->product->name }}</td>
                                    <td>{{ $invoiceItem->category->name }}</td>
                                    <td>{{ $invoiceItem->selling_qty }}</td>
                                    <td>{{ $invoiceItem->unit_price }}</td>
                                    <td>{{ $invoiceItem->selling_price }}</td>
                                </tr>
                                @php
                                    $total_sum += $invoiceItem->selling_price;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                                <tr>
                                    <td colspan="5" class="text-right">Sub Total</td>
                                    <td class="text-center">{{ $total_sum }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Discount</td>
                                    <td class="text-center">
                                        @if ($payment->discount != NULL)
                                            {{ $payment->discount }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Paid Amount</td>
                                    <td class="text-center">{{ $payment->paid_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Due Amount</td>
                                    <td class="text-center">
                                        @if ($payment->due_amount != NULL)
                                            {{ $payment->due_amount }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right">Grand Total</td>
                                    <td class="text-center">{{ $payment->total_amount }}</td>
                                </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div style="margin-top: 60px;">
                    <table class="product-footer w-100">
                        <tr class="author">
                            <td width="50%" class="text-left">
                                <span>Customer Signature</span> 
                            </td>
                            <td width="50%" class="text-right">
                                <span>Seller Signature</span> 
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="margin-top: 60px;">
                    <table class="w-100">
                        <tr>
                            <td class="text-center">
                                <span style="font-style: italic; border-bottom: 1px solid #ddd;">Print Time: {{ date('M,d,Y,  H:i:sa') }}</span> 
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            
        </main>
    </div>
</body>
</html>