{!! Html::script('vendors/jquery-maskmoney/dist/jquery.maskMoney.min.js') !!}
<script type="text/javascript">
    function initMaskMoney(selector) {
        $(selector).maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});
    }
    function initMaskPercent(selector) {
        $(selector).maskMoney({suffix: '%',thousands: '',precision: 0,affixesStay: true});
    }
    $(document).ready(function () {
        initMaskMoney($(".show-valor"));
    });
</script>
