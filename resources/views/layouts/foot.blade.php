{!! Html::script('vendors/jquery/dist/jquery.min.js') !!}
{!! Html::script('vendors/bootstrap/dist/js/bootstrap.min.js') !!}
{{--{!! Html::script('js/chartjs/chart.min.js') !!}--}}
{!! Html::script('vendors/jquery.nicescroll/dist/jquery.nicescroll.min.js') !!}
{!! Html::script('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') !!}
<!-- script remoção -->
<script>
    $(document).ready(function () {
        $('#buscar').keypress(function (e) {
            if (e.which == 13) {
                $('form#search').submit();
                return false;    //<---- Add this line
            }
        });

        //exclusão tem redirect
        $('div#modalExclusao').on('show.bs.modal', function(e) {
            $origem = $(e.relatedTarget);
            nome_ = $($origem).data('nome');
            href_ = $($origem).data('href');
            $(this).find('.modal-content form').attr('action',href_);
            $(this).find('.modal-body').html('Você realmente deseja excluir <strong>'+nome_ + '</strong> e suas relações? Esta ação é irreversível!');
        });

        //remoção é com ajax
        $('div#modalRemocao').on('show.bs.modal', function(e) {
            $origem = $(e.relatedTarget);
            nome_ = $($origem).data('nome');
            href_ = $($origem).data('href');
            $(this).find('.modal-body').html('Você realmente deseja remover <strong>'+nome_ + '</strong> e suas relações? Esta ação é irreversível!');
            $(this).find('.btn-ok').click(function(){
                $('div#modalRemocao').modal('hide');
                $.ajax({
                    url: href_,
                    type: 'post',
                    data: {"_method": 'delete', "_token": "{{ csrf_token() }}"},
                    beforeSend: function () {
                        $(".loading").show();
                    },
                    complete: function (xhr, textStatus) {
                        $(".loading").hide();
                    },
                    success: function (json) {
                        if(json.status){
                            console.log(json.response);
                            $el = $($origem).closest('tr');
                            if($el.length == 0){
                                $el = $($origem).closest('.tr');
                            }
                            $($el).toggle('fast');
                        } else {
                            alert(json.response);
                        }
                    }
                });

            });
        });
    });
</script>

<!-- script ativar/desativar -->
<script>
    function ajaxActive($target_,action_){
        var href_ = '{{url('ajax')}}';
        if(typeof $($target_).data('href') != 'undefined'){
            href_ = $($target_).data('href');
        }
        $.ajax({
            url: href_,
            type: 'GET',
            data: {id: $($target_).data('id'),
                table: $($target_).data('table'),
                pk: $($target_).data('pk'),
                sk: $($target_).data('sk'),
                action: action_},
            dataType: "json",
            error: function (xhr, textStatus) {
                console.log('xhr-error: ' + xhr.responseText);
                console.log('textStatus-error: ' + textStatus);
            },
            beforeSend: function () {
                $(".loading").show();
            },
            complete: function (xhr, textStatus) {
                $(".loading").hide();
            },
            success: function (json) {
                console.log(json);
                if(json.status==1) {
                    if (json.valor == 1) {
                        $($target_).data('value', 1);
                        $($target_).html('<i class="fa fa-eye-slash"></i>Desativar');
                        $($target_).closest('tr').find('td.td-active:first').html('<span class="btn btn-success btn-xs">Ativo</span>');
                    } else {
                        $($target_).data('value', 0);
                        $($target_).html('<i class="fa fa-eye"></i>Ativar');
                        $($target_).closest('tr').find('td.td-active:first').html('<span class="btn btn-danger btn-xs">Inativo</span>');
                    }
                }
            }
        });
    }
    $(document).ready(function () {
        $('a.btn-active').click(function(){
            if($(this).data('value')){
                ajaxActive($(this), 'desativar');
            } else {
                ajaxActive($(this), 'ativar');
            }
        });
    });
</script>
<!-- /script ativar/desativar -->

{!! Html::script('build/js/custom.min.js') !!}
