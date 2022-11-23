<!-- Modal -->
<div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="detalleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header Azul">
        <h5 class="modal-title" id="detalleModalLabel">Formato de entrega</h5>
        <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="contenidoDetalle">
          <table width="100%" border="0" align="center" class="lineatablafinablue">
            <tr>
              <td colspan="5">
                <div align="center"><strong><span class="nom_jmc"></span></strong></div>
                <div align="center"><strong><span class="nit_jmc"></span></strong></div>
              </td>
            <tr>
              <td colspan="5">
                <p align="center">
                  ENTREGA No.<span class="cod_entrega"></span> AL CONTRATO No. <span class="consecutivo"></span>
                </p>
                <p align="center">
                  Se realiza a la fecha de (<span class="fecha_entrega"></span>) la entrega de los siguientes equipos ortopedicos:<br />
                <table id="tablaDetalle" width="100%" border="0" align="center"></table>
                </p>
                <p align="center">
                  Con un saldo total de (<span id="saldoLetra"></span>) $ <span id="saldo_deuda"></span>
                </p>
              </td>
            </tr>
            <tr>
              <td colspan="5">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="5">&nbsp;</td>
            </tr>
            <table align="center" width="70%">
              <tr>
                <td colspan="2"><div align="center" class="titulosup04">
                  <p align="left"><strong>Recib&iacute; de conformidad :</strong></p>
                </div></td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2">&nbsp;</td>
                <td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2"><div align="left">______________________________</div></td>
                <td colspan="2"><div align="left">______________________________</div></td>
              </tr>
              <tr>
                <td width="63"><div align="left"><span class="titulosup04"><span id="tipoDocFirma"></span></span></div></td>
                <td width="315"><div align="left"><span class="titulosup04"><span class="convertirDato"><span></div></td>
                <td colspan="2"><div align="left"><span class="nom_jmc"></span></div></td>
              </tr>
              <tr>
                <td class="subfongris1"><div align="left"><span class="titulosup04">De:</span></div></td>
                <td class="subfongris1"><div align="left"><span class="titulosup04"><span class="nom_ciu"></span></span></div></td>
                <td width="74" class="subfongris1"><div align="left"><span class="titulosup04">NIT : </span></div></td>
                <td width="310" class="subfongris1"><div align="left"><span class="titulosup04"><span class="nit_jmc"></span>
                </span></div></td>
              </tr>
              <tr>
                <td colspan="5">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="5"><div align="center"><strong><em>Carrera 13A # 79 - 64 / Tel&eacute;fonos: 2185100/ 6351666 </em></strong></div></td>
              </tr>
            </table>
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