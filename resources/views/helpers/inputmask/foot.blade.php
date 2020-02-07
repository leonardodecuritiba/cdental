{!! Html::script('vendors/inputmask/dist/inputmask/inputmask.js') !!}
{!! Html::script('vendors/inputmask/dist/inputmask/jquery.inputmask.js') !!}
{!! Html::script('vendors/inputmask/dist/inputmask/inputmask.date.extensions.js') !!}

<script type="text/javascript">
    $(document).ready(function () {
        $('.show-cep').inputmask({'mask': '99999-999', 'removeMaskOnSubmit': true});
        $('.show-cpf').inputmask({'mask': '999.999.999-99', 'removeMaskOnSubmit': true});
        $('.show-cnpj').inputmask({'mask': '99.999.999/9999-99', 'removeMaskOnSubmit': true});
        $('.show-rg').inputmask({'mask': '99.999.999-9', 'removeMaskOnSubmit': true});
        $('.show-celular').inputmask({'mask': '(99) 99999-9999', 'removeMaskOnSubmit': true});
        $('.show-telefone').inputmask({'mask': '(99) 9999-9999', 'removeMaskOnSubmit': true});
        $('.show-data').inputmask({'alias': "date", "placeholder": "dd/mm/aaaa", 'removeMaskOnSubmit': false});
        $('.show-time').inputmask({'alias': "datetime", 'mask': "h:s",'placeholder': "hh:mm",hourFormat: "24", 'removeMaskOnSubmit': false});
    });

</script>
