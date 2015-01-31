<script>numRegistroViv();</script>
<form class="well form-inline" id="formVivienda" role="form">
    <fieldset>
        <legend>Registro de Vivienda
            <div class="pull-right">
                <a class="btn btn-primary" href="index.php">
                    <i class="icon-home icon-white"></i>
                        Inicio
                </a>
            </div>
        </legend>
        <div id="contmsj2"></div>         
        <div class="span12 control-group">
            <div class="span6">
                <label for="nroregistro">Registro Nro.</label>
                <span class="input-small uneditable-input" id="itxtcodigoViv"></span>
            </div>
            <div class="span6">
                <label for="nroregistro">Fecha</label>
                <span class="input-small uneditable-input" id="itxtfechaViv"></span> 
            </div>
        </div>
        
        <legend><h1><small><b>Propietario(s) Incluido(s) en el Registro de Vivienda Principal</b></small></h1></legend>
                    
        <div class="span12 control-group">
            <label for="itxtnrodocumento">R.I.F. &oacute; C.I.</label>
            <div class="input-append controls">
                <input id="itxtnrodocumento" name="R.I.F.  &oacute;  C.I." onkeyup="accionPerViv(event,'TITULAR');" placeholder="Ingrese el R.I.F. &oacute; C.I."  size="5px" type="text" maxlength="10" autofocus>
                <a class="btn btn-primary" id="btnbuscarper" onclick="buscarPerViv('TITULAR');">
                    <i class="icon-search icon-white"></i>
                </a>
            </div>
            <p class="help-block ejemplo">Indique el Número de CI o RIF, sin guiones, ni puntos. En caso de RIF debe completar un máximo de 10 caracteres. Ejemplo de la Cédula: 12345678, Ejemplo del RIF: V123456789.</p>
        </div>
                    
        <div class="span12 control-group">
            <div class="span6">
                <label for="itxtnombre">Nombres</label>
                <input type="text" class="span7 disabled" disabled="" placeholder="Ingrese un nombre" id="itxtnombre" name="Nombres" onKeyPress="return letras(event);">
            </div>
            <div class="span6">
                <label for="itxtapellido">Apellidos</label>
                <input type="text" class="span7 disabled" disabled="" placeholder="Ingrese un apellido" id="itxtapellido" name="Apellidos" onKeyPress="return letras(event);">
            </div>
        </div>
                
        
        <legend><h1><small><b>Datos del Co-Propietario (Solo si el contribuyente es Poseedor)</b></small></h1></legend>
                    
        <div class="span12 control-group">
            <label for="txtnrodocumentoco">R.I.F. &oacute; C.I.</label>
            <div class="input-append controls">
                <input id="txtnrodocumentoco" name="R.I.F.  &oacute;  C.I." onkeyup="accionPerViv(event,'COTITULAR');" placeholder="Ingrese el R.I.F. &oacute; C.I."  size="75px" type="text" maxlength="10" autofocus>
                <a class="btn btn-primary" id="btnbuscarper" onclick="buscarPerViv('COTITULAR');">
                    <i class="icon-search icon-white"></i>
                </a>
            </div>
            <p class="help-block ejemplo">Indique el Número de CI o RIF, sin guiones, ni puntos. En caso de RIF debe completar un máximo de 10 caracteres. Ejemplo de la Cédula: 12345678, Ejemplo del RIF: V123456789.</p>
        </div>
                    
        <div class="span12 control-group">
            <div class="span6">
                <label for="txtnombreco">Nombres</label>
                <input type="text" class="span7 disabled" disabled="" placeholder="Ingrese un nombre" id="txtnombreco" name="Nombres" onKeyPress="return letras(event);">
            </div>
            <div class="span6">
                <label for="txtapellidoco">Apellidos</label>
                <input type="text" class="span7 disabled" disabled="" placeholder="Ingrese un apellido" id="txtapellidoco" name="Apellidos" onKeyPress="return letras(event);">
            </div>
        </div>
                    
        <legend><h1><small><b>Datos del Registro</b></small></h1></legend>
                    
        <div class="span12 control-group">
            <div class="span4">
                <label for="itxtfecreg">Fecha Registro</label>
                <input type="text" class="span7" data-date-format="dd/mm/yyyy" id="itxtfecreg" placeholder="Haga click aqui" name="Fecha registro"/>
            </div>
            <div class="span4">
                <label for="itxtnrodoc">Nro. Documento</label>
                <input type="text" class="span7" id="itxtnrodoc" placeholder="Ingrese un valor" onKeyPress="return numeros(event);" name="
                       Nro. Documento"/>
            </div>
            <div class="span3">
                <label for="itxtnrotomo">Nro. Tomo</label>
                <input type="text" class="span9" id="itxtnrotomo" placeholder="Ingrese un valor" onKeyPress="return numeros(event);" name="Nro. Tomo"/>
            </div>
        </div>

        <legend><h1><small><b>Direcci&oacute;n de la Vivienda</b></small></h1></legend>
                    
        <div class="span12 control-group">
            <div class="span4">
                <label for="ilstestado">Estado</label>
                <?php
                    include_once '../conexion/conexion.php';
                    include_once '../clases/Estado.php';
                    $objEst = new Estado();
                    $consulta =  $objEst->mostrar("select * from estado", $conexion);
                    if($conexion)
                    {
                        if($consulta){
                           if($conexion->registros > 0){
                              echo'<select id="ilstestado" disabled="" name="Estado" style="width: 100%">';
                              echo '<option value="-1">Seleccione...</option>';
                              do{
                                 $sel = '';
                                 $fila = $conexion->devolver_recordset();
                                 if($fila['idestado'] == '19'){
                                    $sel ='selected';
                                 }
                                 echo '<option value="'.$fila['idestado'].'" '.$sel.'>'.htmlentities(strtoupper($fila['nombreestado']),ENT_QUOTES,'UTF-8').'</option>';
                                 $i++;
                              }while(($conexion->siguiente())&&($i!=$conexion->registros));

                           }else{
                               echo'<select id="ilstestado" disabled style="width: 100%">';
                               echo '<option value="-1">No se encontraron registros...</option>';
                           }
                        }else{
                            echo'<select id="ilstestado" disabled style="width: 100%">';
                            echo '<option value="-1">No se encontraron registros...</option>';
                        }
                        echo'</select>';
                    }
                ?>
            </div>
                        
            <div class="span4">
                <label for="ilstmunicipio">Municipio</label>
                <select id="ilstmunicipio" disabled="" onchange="cargarParroquias(1);" name="Municipio " style="width: 100%">
                    <option value="-1">Seleccione...</option>
                </select>
            </div>
                        
            <div class="span4">
                <label for="ilstparroquia">Parroquia</label>
                <select id="ilstparroquia" disabled="" name="Parroquia" style="width: 100%">
                    <option value="-1">Seleccione...</option>
                </select>
            </div>
        </div>
                
        <div class="span12 control-group">
            <div class="span4">
                <label for="itxtciudad">Ciudad</label>
                <input type="text" class="span12" placeholder="Ingrese una ciudad" id="itxtciudad" name="Ciudad">
            </div>
            <div class="span4">
                <label for="itxtzonapostal">Zona Postal</label>
                <input type="text" class="span12" placeholder="Ingrese una Zona postal" id="itxtzonapostal" name="Zona Postal" onKeyPress="return numeros(event);">
            </div>
            <div class="span4">
                <label for="itxtfechaadq">Adquisici&oacute;n</label>
                <input type="text" class="span12" data-date-format="dd/mm/yyyy" id="itxtfechaadq" placeholder="Haga click aqui" name="Fecha adquisici&oacute;n">
            </div>
        </div>
                
                    <div class="span12 control-group">
                        <div class="span4">
                            <label for="itxtsector">Urb. o Sector</label>
                            <input type="text" class="span12" placeholder="Ingrese una Urb. o sector" id="itxtsector" name="Sector">
                        </div>
                        <div class="span4">
                            <label for="ilsttipoinm">Inmueble</label>
                            <select id="ilsttipoinm" class="span12" name="Tipo Inmueble"> 
                                <option value="-1" selected="">Seleccione...</option>
                                <option value="APARTAMENTO">Apartamento</option>
                                <option value="CASA">Casa</option>
                                <option value="QUINTA">Quinta</option>
                            </select>
                        </div>
                        <div class="span4">
                            <label for="itxtcasa">Nro. Casa o Piso</label>
                            <input type="text" class="span12" placeholder="Ingrese Casa o piso" id="itxtcasa" name="Nro. Casa o Piso">
                        </div>
                    </div>
                    
                    <legend><h1><small><b>Valor Inmueble</b></small></h1></legend>
                
                    <div class="control-group">
                        <div class="row">
                            <div class="span5 offset1">
                                <label for="itxtvalinmu">Valor Inmueble</label>
                                <input type="text" class="span8"  placeholder="Ingrese un valor" id="itxtvalinmu" name="Valor Inmueble" onKeyPress="return numerosFloat(event);">
                            </div>
                            <div class="span5 offset1">
                                <label for="itxtvalmejoras">Valor Mejoras</label>
                                <input type="text" class="span8"  placeholder="Ingrese un valor" id="itxtvalmejoras" name="Valor Mejoras" onKeyPress="return numerosFloat(event);">
                            </div>
                        </div>
                    </div>
                    
                    <div id="contmsj"></div>

                        <div class="form-actions">
                            <a class="btn btn-primary" id="guardar" style="width: 75px" onclick="valForm('formVivienda','guardarViv(\'g\')');">
                                <i class="icon-ok-sign icon-white"></i>
                                    Guardar
                            </a>
                            <a id="openBtn" class="btn btn-primary" style="width: 75px" onclick="cargarTodosViv();">
                                <i class="icon-eye-open icon-white"></i>
                                    Mostrar
                            </a>
                            <a class="btn btn-primary" style="width: 75px" id="limpiar" onclick="limpiarFormViv();">
                                <i class="icon-trash icon-white"></i>
                                    Limpiar
                            </a>
                        </div>
                    
    </fieldset>
</form>

               <!--COMIENZO MENSAJE MODAL-->
       <div id="myModal" class="modal hide fade" style="display: none; width: 70%; left: 40%">
            <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Viviendas Registradas</h3>
            </div>
            <div class="modal-body">
                <ul id="tab" class="nav nav-tabs">
                    <li class="">
                        <a>B&uacute;squeda por: </a>
                    </li>
                    <li class="active">
                        <a href="#contribuyente" data-toggle="tab">Contribuyente</a>
                    </li>
                    <li class="">
                        <a href="#fecha" data-toggle="tab">Fecha</a>
                    </li>
                    <li class="">
                        <a href="#ubicacion" data-toggle="tab">Ubicaci&oacute;n</a>
                    </li>
                    <li class="">
                        <a href="#operador" data-toggle="tab">Operador</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="contribuyente">
                        <form class="form-horizontal" id="formBusCorDocCont">
                            <fieldset>
                                <div class="offset4 span4">
                                    <input type="text" name="Documento Contribuyente" id="itxtdoccont" class="span10 search-query" placeholder="Ingrese el R.I.F. &oacute; C.I.">
                                </div>
                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <div id="contmsjmodal1"></div>
                            <a class="btn btn-primary" id="guardar" onclick="buscarxContV();">
                                <i class="icon-search icon-white"></i>
                                    Buscar
                            </a>
                            <a class="btn btn-primary" id="limpiar" onclick="limpiarTabViv(1);">
                                <i class="icon-trash icon-white"></i>
                                    Limpiar
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="fecha">
                        <form class="form-inline" id="formBusCorFec">
                            <fieldset>
                                <div class="offset2 span3">
                                    <label class="control-label" for="dp1">Desde:</label>
                                    <input type="text" class="span8" value="<?php echo date('d/m/Y'); ?>" data-date-format="dd/mm/yyyy" id="dp1"/>
                                </div>
                                <div class="offset2 span3">
                                    <label class="control-label" for="dp2">Hasta:</label>
                                    <input type="text" class="span8" value="<?php echo date('d/m/Y'); ?>" data-date-format="dd/mm/yyyy" id="dp2"/>
                                </div>
                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <div id="contmsjmodal2"></div>
                            <a class="btn btn-primary" id="guardar" onclick="buscarxFechV();">
                                <i class="icon-search icon-white"></i>
                                    Buscar
                            </a>
                            <a class="btn btn-primary" id="limpiar" onclick="limpiarTabViv(2);">
                                <i class="icon-trash icon-white"></i>
                                    Limpiar
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="ubicacion">
                        <form class="form-horizontal" id="formBusVivUbi">
                            <fieldset>

                                <div class="span12 control-group">
                                    <div class="offset2 span3">
                                        <label for="ilstestadorep">Estado</label>
                                            <select id="ilstestadorep" disabled="" name="Estado">
                                                <option value="19">SUCRE</option>
                                            </select>
                                    </div>

                                    <div class="span3">
                                        <label for="ilstmunicipiorep">Municipio</label>
                                        <select id="ilstmunicipiorep" disabled="" onchange="cargarParroquias(2);" name="Municipio ">
                                            <option value="-1">Seleccione...</option>
                                        </select>
                                    </div>

                                    <div class="span3">
                                        <label for="ilstparroquiarep">Parroquia</label>
                                        <select id="ilstparroquiarep" disabled="" name="Parroquia">
                                            <option value="-1">Seleccione...</option>
                                        </select>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <div id="contmsjmodal3"></div>
                            <a class="btn btn-primary" id="guardar" onclick="buscarxUbic();">
                                <i class="icon-search icon-white"></i>
                                    Buscar
                            </a>
                            <a class="btn btn-primary" id="limpiar" onclick="limpiarTabViv(3);">
                                <i class="icon-trash icon-white"></i>
                                    Limpiar
                            </a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="operador">
                        <form class="form-horizontal" id="formBusVivCedOpe">
                            <fieldset>
                                <div class="offset4 span4">
                                    <input type="text" name="Cédula Operador" id="itxtcedope" class="span10 search-query" onKeyPress="return numeros(event);" placeholder="Ingrese una C&eacute;dula">
                                </div>
                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <div id="contmsjmodal4"></div>
                            <a class="btn btn-primary" id="guardar" onclick="buscarxOperViv();">
                                <i class="icon-search icon-white"></i>
                                    Buscar
                            </a>
                            <a class="btn btn-primary" id="limpiar" onclick="limpiarTabCor(4);">
                                <i class="icon-trash icon-white"></i>
                                    Limpiar
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-hover table-bordered">
                    <thead style="text-align: center;">
                        <tr>
                            <th>Item</th>
                            <th>Contribuyente</th>
                            <th>CoPropietario</th>
                            <th>Direcci&oacute;n</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th style="text-align: center">Editar</th>
                            <th style="text-align: center;">Eliminar <input type="checkbox" id="elico" title="Seleccionar todos" onclick="verSel('all');"></th>
                        </tr>
                    </thead>
                    <tbody id="contViv"></tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" id="eliminarViv" data-toggle="confirmation" data-title="Seguro desea eliminar los registros seleccionados?">
                    <i class="icon-remove icon-white"></i>
                        Eliminar
                </a>
                <a class="btn btn-primary" id="imprimirViv">
                    <i class="icon-print icon-white"></i>
                        Imprimir
                </a>
                <a href="#" id="cerrar" class="btn" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
        <!--FIN MENSAJE MODAL-->
        <script>
            document.getElementById('itxtnrodocumento').focus();
            $(function(){
			$('#itxtfecreg').datepicker();
                        $('#itxtfechaadq').datepicker();
                        $('#dp1').datepicker();
                        $('#dp2').datepicker();
            });
                      
            $('a[data-toggle="tab"]').on('shown', function (e) {
                $("#contmsjmodal1").empty();
                $("#contmsjmodal2").empty();
                $("#contmsjmodal3").empty();
                $("#contmsjmodal4").empty();
                xGetElementById('itxtdoccont').value = "";
                xGetElementById('dp1').value = fechaActual();
                xGetElementById('dp2').value = fechaActual();
                xGetElementById('itxtcedope').value = "";
                cargarMunicipios(2);
                cargarTodosViv();
            })
            $('[data-toggle="confirmation"]').confirmation(
                {
                    
                    "placement" : "top",
                    "btnOkLabel" : '<i class="icon-ok-sign icon-white"></i> Si',
                    "btnOkClass" : "btn-primary",
                    "onConfirm" : function(){eliminarViv();}
                    
                }
            );
        </script>
          