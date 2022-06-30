@extends('adminlte::page')

@section('title', 'View Invoice')

@section('plugins.JqueryUtil', true)

@push('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js">
    </script><script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
@endpush

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">View Invoice</h1>
            {{ Breadcrumbs::render('invoices.show', $invoice) }}
        </div>
        <div class="col-sm-6 mt-3 d-flex justify-content-end align-items-end">
            <a class="btn btn-default float-right"
                href="{{ route('invoices.index') }}">
                Back
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="content">
        <div class="card">
            <div class="main-content">
                <div class="card-header row">
                    <div class="col-3 card-text">
                        <b> Invoice# {{ $invoice->invoice_number}} </b>
                    </div>
                    <div class="col-3 offset-6 text-right">
                        <b> {{ $invoice->transac_date }} </b>
                    </div>
                </div>
                <div class="card-body p-4">
                    @include('invoices.show_fields')
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <div>
                        <button class="btn btn-danger btn-sm mr-2 btnPrint"><i class="fas fa-print"></i> Print</button>
                        <button class="btn btn-primary btn-sm btnPdf"><i class="fas fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pdfEditor"></div>
@endsection

@push('js')
    <script>
        $(function() {

            var pageTitle = "Invoice";

            $('.btnPdf').click(function() {
                
                html2canvas($('.main-content'), {
                    dpi: 300,
                    background: "#ffffff",
                    useCORS: true,
                    allowTaint: true,
                    letterRendering: true,
                    onrendered: function(canvas) {
                        var myImage = canvas.toDataURL("image/jpeg,1.0");
                        // Adjust width and height
                        var imgWidth =  (canvas.width * 60) / 240;
                        var imgHeight = (canvas.height * 70) / 240;
                        // jspdf changes
                        var pdf = new jsPDF('p', 'mm', 'a4');
                        pdf.addImage(myImage, 'png', 15, 2, imgWidth, imgHeight); // 2: 19
                        pdf.save(`${pageTitle}.pdf`);
                    }
                });

            })

            $('.btnPrint').click(function() {
                let table = $('.main-content').first();

                removeStyle(table);

                let header = `<h2>${pageTitle}</h2>`;

                if ($('#printSection').length < 1) {
                    let el = `<div id='printSection' class='w-100'></div>`
                    $('body').append(el);
                    console.log('no element')
                }

                $('#printSection').empty().append(header, table.clone());

                addStyle(table);

                window.print(); 
            })

            // This function will show thead and tr 
            // in order to be part of export (csv,pdf,print)
            // when table is in collpased
            // ----->

            function removeStyle(table) {
                if($('.main-table').hasClass('collapsed')) {
                    let tableHead = table.find("th");
                    let tableRow = table.find("td");

                    tableHead.each(function() {
                        if($(this).attr('style')) { 
                            $(this).addClass('pointer').removeAttr('style')
                        }
                    })

                    tableRow.each(function() {
                        if($(this).attr('style')) { 
                            $(this).addClass('pointer').removeAttr('style')
                        }
                    })
                    
                }
            }

            function addStyle(table) {
                if($('.main-table').hasClass('collapsed')) {
                    let tableHead = table.find("th");
                    let tableRow = table.find("td");

                    tableHead.each(function() {
                        if($(this).hasClass('pointer')) { 
                            $(this).css('display', 'none')
                        }
                    })

                    tableRow.each(function() {
                        if($(this).hasClass('pointer')) { 
                            $(this).css('display', 'none')
                        }
                    })
                    
                }
            }
        });
    </script>
@endpush