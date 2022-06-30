@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Products</h1>
            {{ Breadcrumbs::render('products.index') }}
        </div>
    </div>
@endsection

@section('plugins.Datatables', true)

@section('plugins.JqueryUtil', true)

@push('css')
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">
@endpush

@section('content')

    <div class="content">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card card-primary card-outline">
            <div class="card-body p-3">
                <p class="d-block mb-2 font-weight-bold">Exporting Product</p>
                @include('products.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('js')
<script>
    $(function() {
        $('.main-table').DataTable({
            "order":[[0, 'desc']],
            "pageLength": 10,
            "paging": true,
            "lengthChange": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

        // modify datatable
        let dataTablesLength = $('.dataTables_length');
        let dataTablesFilter = $('.dataTables_filter');
        var pageTitle = $(document).attr('title'); 

        dataTablesLength.parent().removeClass('col-md-6').addClass('col-md-4 text-center');
        dataTablesFilter.parent().removeClass('col-md-6').addClass('col-md-4');

        let exportingElement = `
        <div class='col-sm-12 col-md-4'>
            <table class='table table-bordered text-center'>
                <tr>
                    <td class='btnCopy p-1'>Copy</td>
                    <td class='btnExcel p-1'>Excel</td>
                    <td class='btnCsv p-1'>CSV</td>
                    <td class='btnPdf p-1'>PDF</td>
                    <td class='btnPrint p-1'>Print</td>
                </tr>
            </table>
        </div>
        `;

        $(exportingElement).insertBefore(dataTablesLength.parent());

        $('.btnCopy, .btnExcel, .btnCsv, .btnPdf, .btnPrint').each( function() {
            $(this)
                .css('cursor', 'pointer')
                .hover(() => {
                    $(this).css('background-color', '#ddd')
                }, () => {
                    $(this).css('background-color', 'unset')
                });
        });

        // Exporting Button Section --->

        $('.btnCopy').click(function() {
            let table = document.querySelector('.main-table');
            let range = document.createRange();
            let selection = window.getSelection();
            range.selectNode(table);
            selection.removeAllRanges();
            selection.addRange(range);
            document.execCommand('copy');
        })  

        $('.btnExcel').click(function() {
            $(".main-table").table2excel({
                exclude: ".noExcel",
                name: pageTitle,
                filename: `${pageTitle}.xls`,
                preserveColors: false
            });
        })

        $('.btnCsv').click(function() {
            var table = $('.main-table');

            removeStyle(table)

            table.table2csv({
                separator: ',',
                newline: '\n',
                quoteFields: true,
                excludeColumns: '.noExcel',
                excludeRows: '',
                trimContent: true
            });

            addStyle(table)
        })

        $('.btnPdf').click(function() {
            var table = $('.main-table');

            removeStyle(table)

            table.tableHTMLExport({
                type: 'pdf',
                orientation: 'l',
                filename:`${pageTitle}.pdf`,
                ignoreColumns: '.noExcel',
            });

            addStyle(table)
        })

        $('.btnPrint').click(function() {
            let table = $('.main-table').first();

            removeStyle(table);

            let header = `<h2>${pageTitle} List</h2>`;

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
