@extends('layouts.template')
@section('page_content')
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Agendar Retorno</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Cirurgião:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <select class="select5_group form-control">
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
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Data:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="" data-inputmask="'mask': '99/99/9999'" >
                                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Motivo de retorno:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <input type="text" class="form-control" name="">
                                <span class="fa fa-caret-square-o-left form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Observações:</label>
                            <div class="col-md-9 col-sm-9 col-xs-9">
                                <textarea type="text" class="form-control" name=""> </textarea>
                                <span class="fa fa-bullhorn form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" class="btn btn-danger">Cancelar</button>
                                <button type="submit" class="btn btn-success">Salvar</button>
                            </div>
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
            modal.find('.modal-title').text('Agendar novo retorno');
        })
    </script>

        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Controle de recibos</h3>
                </div>
                <!--<div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>-->

            </div>

            <div class="clearfix"></div>
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Dados</h2>
                            <!--  <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  <li class="dropdown">
                                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                      <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Settings 1</a>
                                          </li>
                                          <li><a href="#">Settings 2</a>
                                          </li>
                                      </ul>
                                  </li>
                                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                                  </li>
                              </ul>-->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Mês:
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6 form-group has-feedback">
                                        <select class="select2_group form-control">
                                            <option value="AR" name="">Janeiro</option>
                                            <option value="IL" name="">Fevereiro</option>
                                            <option value="IA" name="">Março</option>
                                            <option value="KS" name="">Junho</option>
                                            <option value="KY" name="">Julho</option>
                                            <option value="LA" name="">Agosto</option>
                                            <option value="MN" name="">Setembro</option>
                                            <option value="MS" name="">Outubro</option>
                                            <option value="MO" name="">Novembro</option>
                                            <option value="OK" name="">Dezembro</option>

                                        </select>
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Ano:
                                    </label>
                                    <div class="col-md-2 col-sm-2 col-xs-6 form-group has-feedback">
                                        <select class="select2_group form-control">
                                            <option value="AR" name="">1997</option>
                                            <option value="IL" name="">1998</option>
                                            <option value="IA" name="">1999</option>
                                            <option value="KS" name="">2000</option>
                                            <option value="KY" name="">2001</option>
                                            <option value="LA" name="">2002</option>
                                            <option value="MN" name="">2003</option>
                                            <option value="MS" name="">2004</option>
                                            <option value="MO" name="">2005</option>
                                            <option value="OK" name="">2006</option>
                                            <option value="AR" name="">2007</option>
                                            <option value="IL" name="">2008</option>
                                            <option value="IA" name="">2009</option>
                                            <option value="KS" name="">2010</option>
                                            <option value="KY" name="">2011</option>
                                            <option value="LA" name="">2012</option>
                                            <option value="MN" name="">2013</option>
                                            <option value="MS" name="">2014</option>
                                            <option value="MO" name="">2015</option>
                                            <option value="OK" name="">2016</option>

                                        </select>
                                        <span class="fa fa-newspaper-o form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Cirurgião Responsável:
                                    </label>
                                    <div class="col-md-3 col-sm-3 col-xs-6 form-group has-feedback">
                                        <select class="select2_group form-control">
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

                                        </select>
                                        <span class="fa fa-user-md form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="form-group" style="float:right;">
                                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1">
                                            <button type="submit" class="btn btn-success">Buscar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="ln_solid"></div>

                            </form>
                        </div>
                        <table class="table table-striped projects ">
                            <thead>
                            <tr>
                                <th style="width: 20%">Data</th>
                                <th style="width: 10%">Número</th>
                                <th style="width: 25%">Paciente/responsável</th>
                                <th style="width: 10%">Valor</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a>12/07/2015</a></td>

                                <td>
                                    <a>0050</a>
                                </td>
                                <td>
                                    <a> José Carlos Almeida</a>
                                </td>
                                <td class="project_progress">
                                    <a>R$500,00</a>
                                </td>

                            </tr>
                            <tr>
                                <td><a>12/07/2015</a></td>

                                <td>
                                    <a>00501</a>
                                </td>
                                <td>
                                    <a> José Carlos Almeida 2</a>
                                </td>
                                <td class="project_progress">
                                    <a>R$600,00</a>
                                </td>


                            </tr>
                            <tr>
                                <td><a>12/07/2015</a></td>

                                <td>
                                    <a>00502</a>
                                </td>
                                <td>
                                    <a> José Carlos Almeida 3</a>
                                </td>
                                <td class="project_progress">
                                    <a>R$700,00</a>
                                </td>


                            </tr>
                            <tr>
                                <td><a>12/07/2015</a></td>

                                <td>
                                    <a>00503</a>
                                </td>
                                <td>
                                    <a> José Carlos Almeida 4</a>
                                </td>
                                <td class="project_progress">
                                    <a>R$800,00</a>
                                </td>

                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function () {
                    $('#birthday').daterangepicker({
                        singleDatePicker: true,
                        calender_style: "picker_4"
                    }, function (start, end, label) {
                        console.log(start.toISOString(), end.toISOString(), label);
                    });
                });
            </script>

        </div>


@endsection