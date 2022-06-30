@extends('adminlte::page')

@section('title', 'Product Category')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="mb-1">Product Category List</h1>
            {{ Breadcrumbs::render('productCategories.index') }}
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

        <div class="card card-outline card-primary">
            <div class="card-body p-3">

                <p class="d-block mb-2 font-weight-bold">Exporting Categories</p>

                @include('product_categories.table')

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
                filename: `${pageTitle}.xls`, // do include extension
                preserveColors: false // set to true if you want background colors and font colors preserved
            });
        })

        $('.btnCsv').click(function() {
            $(".main-table").table2csv({
                separator: ',',
                newline: '\n',
                quoteFields: true,
                excludeColumns: '.noExcel',
                excludeRows: '',
                trimContent: true
            });
        })

        $('.btnPdf').click(function() {
            $(".main-table").tableHTMLExport({
                type: 'pdf',
                orientation: 'p',
                filename:`${pageTitle}.pdf`,
                ignoreColumns: '.noExcel',
            });
        })

        $('.btnPrint').click(function() {
            let elem = $('.main-table').first();
            let header = `<h2>${pageTitle} List</h2>`;

            if ($('#printSection').length < 1) {
                let el = `<div id='printSection' class='w-100'></div>`
                $('body').append(el);
            }

            $('#printSection').empty().append(header, elem.clone());
            window.print(); 
        })
    });
</script>
@endpush

