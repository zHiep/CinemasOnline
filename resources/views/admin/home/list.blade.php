@extends('admin.layout.index')
@section('content')
@can('statistical')
<div class="container-fluid py-4">
    <!-- Sales -->
    @include('admin.home.sales')
    <!-- Chart -->
    @include('admin.home.chart')
    <!-- Sales By movie -->
    @include('admin.home.revenue')
</div>
@endcan
@endsection
@section('scripts')
<script type="text/javascript">
    flatpickr($("#end_time"), {
        maxDate: "today",
        dateFormat: "Y-m-d ",
        "locale": "@lang('lang.language')"
    });
    start_time = flatpickr($("#start_time"), {
        maxDate: "today",
        dateFormat: "Y-m-d ",
        "locale": "@lang('lang.language')"
    });
    $('#end_time').on("change", function() {
        start_time.set(
            'maxDate', $('#end_time').val()
        );
    });
    $(document).ready(function() {
        var chart = new Morris.Bar({
            element: 'admin_chart',
            barColors: ['#09b1f3', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
            parseTime: false,
            hideHover: 'auto',
            data: [{
                date: null,
                total: null
            }],
            xkey: 'date',
            ykeys: ['total'],
            labels: ['total']
        });
        //btn-statistical-filter-from-to-date
        $('#btn-statistical-filter').click(function() {
            var from_date = $('#start_time').val();
            var to_date = $('#end_time').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "admin/filter-by-date",
                method: "GET",
                datatype: "JSON",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                success: function(data) {
                    $('#admin_chart').empty();
                    chart = new Morris.Bar({
                        element: 'admin_chart',
                        barColors: ['#09b1f3', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                        parseTime: false,
                        hideHover: 'auto',
                        data: [{
                            date: null,
                            total: null
                        }],
                        xkey: 'date',
                        ykeys: ['total'],
                        labels: ['total']
                    });
                    if (data['success']) {
                        chart.setData(data.chart_data);
                    } else if (data['error']) {
                        alert(data.error);
                    }
                },

            })
        });

        //statistical-filter
        $('.statistical-filter').change(function() {
            var statistical_value = $(this).val();
            if (statistical_value === "null") {
                chart.setData([{
                    date: null,
                    total: null,
                    seat_count: null
                }]);
                return;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "admin/statistical-filter",
                method: "GET",
                datatype: "JSON",
                data: {
                    'statistical_value': statistical_value,
                },
                success: function(data) {
                    $('#admin_chart').empty();
                    chart = new Morris.Bar({
                        element: 'admin_chart',
                        barColors: ['#09b1f3', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                        parseTime: false,
                        hideHover: 'auto',
                        data: [{
                            date: null,
                            total: null
                        }],
                        xkey: 'date',
                        ykeys: ['total'],
                        labels: ['total']
                    });
                    if (data['success']) {
                        chart.setData(data.chart_data);
                    } else if (data['error']) {
                        alert(data.error);
                    }
                }
            });
        });

        //statistical sortby
        $('.statistical-sortby').change(function() {
            var statistical_value = $(this).val();
            if (statistical_value === "null") {
                chart.setData([{
                    date: null,
                    seat_count: null
                }]);
                return;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "admin/statistical-sortby",
                method: "GET",
                datatype: "JSON",
                data: {
                    'statistical_value': statistical_value,
                },
                success: function(data) {
                    $('#admin_chart').empty();
                    if (statistical_value == 'ticket') {
                        chart = new Morris.Bar({
                            element: 'admin_chart',
                            barColors: ['#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                            parseTime: false,
                            hideHover: 'auto',
                            data: [{
                                date: null,
                                seat_count: null
                            }],
                            xkey: 'date',
                            ykeys: ['seat_count'],
                            labels: ['seat_count']
                        });
                        if (data['success']) {
                            chart.setData(data.chart_data);
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    } else if (statistical_value == 'theater') {
                        chart = new Morris.Bar({
                            element: 'admin_chart',
                            barColors: ['#fc8710', '#2dce89', '#A4ADD3', '#766B56'],
                            parseTime: false,
                            hideHover: 'auto',

                            data: [{
                                date: null,
                                '1': null,
                                '2': null,
                                '3': null
                            }],
                            xkey: 'date',
                            ykeys: ['1', '2', '3'],
                            labels: ['Rạp Cao Lỗ', 'Rạp Hồ Gươm', 'Rạp VinCom Đà Nẵng']
                        });
                        if (data['success']) {
                            chart.setData(data.chart_data);
                        } else if (data['error']) {
                            alert(data.error);
                        }
                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#search_movie').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ URL::to('admin/search_movie') }}",
                data: {
                    'search_movie': $value
                },

                success: function(data) {
                    $('#tbody_movie').html(data.output);
                }
            });
        })
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#search_theater').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ URL::to('admin/search_theater') }}",
                data: {
                    'search_theater': $value
                },

                success: function(data) {
                    $('#tbody_theater').html(data.output);
                    console.log($value);
                }
            });
        })
    });
</script>
@endsection