@extends('layouts.template')
@section('page_content')


    <!-- Modal agendar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nova receita</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Paciente:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="nome_paciente" value="" data-inputmask="'mask': '99/99/9999'" >
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Plano:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="idplano">
                                    <optgroup label="Planos cadastrados">
                                        <option value="AL" name="">Particular</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dentista:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="idprofissional_criador">
                                    <optgroup label="Cirugiões cadastrados">
                                        <option value="AL" name="">Dr. Carlos Frank</option>
                                        <option value="AR" name="">Dr. Arkansas</option>
                                        <option value="IL" name="">Dr. Illinois</option>
                                        <option value="IA" name="">Dr. Iowa</option>
                                        <option value="KS" name="">Dr. Kansas</option>
                                        <option value="KY" name="">Dr. Kentucky</option>
                                        <option value="LA" name="">Dr. Louisiana</option>
                                        <option value="MN" name="">Dr. Minnesota</option>
                                        <option value="MS" name="">Dr. Mississippi</option>
                                        <option value="MO" name="">Dr. Missouri</option>
                                        <option value="OK" name="">Dr. Oklahoma</option>
                                        <option value="SD" name="">Dr. South Dakota</option>
                                        <option value="TX" name="">Dr. Texas</option>
                                        <option value="TN" name="">Dr. Tennessee</option>
                                        <option value="WI" name="">Dr. Wisconsin</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tratamento:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="tratamento" value="" maxlength="80" >
                                <span class="fa fa-heart form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dentes/Região:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="number" class="form-control" name="regiao" value="">
                                <span class="fa fa-plus-circle form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Valor:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="number" class="form-control" name="valor" value=""  >
                                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Data de vencimento:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="date" class="form-control" name="data_vencimento"value=""  >
                                <span class="fa fa-minus form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Caixa:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="caixa">
                                    <optgroup label="Caixas cadastrados">
                                        <option value="1" name="debito">Cartão de débito</option>
                                        <option value="2" name="credito">Cartão de crédito</option>
                                        <option value="3" name="caixa">Caixa</option>
                                        <option value="4" name="banco">Conta do banco</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-credit-card form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Este recebimento já foi pago</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="0" value="s"> &nbsp; Sim &nbsp;
                                    </label>
                                    <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="1" value="n" checked=""> Não
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Fechar</button>
                            <button type="button" class="btn btn-primary antosubmit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nova receita</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Paciente:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="nome_paciente" value="Lorem ipsum" maxlength="100">
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Plano:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="idplano">
                                    <optgroup label="Planos cadastrados">
                                        <option value="AL" name="">Particular</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-book form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dentista:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="idprofissional_criador">
                                    <optgroup label="Cirugiões cadastrados">
                                        <option value="AL" name="">Dr. Carlos Frank</option>
                                        <option value="AR" name="">Dr. Arkansas</option>
                                        <option value="IL" name="">Dr. Illinois</option>
                                        <option value="IA" name="">Dr. Iowa</option>
                                        <option value="KS" name="">Dr. Kansas</option>
                                        <option value="KY" name="">Dr. Kentucky</option>
                                        <option value="LA" name="">Dr. Louisiana</option>
                                        <option value="MN" name="">Dr. Minnesota</option>
                                        <option value="MS" name="">Dr. Mississippi</option>
                                        <option value="MO" name="">Dr. Missouri</option>
                                        <option value="OK" name="">Dr. Oklahoma</option>
                                        <option value="SD" name="">Dr. South Dakota</option>
                                        <option value="TX" name="">Dr. Texas</option>
                                        <option value="TN" name="">Dr. Tennessee</option>
                                        <option value="WI" name="">Dr. Wisconsin</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Tratamento:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="tratamento" value="Lorem ipsum" maxlength="80" >
                                <span class="fa fa-heart form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Dentes/Região:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="regiao" value="Lorem ipsum" maxlength="50" >
                                <span class="fa fa-plus-circle form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Valor:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="number" class="form-control" name="valor" value="R$5555.00"  >
                                <span class="fa fa-usd form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Data de vencimento:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="date" class="form-control" name="data_vencimento" value="12/12/1222" >
                                <span class="fa fa-minus form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Caixa:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select2_group form-control" name="caixa">
                                    <optgroup label="Caixas cadastrados">
                                        <option value="1" name="debito">Cartão de débito</option>
                                        <option value="2" name="credito">Cartão de crédito</option>
                                        <option value="3" name="caixa">Caixa</option>
                                        <option value="4" name="banco">Conta do banco</option>
                                    </optgroup>
                                </select>
                                <span class="fa fa-credit-card form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-6 col-sm-6 col-xs-12">Este recebimento já foi pago</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="0" value="s"> &nbsp; Sim &nbsp;
                                    </label>
                                    <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                        <input type="radio" name="1" value="n" checked=""> Não
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Data do pagamento:</label>
                            <div class="col-md-4 col-sm-4 col-xs-9">
                                <input type="date" class="form-control" name="data_vencimento" value="22/22/2222" >
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-3">Valor pago:</label>
                            <div class="col-md-3 col-sm-3 col-xs-9">
                                <input type="number" class="form-control" name="valor_pago" value="R$000,00" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary antosubmit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('Agendar novo retorno')
            modal.find('.modal-body input').
        })
    </script>
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Recebimentos</h3><br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" >Novo recebimento</button>
                </div>


                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Paciente...">
                                    <span class="input-group-btn">
										<button class="btn btn-default" type="button"><i class="fa fa-chevron-circle-right"></i></button>
									</span>
                        </div>
                        <div class="input-group" style="float:left;">
                            <input type="text" class="form-control" placeholder="Dentista...">
                                    <span class="input-group-btn">
										<button class="btn btn-default" type="button"><i class="fa fa-chevron-circle-right"></i></button>
									</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="">
                <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                    <center><h1 class="price" style="color:#1A82C3">R$1.900,00</h1>
                        <span class="price-tax"><i class="fa fa-arrow-circle-o-down"></i> Recebidos</span></centeR>
                </div>
            </div>
            <div class="">
                <div class="col-md-6 col-sm-6 col-xs-12 product_price">
                    <center> <h1 class="price"><font color="#d9534f">R$1.300,00</font></h1>
                        <span class="price-tax"><i class="fa fa-spinner"></i> A receber</span></centeR>
                </div>
            </div>



            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-align-left"></i> Recebimentos</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="title_right">
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" value="12/09/2014">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button"><i class="fa fa-chevron-circle-right"></i></button>
												</span>
                                </div>

                            </div>
                        </div>

                        <div class="title_right">
                            <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                                <div class="input-group" style="float:left;">
                                    <input type="text" class="form-control" value="12/09/2012">
												<span class="input-group-btn">
													<button class="btn btn-default" type="button"><i class="fa fa-chevron-circle-right"></i></button>
												</span>
                                </div>

                            </div>
                        </div>
                        <!-- start accordion -->
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Paciente</th>
                                <th>Valor</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">12/02/2012</th>
                                <td>Mark</td>
                                <td>R$500,00</td>
                                <th><button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal1">Editar</button></th>
                            </tr>
                            <tr>
                                <th scope="row">12/02/2012</th>
                                <td>Jacob</td>
                                <td>R$500,00</td>
                                <th><button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal1">Editar</button></th>
                            </tr>
                            <tr>
                                <th scope="row">12/02/2012</th>
                                <td>Larry</td>
                                <td>R$500,00</td>
                                <th><button type="button" class="btn btn-primary" style="float:right;" data-toggle="modal" data-target="#exampleModal1">Editar</button></th>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                    <!-- end of accordion -->


                </div>
            </div>
        </div>

@endsection