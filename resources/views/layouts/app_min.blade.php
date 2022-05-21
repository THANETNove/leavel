<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>{{ Session::get('nameWbe') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

        <!-- Vendor CSS Files -->

<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    
    <!-- Favicons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <link href="{{asset('assets/img/image-icon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{asset('assetstoo/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('assetstoo/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetstoo/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    
    <link href="{{asset('assetstoo/css/style.css')}}" rel="stylesheet">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link href="{{asset('assetstoo/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">

</head>
<body class="h-100">
    <div>
        @yield('content')
    </div>
      
    
    <script>
    $(document).ready(function() {
        set();
        setInterval(function() {
            set();
        }, 60000);
        });

        function set() {
            $.ajax({
                    url: "{{ url('set-interval') }}",
                    method: "post",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        let setData = data.data;
                        console.log(setData);
                         if (setData !== 0) {
                            $(".set").html(setData);
                            } 
                    }
                });
        }
    </script>


    <script src="{{asset('assetstoo/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('assetstoo/js/custom.min.js')}}"></script>
    <script src="{{asset('assetstoo/js/settings.js')}}"></script>
    <script src="{{asset('assetstoo/js/gleek.js')}}"></script>
    <script src="{{asset('assetstoo/js/styleSwitcher.js')}}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>







</body>
</html>
