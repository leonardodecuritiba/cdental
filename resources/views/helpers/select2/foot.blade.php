{!! Html::script('vendors/select2/dist/js/select2.min.js') !!}
{!! Html::script('vendors/select2/dist/js/i18n/pt-BR.js') !!}

<!-- Select2 -->
<script>
    $(document).ready(function() {
        $(".select2").select2({ width: 'resolve' });
    });
</script>
<!-- /Select2 -->
