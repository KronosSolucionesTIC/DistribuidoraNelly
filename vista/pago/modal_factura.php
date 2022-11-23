<!-- Modal -->
<div class="modal fade" id="facturaModal" tabindex="-1" aria-labelledby="facturaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="facturaModalLabel">Recibo de caja</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenidoFactura">
          <table width="100%" border="0" align="center">
            <tr>
              <td width="100%" height="334">
                <table width="100%" height="217" border="0" bordercolor="#000000">
                  <tr>
                    <td height="21" colspan="5">
                      <div align="left"><span class="Estilo22"><strong><span class="nom_jmc"></span></strong></span></div>
                    </td>
                    <td height="21">
                      <div align="right" class="Estilo21">
                        <strong><span class="Estilo22">RECIBO DE CAJA N&deg; </span><span class="cod_fac"></span></strong>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td width="138" height="21"><div align="left" class="Estilo21"><div align="left">Nit:</div></div></td>
                    <td width="116" height="21"><span class="Estilo22"><span class="nit_jmc"></span></span></td>
                    <td width="57" class="Estilo21">Direcci&oacute;n:</td>
                    <td width="151"><span class="Estilo22"><span class="dir_jmc"></span></span></td>
                    <td width="106" class="Estilo21">Telefono:</td>
                    <td width="135" height="21" align="center" class="Estilo10">
                      <div align="left"><span class="Estilo22"><span class="tel_jmc"></span></span></div>
                    </td>
                  </tr>   
                  <tr>
                    <td height="142" colspan="6">
                      <table width="100%" height="76" border="0" align="center">
                        <tr>
                          <td colspan="6" class="ctablasup  " style="text-align:center;"><strong>DATOS CLIENTE</strong></td>
                        </tr>
                        <tr>
                          <td width="19%"><span class="textotabla1">Nombre:</span></td>
                          <td width="17%"><span class="textotabla1"><span class="nombre_cliente"></span></span></td>
                          <td width="16%"><span class="textotabla1">Identificaci&oacute;n</span></td>
                          <td width="14%"><span class="textotabla1"><span class="cedula_cli"></span></span></td>
                          <td width="15%"><span class="textotabla1">Direcci&oacute;n:</span></td>
                          <td width="19%"><span class="textotabla1"><span class="direccion_cli"></span></span></td>
                        </tr>  
                        <tr>
                          <td> <span class="textotabla1">Telefono: </span></td>
                          <td><span class="textotabla1"><span class="telefono_cli"></span></span></td>
                          <td><span class="textotabla1">Celular:</span></td>
                          <td><span class="textotabla1"><span class="celular_cli"></span></span></td>
                          <td><span class="textotabla1">E-mail: </span></td>
                          <td><span class="textotabla1"><span class="email_cli"></span></span></td>
                        </tr>
                        <tr>
                          <td class="titulosup02">&nbsp;</td>
                          <td class="Estilo10">&nbsp;</td>
                          <td class="Estilo10">&nbsp;</td>
                          <td class="Estilo10">&nbsp;</td>
                          <td class="Estilo10">&nbsp;</td>
                          <td align="center" class="Estilo10">&nbsp;</td>
                        </tr> 
                      </table>
                      <table width="100%" border="0" align="center">
                        <tr>
                          <td colspan="5" height="82" valign="top">
                            <table  width="100%" align="center">
                              <tr>
                                <td width="90%"  colspan="3">
                                  <table width="101%" id="tablaFactura" class="table table-bordered">
                                    <thead>
                                      <tr id="fila_vehiculo_0">
                                        <td width="10%"  class="ctablasup   text-center"><strong>CONTRATO</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>ARTICULO</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>FECHA INICIO</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>FECHA FIN</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>VALOR A PAGAR</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>DESCUENTO</strong></td>
                                        <td width="10%"  class="ctablasup   text-center"><strong>VALOR CON DESCUENTO</strong></td>
                                        <td width="10%" class="ctablasup   text-center"><strong>VALOR RECIBIDO</strong></td>
                                        <td width="10%" class="ctablasup   text-center"><strong>SALDO</strong></td>
                                      </tr>
                                    </thead>
                                    <tbody></tbody>
                                  </table>
                                </td>
                              </tr>
                            </table>
                            <table width="100%" align="center">
                              <tr>
                                <td class="ctablasup  "><div align="right"><strong>TOTAL DEUDA:</strong></div></td>
                                <td class='textotabla1'><div align="right">$ <span class="total_deuda"></span></div></td>
                              </tr>
                              <tr>
                                <td class="ctablasup  "><div align="right"><strong>DESCUENTO:</strong></div></td>
                                <td class='textotabla1'><div align="right">$ <span class="total_descuento"></span></div></td>
                              </tr>
                              <tr>
                                <td class="ctablasup  "><div align="right"><strong>TOTAL:</strong></div></td>
                                <td class='textotabla1'><div align="right">$ <span class="total_calculado"></span></div></td>
                              </tr>
                              <tr>
                                <td class="ctablasup  "><div align="right"><strong>VALOR RECIBIDO:</strong></div></td>
                                <td class='textotabla1'><div align="right">$ <span class="total_recibido"></span></div></td>
                              </tr>
                              <tr>
                                <td class="ctablasup  "><div align="right"><strong>TOTAL SALDO:</strong></div></td>
                                <td class='textotabla1'><div align="right">$ <span class="total_saldo"></span></div></td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>          
                      <p class="textotabla1">Firma y sello:</p>
                      <p class="textotabla1">&nbsp;</p>
                      <p class="textotabla1">Forma de pago: <span class="desc_tipo_pago"></span></p>
                      <p class="textotabla1">
                        Recibimos la suma de (<span id="total_recibido_letra"></span>) $(<span class="total_recibido"></span>), con un saldo <span id="saldo_texto"></span> <span class="fech_factura"></span>
                      </p>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_imprimir">Imprimir</button>
      </div>
    </div>
  </div>
</div>