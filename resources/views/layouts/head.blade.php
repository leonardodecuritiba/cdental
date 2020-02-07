{!! Html::script('vendors/jquery/dist/jquery.min.js') !!}

<!-- Bootstrap core CSS -->
{!! Html::style('vendors/bootstrap/dist/css/bootstrap.min.css') !!}
{!! Html::style('vendors/font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('vendors/animate.css/animate.min.css') !!}

<!-- Custom styling plus plugins -->
{!! Html::style('build/css/custom.min.css') !!}

{!! Html::style('vendors/nprogress/nprogress.css') !!}
{!! Html::script('vendors/nprogress/nprogress.js') !!}

<style>
    .loading {
        background: #fff url("{{asset('images/ajax-loader.gif')}}") no-repeat center center !important;
    }
    .esconde {
        display: none;
    }

    .price-total, .price-recebido, .price-pendente {
        font-weight: 700 !important;
    }

    .price-recebido {
        color: #26B99A !important;
    }

    .price-total {
        color: #1A82C3 !important;
    }

    .price-pendente {
        color: #d9534f !important;
    }

    .modal {
        z-index: 9999;
    }
</style>
