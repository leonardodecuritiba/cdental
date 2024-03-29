<!-- daterangepicker -->
{!! Html::script('vendors/moment/moment.js') !!}
{!! Html::script('vendors/moment/locale/pt-br.js') !!}
{!! Html::script('vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
<script type="text/javascript">
    //    calender_style: "picker_4"
    var locale = {
        format: "DD/MM/YYYY",
        separator: " - ",
        applyLabel: "Aplicar",
        cancelLabel: "Cancelar",
        fromLabel: "De",
        toLabel: "A",
        customRangeLabel: "Customizado",
        daysOfWeek: [
            "Dom",
            "Seg",
            "Ter",
            "Qua",
            "Qui",
            "Sex",
            "Sáb"
        ],
        monthNames: [
            "Janeiro",
            "Fevereiro",
            "Março",
            "Abril",
            "Maio",
            "Junho",
            "Julho",
            "Agosto",
            "Setembro",
            "Outubro",
            "Novembro",
            "Dezembro"
        ],
        "firstDay": 1
    };
    var dateOptionsToNow = {
        locale: locale,
        maxDate: new Date(),
        singleDatePicker: true,
        singleClasses: "picker_1",
        autoUpdateInput: false
    };
    var dateOptionsFromNow = {
        locale: locale,
        minDate: new Date(),
        singleDatePicker: true,
        singleClasses: "picker_1",
        autoUpdateInput: false
    };
    var dateOptionsEvery = {
        locale: locale,
        singleDatePicker: true,
        singleClasses: "picker_1",
        autoUpdateInput: false
    };
    $(document).ready(function () {

        $('.data-every').daterangepicker(dateOptionsEvery);
        $('.data-to-now').daterangepicker(dateOptionsToNow);
        $('.data-from-now').daterangepicker(dateOptionsFromNow);
        $('.data-every, .data-to-now, .data-from-now').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format(locale.format));
        });
    });
</script>
